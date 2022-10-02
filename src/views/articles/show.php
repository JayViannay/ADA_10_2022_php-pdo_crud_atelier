<?php
/*
 * @ PAGE QUI AFFICHE UN ARTICLE EN DETAIL
 * Path: public/pages/article/read.php
 * URL: '/pages/article/read.php?id={id}'
 */

require __DIR__.'/../layouts/head.php';
require __DIR__.'/../layouts/body_start.php';
require __DIR__.'/../layouts/container_start.php';

?>
<div class="row mt-5">
    <div class="col-4 mx-auto">
        <img src="<?= $article->image ?>" class="card-img-top" alt="<?= $article->image ?>">
    </div>
    <div class="col-8">
        <h5 class="card-title"><?= $article->title ?></h5>
        <p class="card-text"><?= $article->content ?></p>
        <a href="/articles" class="btn btn-dark btn-sm mx-auto"><i class="fa-solid fa-rotate-left"></i> return</a>
        <a href=<?="/articles/edit?id=".$article->id ?> class="btn btn-success btn-sm"><i class="fa-solid fa-pen"></i></a>
        <a href=<?= "/articles/delete?id=".$article->id ?> class="btn btn-danger btn-sm"><i class="fa-solid fa-trash"></i></a>
    </div>
</div>
<?php
require __DIR__.'/../layouts/container_end.php';
require __DIR__.'/../layouts/scripts.php';
require __DIR__.'/../layouts/body_end.php';
?>