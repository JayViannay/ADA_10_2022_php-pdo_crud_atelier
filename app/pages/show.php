<?php
/*
 * @5 - PAGE QUI AFFICHE UN ARTICLE EN DETAIL
 * Path: public/read.php
 * URL: '/read.php?id={id}'
 */

/*
* 📝 Même démarche que pour la page index.php
*/
include_once '../layouts/head.php';
include_once '../layouts/body_start.php';
include_once '../layouts/container_start.php';

require '../../.connec.php';

/*
 * 📝 Récupérer les infos de l'article depuis l'id passé en paramètre d'URL
 */

// 📌 1 - Déclarer une variable $article vide
$article = "";

// 📌 2 - Vérifier que l'id est bien passé en paramètre d'URL
if (isset($_GET['id']) && !empty($_GET['id'])) {
    // 📌 3 - Si l'id est bien passé en paramètre d'URL, réaliser une requête SQL pour récupérer les infos de l'article correspondant
    $pdo = new PDO(DSN, USER, PASSWORD);
    $statement = $pdo->prepare('SELECT * FROM article WHERE id=:id');
    $statement->bindValue(':id', $_GET['id'], PDO::PARAM_INT);
    $statement->execute();
    // 📌 4 - Stocker les infos de l'article dans la variable $article en utilisant la méthode fetch() 
    // et l'argument PDO::FETCH_OBJ pour récupérer les données en format objet
    $article = $statement->fetch(PDO::FETCH_OBJ);
} else {
    // 📌 5 - Si l'id n'est pas passé en paramètre d'URL, rediriger l'utilisateur vers la page index.php
    header('Location : index.php');
}
?>
<div class="row mt-5">
    <div class="col-4 mx-auto">
            <!-- afficher l'image de l'article -->
            <img src="<?= $article->image ?>" class="card-img-top" alt="<?= $article->image ?>">
    </div>
    <div class="col-8">
        <!-- afficher le titre de l'article -->
        <h5 class="card-title"><?= $article->title ?></h5>
        <!-- afficher le contenu de l'article -->
        <p class="card-text"><?= $article->content ?></p>
        <!-- afficher le lien de l'article pour le consulter sur une page dédié -->
        <a href="/" class="btn btn-dark btn-sm mx-auto"><i class="fa-solid fa-rotate-left"></i> return</a>
        <!-- afficher le lien de l'article pour le modifier sur une page dédié -->
        <a href=<?="edit.php?id=".$article->id ?> class="btn btn-success btn-sm"><i class="fa-solid fa-pen"></i></a>
        <!-- afficher le lien de l'article pour le supprimer -->
        <a href=<?= "delete.php?id=".$article->id ?> class="btn btn-danger btn-sm"><i class="fa-solid fa-trash"></i></a>
    </div>
</div>
<?php
include_once('../layouts/container_end.php');
include_once('../layouts/scripts.php');
include_once('../layouts/body_end.php');
?>