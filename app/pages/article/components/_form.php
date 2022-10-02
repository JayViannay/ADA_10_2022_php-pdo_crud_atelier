<div class="row mt-5">
    <h1 class="text-center"><?= isset($article) ? "Update Article # " .$article->id : "Create New Article" ?></h1>
    <div class="col-6 mx-auto">
        <form method="POST">
            <?php
            if (isset($error) && !empty($error)) {
                echo "<div class='alert alert-danger'>" . $error . "</div>";
            }
            ?>
            <div class="mb-3">
                <label for="title" class="form-label">Title</label>
                <!-- @05_relation gerer l'affichage, si $article n'existe pas on affihce rien mais si il exsite on affiche ses valeurs dans le form" -->
                <input type="text" class="form-control" id="title" name="title" value=<?= isset($article) ? $article->title : "" ?>>
            </div>
            <div class="mb-3">
            <!-- @05_relation gestion du champs category_id de la table article 
                Ajout d'un nouveau champs select pour le choix d'un categorie
            -->
                <select class="form-select" name="category_id" id="category_id">
                    <option selected>Select a category</option>
                    <!-- Boucle sur les categories pour afficher les options -->
                    <?php foreach ($categories as $category) : ?>
                        <option value="<?= $category['id'] ?>"><?= $category['name'] ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="mb-3">
                <label for="content" class="form-label">Content</label>
                <textarea class="form-control" id="content" rows="3" name="content"><?= isset($article) ? $article->content : "" ?></textarea>
            </div>
            <div class="mb-3">
                <label for="image" class="form-label">Image</label>
                <input type="text" class="form-control" id="image" name="image" value=<?= isset($article) ? $article->image : "" ?>>
            </div>
            <div class="mb-3 text-center">
                <button type="submit" class="btn btn-primary btn-sm"><?= isset($article) ? "Update" : "Create" ?></button>
            </div>
        </form>
    </div>
</div>