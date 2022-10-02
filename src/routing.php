<?php

require __DIR__.'/../src/controllers/home-controller.php';
require __DIR__.'/../src/controllers/article-controller.php';
require __DIR__.'/../src/controllers/category-controller.php';

// Récupérer la racine de notre url ('/')
$urlPath = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);


// Lister les routes possibles de notre application (les urls que l'on souhaite gérer)

if ('/' === $urlPath) {
    index(); // page d'accueil
} elseif ('/articles' === $urlPath) {
    listArticles(); // liste des articles
} elseif ('/articles/add' === $urlPath) {
    newArticle(); // formulaire d'ajout d'un article
} elseif ('/articles/show' === $urlPath && isset($_GET['id'])) {
    showArticle($_GET['id']); // afficher un article en détail
} elseif ('/articles/edit' === $urlPath && isset($_GET['id'])) {
    editArticle($_GET['id']); // formulaire de modification d'un article
} elseif ('/articles/delete' === $urlPath && isset($_GET['id'])) {
    removeArticle($_GET['id']); // supprimer un article
} elseif ('/categories' === $urlPath) {
    listCategories(); // liste des catégories
} elseif ('/categories/add' === $urlPath) {
    newCategory(); // formulaire d'ajout d'une catégorie
} elseif ('/categories/edit' === $urlPath && isset($_GET['id'])) {
    editCategory($_GET['id']); // formulaire de modification d'une catégorie
} elseif ('/categories/delete' === $urlPath && isset($_GET['id'])) {
    removeCategory($_GET['id']); // supprimer une catégorie
} else {
    header('HTTP/1.1 404 Not Found');
    notFound(); // page 404
}