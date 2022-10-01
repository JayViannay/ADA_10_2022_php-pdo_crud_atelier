<?php
/*
 * @4 - Supprimer un article
 * Path: app/pages/article/delete.php
 * URL: '/pages/article/delete.php?id={id}'
 */

require '../../../.connec.php';

 /*
 * 📝 Supprimer un article et rediriger l'utilisateur vers la page index.php
 */

// 📌 1 - Vérifier que l'id d'un article est bien passé en paramètre d'URL ::TODO 
if (isset($_GET['id']) && !empty($_GET['id'])) {
    // 📌 2 - Si l'id est bien passé en paramètre d'URL, réaliser une requête SQL pour supprimer l'article correspondant
    
    // Une fois l'article supprimé, rediriger l'utilisateur vers la page index.php
    // header('Location: /');
}
// 📌 3 - Dans tous les cas rediriger l'utilisateur vers la page index.php
header('Location: /');
