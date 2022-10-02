<?php 

require __DIR__ . '/../models/category-model.php';

function listCategories(): void
{
    $categories = readAllCategories();
    require __DIR__ . '/../views/categories/index.php';
}

function newCategory(): void
{
    $error = "";

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        if (!empty($_POST['name'])) {
            createCategory($_POST['name']);
            header('Location: /');
        } else {
            $error = "All fields are required !";
        }
    }
    require __DIR__ . '/../views/categories/create.php';
}

function editCategory(int $id): void
{
    $error = "";
    $category = readOneCategory($id);

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        if (!empty($_POST['name'])) {
            updateCategory($id, $_POST['name']);
            header('Location: /');
        } else {
            $error = "All fields are required !";
        }
    }
    require __DIR__ . '/../views/categories/edit.php';
}

function removeCategory(int $id): void
{
    deleteCategory($id);
    header('Location: /');
}