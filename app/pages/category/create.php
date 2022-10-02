<?php
/*
 * @ PAGE QUI PERMET D'AJOUTER UNE CATEGORY EN BASE DE DONNEES
 * Path: app/pages/category/create.php
 * URL: '/pages/category/create.php'
 */

include_once '../../layouts/head.php';
include_once '../../layouts/body_start.php';
include_once '../../layouts/container_start.php';

require '../../../model/category_model.php';

$error = "";
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (!empty($_POST['name'])) {
        createCategory($_POST['name']);
        header('Location: /pages/category/index.php');
    } else {
        $error = "Name field is required !";
    }
}

include_once('components/_form.php');

include_once('../../layouts/container_end.php');
include_once('../../layouts/scripts.php');
include_once('../../layouts/body_end.php');
?>
