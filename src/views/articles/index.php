<?php
require __DIR__.'/../layouts/head.php';
require __DIR__.'/../layouts/body_start.php';
require __DIR__.'/../layouts/container_start.php';

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
                    <p class="card-text"><span class="badge text-bg-secondary"><?= $article['category_name'] ?></span></p>
                    <a href=<?="/articles/show?id=".$article['id'] ?> class="btn btn-dark btn-sm mx-auto"><i class="fa-solid fa-eye"></i> read</a>
                    <a href=<?="/articles/edit?id=".$article['id'] ?> class="btn btn-success btn-sm"><i class="fa-solid fa-pen"></i></a>
                    <a href=<?= "/articles/delete?id=".$article['id'] ?> class="btn btn-danger btn-sm"><i class="fa-solid fa-trash"></i></a>
                </div>
            </div>
        </div>
    <?php } ?>
</div>
<?php 
require __DIR__.'/../layouts/container_end.php';
require __DIR__.'/../layouts/scripts.php';
require __DIR__.'/../layouts/body_end.php';
?>