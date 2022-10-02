<?php
/*
 * @ Supprimer un article
 * Path: app/pages/article/delete.php
 * URL: '/pages/article/delete.php?id={id}'
 */

require '../../../model/article_model.php';

$article = "";
if (isset($_GET['id']) && !empty($_GET['id'])) {
    $article = readOne($_GET['id']);
    // @03_404
    if (empty($article)) {
        header('Location: /pages/404.php');
    }
    delete($article->id);
    header('Location: /');
}