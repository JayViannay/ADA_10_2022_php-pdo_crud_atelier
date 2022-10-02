# ATELIER CRUD - @01_refacto

Tu peux repartir de la branche correction pour travailler sur les évolutions possibles ou bien de ton propre repo si tu as déjà réalisé l'exercice de la branche main et que tes cruds sont fonctionnels.

## Refactorisation :

- [ ] Créer un dossier `model` à la racine du projet et y créer un fichier `article-model.php` qui contiendra les fonctions de gestion des articles.
  - La première chose à faire est d'ajouter la dépendance à la base de données dans ce fichier : `require __DIR__ . '/../.connec.php';`
  - Puis on prépare toutes les fonctions de gestion des articles par ex :
    - `function findAllArticles(){...}`
    - `function findArticleById($id){...}`
    - `function insertArticle($title, $content, $image) {...}`
    - `function updateArticle($id, $title, $content, $image) {...}`
    - `function deleteArticle($id)` 

- [ ] COUPER/COLLER les morceaux de code de gestion des articles dans le fichier `article-model.php` 
  - Exemple : 
    - Dans le fichier `app/index.php` on a le code suivant :
      ```php
      require '../.connec.php';
      $pdo = new PDO(DSN, USER, PASS);
      $articles = $pdo->query("SELECT * FROM article")->fetchAll(PDO::FETCH_ASSOC);
      ```
    - Ce qui devient dans la fonction `findAllArticles()` du fichier `article-model.php` :
      ```php
      function findAllArticles(){
          $pdo = new PDO(DSN, USER, PASS);
          return $pdo->query("SELECT * FROM article")->fetchAll(PDO::FETCH_ASSOC);
      }
      ```
    - Et dans le fichier `app/index.php` on a maintenant :
      ```php
      require '../model/article-model.php';
      $articles = findAllArticles();
      ```
- [ ] Refactorise le code en déplassant tous les morceaux de code de gestion des articles vers `article-model.php` et remplace les par des appels aux fonctions du fichier `article-model.php` 


### TIPS :

- 💡 Tu peux suivre le commentaire `// @01_refacto` pour consulter les fichiers qui ont subits des modifications lors de la refactorisation.