<?php

require __DIR__.'/../src/controllers/home-controller.php';
require __DIR__.'/../src/controllers/article-controller.php';
require __DIR__.'/../src/controllers/category-controller.php';

$urlPath = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

if ('/' === $urlPath) {
    index();
} elseif ('/articles' === $urlPath) {
    listArticles();
} elseif ('/articles/add' === $urlPath) {
    newArticle();
} elseif ('/articles/show' === $urlPath && isset($_GET['id'])) {
    showArticle($_GET['id']);
} elseif ('/articles/edit' === $urlPath && isset($_GET['id'])) {
    editArticle($_GET['id']);
} elseif ('/articles/delete' === $urlPath && isset($_GET['id'])) {
    removeArticle($_GET['id']);
} elseif ('/categories' === $urlPath) {
    listCategories();
} elseif ('/categories/add' === $urlPath) {
    newCategory();
} elseif ('/categories/edit' === $urlPath && isset($_GET['id'])) {
    editCategory($_GET['id']);
} elseif ('/categories/delete' === $urlPath && isset($_GET['id'])) {
    removeCategory($_GET['id']);
} else {
    header('HTTP/1.1 404 Not Found');
}