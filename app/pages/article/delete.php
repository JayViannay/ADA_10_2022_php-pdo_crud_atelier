<?php
/*
 * @4 - Supprimer un article
 * Path: public/delete.php
 * URL: '/delete.php?id={id}'
 */

require '../../../.connec.php';

 /*
 * 📝 Supprimer un article et rediriger l'utilisateur vers la page index.php
 */

// 📌 1 - Vérifier que l'id d'un article est bien passé en paramètre d'URL
if (isset($_GET['id']) && !empty($_GET['id'])) {
    // 📌 2 - Si l'id est bien passé en paramètre d'URL, réaliser une requête SQL pour supprimer l'article correspondant
    $pdo = new PDO(DSN, USER, PASSWORD);
    $statement = $pdo->prepare("DELETE FROM article WHERE id=:id");
    $statement->bindValue(':id', $_GET['id'], PDO::PARAM_INT);
    $statement->execute();
    
    header('Location: /');
}
// 📌 3 - Dans tous les cas rediriger l'utilisateur vers la page index.php
header('Location: /');
