<?php
require __DIR__.'/../layouts/head.php';
require __DIR__.'/../layouts/body_start.php';
require __DIR__.'/../layouts/container_start.php';

include_once 'components/create_category.php';
?>
<div class="row mt-5">
    <?php foreach ($categories as $category) { ?>
        <div class="col-lg-3 col-md-6 col-xs-12 mx-auto my-2">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title"><?= $category['name'] ?></h5>
                    <a href=<?="/categories/edit?id=".$category['id'] ?> class="btn btn-success btn-sm"><i class="fa-solid fa-pen"></i></a>
                    <a href=<?= "/categories/delete?id=".$category['id'] ?> class="btn btn-danger btn-sm"><i class="fa-solid fa-trash"></i></a>
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