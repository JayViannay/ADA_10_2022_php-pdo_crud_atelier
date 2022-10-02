<?php
/*
 * @4 Supprimer une category
 * Path: app/pages/category/delete.php
 * URL: '/pages/category/delete.php?id={id}'
 */

require '../../../model/category_model.php';

$category = "";
if (isset($_GET['id']) && !empty($_GET['id'])) {
    $category = readOne($_GET['id']);
    if (empty($category)) {
        header('Location: /pages/404.php');
    }
    deleteCategory($category->id);
    header('Location: /pages/category/index.php');
}