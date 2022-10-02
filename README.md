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
