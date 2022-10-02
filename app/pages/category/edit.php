<?php
/*
 * @ PAGE QUI PERMET DE MODIFIER UNE CATEGORY EN BASE DE DONNEES
 * Path: app/pages/category/edit.php
 * URL: '/pages/category/edit.php?id={id}'
 */

include_once '../../layouts/head.php';
include_once '../../layouts/body_start.php';
include_once '../../layouts/container_start.php';

require '../../../model/category_model.php';
$category = "";

if (isset($_GET['id']) && !empty($_GET['id'])) {
    $category = readOneCategory($_GET['id']);
} 

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (!empty($_POST['name'])) {
        updateCategory($category->id, $_POST['name']);
        header('Location: /pages/category/index.php');
    } else {
        $error = "Name field is required !";
    }
}

if (empty($category)) {
    header('Location: /pages/404.php');
}

include_once('components/_form.php');

include_once('../../layouts/container_end.php');
include_once('../../layouts/scripts.php');
include_once('../../layouts/body_end.php');
?>