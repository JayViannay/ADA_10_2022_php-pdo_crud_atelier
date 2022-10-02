<?php
/*
 * @ PAGE QUI PERMET D'AJOUTER UN ARTICLE EN BASE DE DONNEES
 * Path: app/pages/article/create.php
 * URL: '/pages/article/create.php'
 */
include_once '../../layouts/head.php';
include_once '../../layouts/body_start.php';
include_once '../../layouts/container_start.php';

// @01_refacto
require '../../../model/article_model.php';

$error = "";
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (!empty($_POST['title']) && !empty($_POST['content']) && !empty($_POST['image'])) {
        // @01_refacto
        create($_POST['title'], $_POST['content'], $_POST['image']);
        header('Location: /');
    } else {
        $error = "All fields are required !";
    }
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
