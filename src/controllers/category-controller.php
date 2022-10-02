<?php 

// Ce controller contient les fonctions qui permettent de gérer les urls/ les routes du crud Category

// Dépendences du controller category vers le category-model.php du dossier models
// pour accéder aux methodes : readAllCategories, readOneCategory, createCategory, updateCategory, deleteCategory
require __DIR__ . '/../models/category-model.php';

/**
 * Affiche la liste des categories
 * @URL("/categories")
 * @render views/categories/index.php
 */
function listCategories(): void
{
    $categories = readAllCategories();
    require __DIR__ . '/../views/categories/index.php';
}

/**
 * Affiche le formulaire de création d'une categorie
 * @URL("/categories/add")
 * @render views/categories/create.php
 */
function newCategory(): void
{
    $error = "";

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        if (!empty($_POST['name'])) {
            createCategory($_POST['name']);
            header('Location: /categories');
        } else {
            $error = "All fields are required !";
        }
    }
    require __DIR__ . '/../views/categories/create.php';
}

/**
 * Affiche le formulaire de modification d'une categorie
 * @URL("/categories/edit")
 * @param int $id
 * @render views/categories/edit.php
 */
function editCategory(int $id): void
{
    $error = "";
    $category = readOneCategory($id);

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        if (!empty($_POST['name'])) {
            updateCategory($id, $_POST['name']);
            header('Location: /categories');
        } else {
            $error = "All fields are required !";
        }
    }
    require __DIR__ . '/../views/categories/edit.php';
}

/**
 * Supprime une categorie
 * @URL("/categories/delete")
 * @param int $id
 */
function removeCategory(int $id): void
{
    deleteCategory($id);
    header('Location: /categories');
}