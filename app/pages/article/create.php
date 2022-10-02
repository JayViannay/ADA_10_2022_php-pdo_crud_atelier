<?php
/*
 * @ PAGE QUI PERMET D'AJOUTER UN ARTICLE EN BASE DE DONNEES
 * Path: app/pages/article/create.php
 * URL: '/pages/article/create.php'
 */
include_once '../../layouts/head.php';
include_once '../../layouts/body_start.php';
include_once '../../layouts/container_start.php';

require '../../../model/article_model.php';
require '../../../model/category_model.php';

$error = "";

//@05_relation récupération des categories disponibles pour les afficher dans le formulaire
$categories = readAllCategories();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // @05_relation gestion du champs category_id de la table article
    if (!empty($_POST['title']) && !empty($_POST['content']) && !empty($_POST['image']) && !empty($_POST['category_id'])) {
        createArticle($_POST['title'], $_POST['content'], $_POST['image'], $_POST['category_id']);
        header('Location: /');
    } else {
        $error = "All fields are required !";
    }
}

include_once('components/_form.php');

include_once('../../layouts/container_end.php');
include_once('../../layouts/scripts.php');
include_once('../../layouts/body_end.php');
?>
