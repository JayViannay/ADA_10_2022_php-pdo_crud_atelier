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

$error = "";
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (!empty($_POST['title']) && !empty($_POST['content']) && !empty($_POST['image'])) {
        create($_POST['title'], $_POST['content'], $_POST['image']);
        header('Location: /');
    } else {
        $error = "All fields are required !";
    }
}
// @04_handleEditCreateForm
include_once('components/_form.php');

include_once('../../layouts/container_end.php');
include_once('../../layouts/scripts.php');
include_once('../../layouts/body_end.php');
?>
