<?php
/*
 * @ PAGE QUI PERMET DE MODIFIER UN ARTICLE EN BASE DE DONNEES
 * Path: public/pages/article/edit.php
 * URL: '/pages/article/edit.php?id={id}'
 */

include_once '../../layouts/head.php';
include_once '../../layouts/body_start.php';
include_once '../../layouts/container_start.php';

require '../../../model/article_model.php';
require '../../../model/category_model.php';

$article = "";
$categories = readAllCategories();

if (isset($_GET['id']) && !empty($_GET['id'])) {
    $article = readOneArticle($_GET['id']);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (!empty($_POST['title']) && !empty($_POST['content']) && !empty($_POST['image']) && !empty($_POST['category_id'])) {
        updateArticle($article->id, $_POST['title'], $_POST['content'], $_POST['image'], $_POST['category_id']);
        header('Location: /');
    } else {
        $error = "All fields are required !";
    }
}

if (empty($article)) {
    header('Location: /pages/404.php');
}

include_once('components/_form.php');

include_once('../../layouts/container_end.php');
include_once('../../layouts/scripts.php');
include_once('../../layouts/body_end.php');
?>