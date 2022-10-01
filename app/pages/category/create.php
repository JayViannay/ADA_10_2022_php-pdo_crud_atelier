<?php
/*
 * @ PAGE QUI PERMET D'AJOUTER UNE CATEGORY EN BASE DE DONNEES
 * Path: app/pages/category/create.php
 * URL: '/pages/category/create.php'
 */

include_once '../../layouts/head.php';
include_once '../../layouts/body_start.php';
include_once '../../layouts/container_start.php';

require '../../../.connec.php';

$pdo = new PDO(DSN, USER, PASSWORD);

$error = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (!empty($_POST['name'])) {
        $statement = $pdo->prepare("INSERT INTO category (name) VALUES (:name)");
        $statement->bindValue(":name", $_POST['name'], PDO::PARAM_STR);
        $statement->execute();
        header('Location: /pages/category/index.php');
    } else {
        $error = "Name field is required !";
    }
}
?>
<div class="row mt-5">
    <h1 class="text-center">Create new Category</h1>
    <div class="col-6 mx-auto">
        <form method="POST" class="mt-5">
            <?php
                if (!empty($error)) {
                    echo "<div class='alert alert-danger'>".$error."</div>";
                }
            ?>
            <div class="mb-3">
                <label for="name" class="form-label">Name *</label>
                <input type="text" class="form-control" id="name" name="name">
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
