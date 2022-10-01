<?php
/*
 * @3 - PAGE QUI PERMET DE MODIFIER UN ARTICLE EN BASE DE DONNEES
 * Path: public/pages/article/edit.php
 * URL: '/pages/article/edit.php?id={id}'
 */

 /*
 * 📝 Même démarche que pour la page index.php et create.php
 */
include_once '../../layouts/head.php';
include_once '../../layouts/body_start.php';
include_once '../../layouts/container_start.php';

require '../../../.connec.php';

/*
 * 📝 Récupérer les infos de l'article à modifier en base de données depuis l'id passé en paramètre d'URL
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
} 
/*
 * 📝 Traiter le formulaire de modification d'article
 */

// 📌 6 - Vérifier que le formulaire a été soumis en methode POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // 📌 7.1 - S'assurer que tous les champs sont remplis
    if (!empty($_POST['title']) && !empty($_POST['content']) && !empty($_POST['image'])) {
        // 📌 8 - Si tous les champs sont remplis, réaliser une requête SQL pour modifier l'article en base de données
        $statement = $pdo->prepare("UPDATE article SET title=:title, content=:content, image=:image WHERE id=:id");
        $statement->bindValue(":title", $_POST['title'], PDO::PARAM_STR);
        $statement->bindValue(":content", $_POST['content'], PDO::PARAM_STR);
        $statement->bindValue(":image", $_POST['image'], PDO::PARAM_STR);
        $statement->bindValue(":id", $article->id, PDO::PARAM_STR);
        $statement->execute();

        // 📌 9 - Rediriger l'utilisateur vers la page index.php
        header('Location: /');
    // 📌 7.2 - Si tous les champs ne sont pas remplis, enregistrer un message d'erreur
    } else {
        $error = "All fields are required !";
    }
}
?>
<div class="row mt-5">
    <h1 class="text-center">Update Article # <?= $article->id ?></h1>
    <div class="col-6 mx-auto">
        <form method="POST">
            <?php
            // 📌 7.3 - Afficher un message d'erreur si le formulaire n'a pas été correctement rempli
            if (!empty($error)) {
                echo "<div class='alert alert-danger'>" . $error . "</div>";
            }
            ?>
            <div class="mb-3">
                <label for="title" class="form-label">Title</label>
                <!-- 📌 10 - Afficher la valeur de l'article dans le champ title -->
                <!-- Ici $article a été formatté en objet, en php nous utilisons '->' pour récupérer l'attribut d'un objet -->
                <!-- Ainsi, si je sais que mon article a une propriété 'title' j'écrirai en php : `$article->title`, 
                si je suis dans le cas d'un tableau associatif j'écrirai $article['title']
                * En JS par exemple j'écrirai `article.title` -->
                <input type="text" class="form-control" id="title" name="title" value=<?= $article->title ?>>
            </div>
            <div class="mb-3">
                <label for="content" class="form-label">Content</label>
                <textarea class="form-control" id="content" rows="3" name="content"><?= $article->content ?></textarea>
            </div>
            <div class="mb-3">
                <label for="image" class="form-label">Image</label>
                <input type="text" class="form-control" id="image" name="image" value=<?= $article->image ?>>
            </div>
            <div class="mb-3 text-center">
                <button type="submit" class="btn btn-primary btn-sm">Update</button>
            </div>
        </form>
    </div>
</div>
<?php
include_once('../../layouts/container_end.php');
include_once('../../layouts/scripts.php');
include_once('../../layouts/body_end.php');
?>