<div class="row mt-5">
    <h1 class="text-center"><?= isset($category) ? "Update Category # " .$category->id : "Create New Category" ?></h1>
    <div class="col-6 mx-auto">
        <form method="POST">
            <?php
            if (!empty($error)) {
                echo "<div class='alert alert-danger'>" . $error . "</div>";
            }
            ?>
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control" id="name" name="name" value=<?= isset($category) ? $category->name : "" ?>>
            </div>
            <div class="mb-3 text-center">
                <button type="submit" class="btn btn-primary btn-sm"><?= isset($category) ? "Update" : "Create" ?></button>
            </div>
        </form>
    </div>
</div>