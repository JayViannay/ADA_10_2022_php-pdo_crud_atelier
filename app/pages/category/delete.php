<?php
/*
 * @4 Supprimer une category
 * Path: app/pages/category/delete.php
 * URL: '/pages/category/delete.php?id={id}'
 */

require '../../../.connec.php';

if (isset($_GET['id']) && !empty($_GET['id'])) {
    $pdo = new PDO(DSN, USER, PASSWORD);
    $statement = $pdo->prepare("DELETE FROM category WHERE id=:id");
    $statement->bindValue(':id', $_GET['id'], PDO::PARAM_INT);
    $statement->execute();
    
    header('Location: /pages/category/index.php');
}
header('Location: /pages/category/index.php');