<?php 

// Ce controller contient les fonctions qui permettent de gérer les urls/ les routes du crud Article

// Dépendences du controller article vers le article-model.php du dossier models
// pour accéder aux methodes : readAllArticles, readOneArticle, createArticle, updateArticle, deleteArticle
require __DIR__ . '/../models/article-model.php';

/**
 * Affiche la liste des articles
 * @URL("/articles")
 * @render views/articles/index.php
 */
function listArticles(): void
{
    $articles = readAllArticles();
    require __DIR__ . '/../views/articles/index.php';
}

/**
 * Affiche le formulaire de création d'un article
 * @URL("/articles/add")
 * @render views/articles/create.php
 */
function newArticle(): void
{
    $error = "";
    $categories = readAllCategories();

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        if (!empty($_POST['title']) && !empty($_POST['content']) && !empty($_POST['image']) && !empty($_POST['category_id'])) {
            createArticle($_POST['title'], $_POST['content'], $_POST['image'], $_POST['category_id']);
            header('Location: /');
        } else {
            $error = "All fields are required !";
        }
    }
    require __DIR__ . '/../views/articles/create.php';
}

/**
 * Affiche un article en détail
 * @URL("/articles/edit")
 * @param int $id
 * @render views/articles/show.php
 */
function showArticle(int $id): void
{
    $article = readOneArticle($id);
    require __DIR__ . '/../views/articles/show.php';
}

/**
 * Affiche le formulaire de modification d'un article
 * @URL("/articles/edit")
 * @param int $id
 * @render views/articles/edit.php
 */
function editArticle(int $id): void
{
    $error = "";
    $categories = readAllCategories();
    $article = readOneArticle($id);

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        if (!empty($_POST['title']) && !empty($_POST['content']) && !empty($_POST['image']) && !empty($_POST['category_id'])) {
            updateArticle($id, $_POST['title'], $_POST['content'], $_POST['image'], intval($_POST['category_id']));
            header('Location: /');
        } else {
            $error = "All fields are required !";
        }
    }
    require __DIR__ . '/../views/articles/edit.php';
}

/**
 * Supprime un article
 * @URL("/articles/delete")
 * @param int $id
 */
function removeArticle(int $id): void
{
    deleteArticle($id);
    header('Location: /');
}