<?php
/*
 * @1 - PAGE QUI LISTE TOUS LES ARTICLES
 * Path: public/index.php
 * URL: '/'
 */

/*
 * 📝 Dépendances de la page index.php
 */

// 📌 1 - On inclu le fichier .connec.php qui contient les informations de connexion à la base de données
require '../.connec.php';

// 📌 2 - On inclu les fichiers head.php et body_start.php qui contiennent les balises <head> et <body> de la page
include_once 'layouts/head.php';
include_once 'layouts/body_start.php';
// 📌 3 - On inclu le fichier container_start.php qui contient la balise <div class="container"> de la page
include_once 'layouts/container_start.php';

//--------------------------------------------------------------
// 💡 Différence entre include et require ? par ici => https://www.php.net/manual/fr/function.require.php
//--------------------------------------------------------------

/*
 * 📝 Récupérer tous les articles en base de données :
 */

//--------------------------------------------------------------
// 💡 Les tableaux php ? par ici => https://www.php.net/manual/fr/language.types.array.php
//--------------------------------------------------------------

// 📌 1 Créer une instance de la classe PDO et se connecter à la base de données avec les constantes définies dans le fichier .connec.php
$pdo = $pdo = new PDO(DSN, USER, PASSWORD);

// 📌 (optionnel) Afficher un message si la connexion à la base de données a réussi
// if ($pdo) {
//     echo "<p class='text-center alert alert-success'>Connexion à la base de données OK 😎<p>";
// }

// 📌 2 Réaliser une requête SQL pour récupérer toutes les données de la table `article`
// Stocker le résultat de la requête dans une variable $articles
// Formater les données récupérées sous forme de tableau associatif
$articles = $pdo->query("SELECT * FROM article")->fetchAll(PDO::FETCH_ASSOC);
// Pour débuguer le tableau $articles et afficher son contenu, décommenter la ligne suivante :
// var_dump($articles);

// Afficher le lien vers la page d'ajout d'article
include_once 'components/create_article.php';
?>
<div class="row mt-5">
    <!-- 📝 Afficher tous les articles du tableau $articles en integrant un code html : -->
    <!-- Pour chaque article, afficher le titre, le contenu et l'image -->
    <!-- Boucler sur le tableau $articles en php -->
    <!--
    //--------------------------------------------------------------
    // 💡 La boucle foreach php ? par ici => https://www.php.net/manual/fr/control-structures.foreach.php
    //--------------------------------------------------------------
    -->
    <?php 
        foreach ($articles as $article) { 
        // A chaque tour de boucle, afficher un article -->
        // $article est un tableau associatif qui contient les données d'un article =>
        // une clé 'title' pour la propriété title, une clé 'content' pour la propriété content et une clé 'image' pour la proriété image -->
        
        // Pour débuguer un article et afficher son contenu, décommenter la ligne suivante :
        // var_dump($article);
    ?>
        <div class="col-lg-3 col-md-6 col-xs-12 mx-auto my-2">
            <div class="card">
                <!-- afficher l'image de l'article -->
                <img src="<?= $article['image'] ?>" class="card-img-top" alt="<?= $article['image'] ?>">
                <div class="card-body">
                    <!-- afficher le titre de l'article -->
                    <h5 class="card-title"><?= $article['title'] ?></h5>
                    <!-- afficher le contenu de l'article -->
                    <p class="card-text"><?= $article['content'] ?></p>
                    <!-- afficher le lien de l'article pour le consulter sur une page dédié -->
                    <a href=<?="pages/article/show.php?id=".$article['id'] ?> class="btn btn-dark btn-sm mx-auto"><i class="fa-solid fa-eye"></i> read</a>
                    <!-- afficher le lien de l'article pour le modifier sur une page dédié -->
                    <a href=<?="pages/article/edit.php?id=".$article['id'] ?> class="btn btn-success btn-sm"><i class="fa-solid fa-pen"></i></a>
                    <!-- afficher le lien de l'article pour le supprimer -->
                    <a href=<?= "pages/article/delete.php?id=".$article['id'] ?> class="btn btn-danger btn-sm"><i class="fa-solid fa-trash"></i></a>
                </div>
            </div>
        </div>
    <?php } ?>
</div>
<?php 
/*
 * 📝 Suite et Fin des dépendances de la page index.php
 */

// 📌 4 - On inclu le fichier container_end.php qui contient la balise </div> de la page
include_once('layouts/container_end.php');
// 📌 5 - On inclu le fichier scripts.php qui contient les dépendances javascript de la page
include_once ('layouts/scripts.php');
// 📌 6 - On inclu le fichier body_end.php qui contient la balise </body> de la page
include_once('layouts/body_end.php');
?>