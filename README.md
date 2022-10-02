# ATELIER CRUD - @04_handleEditCreateForm

## Présentation

La encore, il s'agit de faire évoluer notre application pour qu'elle puisse gérer la modification et la création d'un article avec un seul formulaire.
C'est encore une fois une bonne pratique de repérer le code qui se repete et de le factoriser.

### Consignes : 
La première étape consiste à isoler notre formulaire dans un composant dédié.
Pour cela, nous allons créer un nouveau dossier `components` à l'interieur de `pages/article` dans lequel nous allons créer un nouveau composant `_form.php_`.
Ce composant va contenir le code HTML du formulaire que nous allons récupérer depuis notre fichier `edit.php`.

Quelques ajustements s'imposent :

Si nous partons du principe que nous utilisons le même formulaire pour la création et la modification, nous devons pouvoir lui passer en paramètre l'article à modifier mais si nous sommes en création, nous n'avons pas d'article à passer en paramètre.

Pour cela nous pouvons utiliser la fonction empty() qui retourne true si une variable est vide et false si elle contient une valeur.

De plus, nous pouvons utiliser le ternaire pour gérer si nous sommes en création ou en modification.

```php
// si l'article n'est pas vide, on affiche son id sinon on affiche une chaine vide
<?= !empty($article) ? $article->id : '' ?>
```

Ainsi, nous pouvons utiliser le même formulaire pour la création et la modification en ajuster la valeur du bouton submit ainsi que le titre de la page.

### Tips :

> 👀 tu peux suivre le commentaire @04_handleEditCreateForm pour te guider dans le code.


### Evolutions possibles du projet :

- @404 : Gérer les erreurs 404 au cas où l'utilisateur tente d'accéder à une ressource qui n'existe pas.
- @refacto : Factoriser le code : créer des fonctions pour les requêtes SQL et les redirections. (créer un fichier `article_model.php` dans un dossier `model` et y écrire les fonctions nécessaires à l'application tout en les appelant dans les fichiers adéquats)
- @handleErrorDb : Gérer les erreurs SQL : afficher un message d'erreur en cas d'erreur SQL pour les ressource article. (try/catch)
- @handleEditCreateForm : Gérer les fonctionnalités de création et de modification des articles à l'aide d'un seul et même formulaire.
- @ajax : Gérer les fonctionnalités du CRUD article en AJAX.
- @relation : Ajouter une relation entre le table `article` et `category` (clé étrangère) et ajuster la création, l'édition et la suppression des article en AJAX en prenant en compte la relation entre les deux tables.