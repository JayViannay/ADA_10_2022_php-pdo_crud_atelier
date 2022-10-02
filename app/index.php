<?php
/*
 * @ PAGE QUI LISTE TOUS LES ARTICLES
 * Path: app/index.php
 * URL: '/'
 */

include_once 'layouts/head.php';
include_once 'layouts/body_start.php';
include_once 'layouts/container_start.php';

// @01_refacto
require '../model/article_model.php';
$articles = readAll();

include_once 'components/create_article.php';
?>
<div class="row mt-5">
    <?php foreach ($articles as $article) { ?>
        <div class="col-lg-3 col-md-6 col-xs-12 mx-auto my-2">
            <div class="card">
                <img src="<?= $article['image'] ?>" class="card-img-top" alt="<?= $article['image'] ?>">
                <div class="card-body">
                    <h5 class="card-title"><?= $article['title'] ?></h5>
                    <p class="card-text"><?= $article['content'] ?></p>
                    <a href=<?="pages/article/show.php?id=".$article['id'] ?> class="btn btn-dark btn-sm mx-auto"><i class="fa-solid fa-eye"></i> read</a>
                    <a href=<?="pages/article/edit.php?id=".$article['id'] ?> class="btn btn-success btn-sm"><i class="fa-solid fa-pen"></i></a>
                    <a href=<?= "pages/article/delete.php?id=".$article['id'] ?> class="btn btn-danger btn-sm"><i class="fa-solid fa-trash"></i></a>
                </div>
            </div>
        </div>
    <?php } ?>
</div>
<?php 
include_once('layouts/container_end.php');
include_once ('layouts/scripts.php');
include_once('layouts/body_end.php');
?>