<?php
/*
 * @5 - PAGE QUI AFFICHE UN ARTICLE EN DETAIL
 * Path: public/pages/article/read.php
 * URL: '/pages/article/read.php?id={id}'
 */

/*
* 📝 Même démarche que pour la page index.php
*/
include_once '../../layouts/head.php';
include_once '../../layouts/body_start.php';
include_once '../../layouts/container_start.php';

require '../../../.connec.php';

/*
 * 📝 Récupérer les infos de l'article depuis l'id passé en paramètre d'URL
 */

// 📌 1 - Déclarer une variable $article vide ::TODO

// 📌 2 - Vérifier que l'id est bien passé en paramètre d'URL ::TODO
if (isset($_GET['id']) && !empty($_GET['id'])) {
    // 📌 3 - Si l'id est bien passé en paramètre d'URL, réaliser une requête SQL pour récupérer les infos de l'article correspondant
    // 📌 4 - Stocker les infos de l'article dans la variable $article en utilisant la méthode fetch() 
    // et l'argument PDO::FETCH_OBJ pour récupérer les données en format objet
}
?>
<div class="row mt-5">
    <div class="col-4 mx-auto">
            <!-- afficher l'image de l'article -->
            <img src="<?= 'ton code ici'; ?>" class="card-img-top" alt="<?= 'ton code ici'; ?>">
    </div>
    <div class="col-8">
        <!-- afficher le titre de l'article -->
        <h5 class="card-title"><?= 'ton code ici'; ?></h5>
        <!-- afficher le contenu de l'article -->
        <p class="card-text"><?= 'ton code ici'; ?></p>
        <!-- afficher le lien de l'article pour le consulter sur une page dédié -->
        <a href="/" class="btn btn-dark btn-sm mx-auto"><i class="fa-solid fa-rotate-left"></i> return</a>
        <!-- afficher le lien de l'article pour le modifier sur une page dédié -->
        <a href=<?="edit.php?id=" ?> class="btn btn-success btn-sm"><i class="fa-solid fa-pen"></i></a>
        <!-- afficher le lien de l'article pour le supprimer -->
        <a href=<?= "delete.php?id=" ?> class="btn btn-danger btn-sm"><i class="fa-solid fa-trash"></i></a>
    </div>
</div>
<?php
include_once('../../layouts/container_end.php');
include_once('../../layouts/scripts.php');
include_once('../../layouts/body_end.php');
?>