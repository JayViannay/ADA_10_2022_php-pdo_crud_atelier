<?php
/*
 * @2 - PAGE QUI PERMET D'AJOUTER UN ARTICLE EN BASE DE DONNEES
 * Path: app/pages/article/create.php
 * URL: '/pages/article/create.php'
 */

 /*
 * 📝 Même démarche que pour la page index.php
 */
include_once '../../layouts/head.php';
include_once '../../layouts/body_start.php';
include_once '../../layouts/container_start.php';

require '../../../.connec.php';

$pdo = new PDO(DSN, USER, PASSWORD);

/*
 * 📝 Traiter le formulaire d'ajout d'article
 * Tous les champs du formulaire sont requis, il ne doit donc pas être possible d'ajouter un article sans titre, contenu ou image
 */

// 📌 1 - Déclarer une variable d'erreur vide pour afficher un message d'erreur si le formulaire n'est pas rempli correctement
$error = "";

// 📌 2 - Vérifier que le formulaire a été soumis en methode POST ::TODO 
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // S'assurer que tous les champs sont remplis
   
    // Si tous les champs sont remplis, réaliser une requête SQL pour insérer un nouvel article en base de données (INSERT INTO)
    // Il est préféable d'utiliser une requête préparée pour éviter les injections SQL
        
    //--------------------------------------------------------------
    // 💡 Les requêtes préparées ? par ici => 
    // - https://www.php.net/manual/fr/pdo.prepare.php
    // - https://www.pierre-giraud.com/php-mysql-apprendre-coder-cours/requete-preparee/
    // 💡 Injection SQL ? par ici => https://fr.wikipedia.org/wiki/Injection_SQL
    //--------------------------------------------------------------


    // Une fois l'article ajouté, rediriger l'utilisateur vers la page index.php
    // header('Location: /');
    
    // Si tous les champs ne sont pas remplis, enregistrer un message d'erreur dans la variable $error
}
?>
<div class="row mt-5">
    <h1 class="text-center">Create new Article</h1>
    <div class="col-6 mx-auto">
        <form method="POST" class="mt-5">
            <?php
                if (!empty($error)) {
                    echo "<div class='alert alert-danger'>".$error."</div>";
                }
            ?>
            <div class="mb-3">
                <label for="title" class="form-label">Title *</label>
                <input type="text" class="form-control" id="title" name="title">
            </div>
            <div class="mb-3">
                <label for="content" class="form-label">Content *</label>
                <textarea class="form-control" id="content" rows="3" name="content"></textarea>
            </div>
            <div class="mb-3">
                <label for="image" class="form-label">Image *</label>
                <input type="text" class="form-control" id="image" name="image">
            </div>
            <div class="text-end text-danger">* All fields are required</div>
            <div class="mb-3 text-center">
                <button type="submit" class="btn btn-primary btn-sm">Create</button>
            </div>
        </form>
    </div>
</div>
<?php
include_once('../../layouts/container_end.php');
include_once('../../layouts/scripts.php');
include_once('../../layouts/body_end.php');
?>
