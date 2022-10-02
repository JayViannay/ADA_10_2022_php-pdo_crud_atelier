<?php
/*
 * @ PAGE QUI AFFICHE UN ARTICLE EN DETAIL
 * Path: public/pages/article/read.php
 * URL: '/pages/article/read.php?id={id}'
 */

include_once '../../layouts/head.php';
include_once '../../layouts/body_start.php';
include_once '../../layouts/container_start.php';

require '../../../model/article_model.php';

$article = "";
if (isset($_GET['id']) && !empty($_GET['id'])) {
    $article = readOne($_GET['id']);
}
// @03_404
if (empty($article)) {
    header('Location: /pages/404.php');
}
?>
<div class="row mt-5">
    <div class="col-4 mx-auto">
        <img src="<?= $article->image ?>" class="card-img-top" alt="<?= $article->image ?>">
    </div>
    <div class="col-8">
        <h5 class="card-title"><?= $article->title ?></h5>
        <p class="card-text"><?= $article->content ?></p>
        <a href="/" class="btn btn-dark btn-sm mx-auto"><i class="fa-solid fa-rotate-left"></i> return</a>
        <a href=<?="edit.php?id=".$article->id ?> class="btn btn-success btn-sm"><i class="fa-solid fa-pen"></i></a>
        <a href=<?= "delete.php?id=".$article->id ?> class="btn btn-danger btn-sm"><i class="fa-solid fa-trash"></i></a>
    </div>
</div>
<?php
include_once('../../layouts/container_end.php');
include_once('../../layouts/scripts.php');
include_once('../../layouts/body_end.php');
?>