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

require '../../../model/article_model.php';
$article = "";

if (isset($_GET['id']) && !empty($_GET['id'])) {
    $article = readOne($_GET['id']);
}

// 📌 6 - Vérifier que le formulaire a été soumis en methode POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (!empty($_POST['title']) && !empty($_POST['content']) && !empty($_POST['image'])) {
        update($article->id, $_POST['title'], $_POST['content'], $_POST['image']);
        header('Location: /');
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
            if (!empty($error)) {
                echo "<div class='alert alert-danger'>" . $error . "</div>";
            }
            ?>
            <div class="mb-3">
                <label for="title" class="form-label">Title</label>
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