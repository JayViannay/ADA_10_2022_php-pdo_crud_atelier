<?php
/*
 * @ PAGE QUI LISTE TOUTES LES CATEGORIES
 * Path: app/pages/category/index.php
 * URL: '/pages/category/index.php'
 */

require '../../../.connec.php';

include_once '../../layouts/head.php';
include_once '../../layouts/body_start.php';
include_once '../../layouts/container_start.php';

$pdo = $pdo = new PDO(DSN, USER, PASSWORD);

$categories = $pdo->query("SELECT * FROM category")->fetchAll(PDO::FETCH_ASSOC);

include_once 'components/create_category.php';
?>
<div class="row mt-5">
    <?php foreach ($categories as $category) { ?>
        <div class="col-lg-3 col-md-6 col-xs-12 mx-auto my-2">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title"><?= $category['name'] ?></h5>
                    <a href=<?="/pages/category/edit.php?id=".$category['id'] ?> class="btn btn-success btn-sm"><i class="fa-solid fa-pen"></i></a>
                    <a href=<?= "/pages/category/delete.php?id=".$category['id'] ?> class="btn btn-danger btn-sm"><i class="fa-solid fa-trash"></i></a>
                </div>
            </div>
        </div>
    <?php } ?>
</div>
<?php 
include_once('../../layouts/container_end.php');
include_once ('../../layouts/scripts.php');
include_once('../../layouts/body_end.php');
?>