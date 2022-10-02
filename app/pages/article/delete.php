<?php
/*
 * @ Supprimer un article
 * Path: app/pages/article/delete.php
 * URL: '/pages/article/delete.php?id={id}'
 */

 // @01_refacto
require '../../../model/article_model.php';

if (isset($_GET['id']) && !empty($_GET['id'])) {
    // @01_refacto
    delete($_GET['id']);
    
    header('Location: /');
}
header('Location: /');
