<?php 

require __DIR__ . '/../models/article-model.php';

function listArticles(): void
{
    $articles = readAllArticles();
    require __DIR__ . '/../views/articles/index.php';
}

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

function showArticle(int $id): void
{
    $article = readOneArticle($id);
    require __DIR__ . '/../views/articles/show.php';
}

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

function removeArticle(int $id): void
{
    deleteArticle($id);
    header('Location: /');
}