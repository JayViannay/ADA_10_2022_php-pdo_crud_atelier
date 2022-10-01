<?php
/*
 * @ PAGE QUI PERMET DE MODIFIER UNE CATEGORY EN BASE DE DONNEES
 * Path: app/pages/category/edit.php
 * URL: '/pages/category/edit.php?id={id}'
 */

include_once '../../layouts/head.php';
include_once '../../layouts/body_start.php';
include_once '../../layouts/container_start.php';

require '../../../.connec.php';

$category = "";

// 📌 2 - Vérifier que l'id est bien passé en paramètre d'URL
if (isset($_GET['id']) && !empty($_GET['id'])) {
    $pdo = new PDO(DSN, USER, PASSWORD);
    $statement = $pdo->prepare('SELECT * FROM category WHERE id=:id');
    $statement->bindValue(':id', $_GET['id'], PDO::PARAM_INT);
    $statement->execute();
    $category = $statement->fetch(PDO::FETCH_OBJ);
} 

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (!empty($_POST['name'])) {
        $statement = $pdo->prepare("UPDATE category SET name=:name WHERE id=:id");
        $statement->bindValue(":name", $_POST['name'], PDO::PARAM_STR);
        $statement->bindValue(":id", $category->id, PDO::PARAM_INT);
        $statement->execute();

        header('Location: /pages/category/index.php');
    } else {
        $error = "Name field is required !";
    }
}
?>
<div class="row mt-5">
    <h1 class="text-center">Update Category # <?= $category->id ?></h1>
    <div class="col-6 mx-auto">
        <form method="POST">
            <?php
            if (!empty($error)) {
                echo "<div class='alert alert-danger'>" . $error . "</div>";
            }
            ?>
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control" id="name" name="name" value=<?= $category->name ?>>
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