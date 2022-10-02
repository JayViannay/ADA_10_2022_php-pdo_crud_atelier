# ATELIER CRUD - PHP/PDO Architecture MVC (Model Vue Controller)

## Présentation

L'architecture MVC (Model Vue Controller) est une architecture logicielle qui sépare les données de l'interface utilisateur. Elle est utilisée dans les applications web pour séparer les différentes responsabilités d'une application web.

Dans cette architecture, les données sont gérées par les modèles, l'interface utilisateur par les vues et la logique de l'application par les contrôleurs.

Dans le dossier `public` se trouve le fichier `index.php` qui est le point d'entrée de l'application. Il va charger le fichier `.connec.php` qui contient nos accès à la base de données. Il va ensuite charger le fichier `routing.php` qui va définir les routes de l'application.

Dans le dossier `src` se trouve le dossier `controllers` qui contient les contrôleurs de l'application, le dossier `models` où se trouve les modèles de l'application ainsi que le dossier `views` dans lequel il y a les vues de l'application.

## Installation du projet

>##### Prérequis :
>- PHP >= 7.4
>- PDO DRIVER ON
>- MySQL >= 5.7

### Cloner le projet
```bash
git clone git@github.com:JennyViannay/ADA_10_2022_php-pdo_crud_atelier.git atelier-crud-php-pdo
```

### Se positionner sur la branche `mvc_architecture`
```bash
git checkout mvc_architecture
```

### Configuration de la base de données

- Créer une base de données MySQL depuis le fichier `atelier_crud.sql` situé à la racine du projet.

- Créer un fichier `.connec.php` à la racine du projet et y renseigner les informations de connexion à la base de données comme dans l'exemple du fichier `.connec.php.dist`.


### Lancer le projet

- Lancer le serveur PHP en ligne de commande depuis la racine du dossier 

```bash
php -S localhost:8000 -t public
```

>💡 L'attribut `-t` permet de spécifier le dossier racine dans lequel se >trouve l'application, dans notre cas il s'agit du dossier `app`):
>[WebServer PHP doc](https://www.php.net/manual/fr/features.commandline.webserver.php)

- Ouvrir l'application dans un navigateur à l'adresse suivante: [http://localhost:8000](http://localhost:8000)

### Fonctionnalités présentes dans l'application :

- Page d'accueil : [http://localhost:8000](http://localhost:8000)

- CREATE ARTICLE : Création d'un article [http://localhost:8000/articles/add](http://localhost:8000/articles/create)
- READ ALL ARTICLES : Affichage de la liste des articles [http://localhost:8000/articles](http://localhost:8000/articles)
- READ ONE ARTICLE : Affichage d'un article en détail [http://localhost:8000/articles/show?id=1](http://localhost:8000/articles/show?id=1)
- UPDATE ARTICLE : edition d'un article [http://localhost:8000/articles/edit?id=1](http://localhost:8000/articles/edit?id=1)
- DELETE ARTICLE : Suppression d'un article [http://localhost:8000/articles/delete?id=1](http://localhost:8000/articles/delete?id=1)

- CREATE CATEGORY : Création d'un article [http://localhost:8000/categories/add](http://localhost:8000/categories/create)
- READ ALL CATEGORIES : Affichage de la liste des articles [http://localhost:8000/categories](http://localhost:8000/categories)
- UPDATE CATEGORY : edition d'un article [http://localhost:8000/categories/edit?id=1](http://localhost:8000/categories/edit?id=1)
- DELETE CATEGORY : Suppression d'un article [http://localhost:8000/categories/delete?id=1](http://localhost:8000/categories/delete?id=1)


### Fonctionnalités à développer :


### Consignes : 


### Tips :




### Evolutions possibles du projet :

- @404 : Gérer les erreurs 404 au cas où l'utilisateur tente d'accéder à une ressource qui n'existe pas.
- @refacto : Factoriser le code : créer des fonctions pour les requêtes SQL et les redirections. (créer un fichier `article_model.php` dans un dossier `model` et y écrire les fonctions nécessaires à l'application tout en les appelant dans les fichiers adéquats)
- @handleErrorDb : Gérer les erreurs SQL : afficher un message d'erreur en cas d'erreur SQL pour les ressource article. (try/catch)
- @handleEditCreateForm : Gérer les fonctionnalités de création et de modification des articles à l'aide d'un seul et même formulaire.
- @ajax : Gérer les fonctionnalités du CRUD article en AJAX.
- @relation : Ajouter une relation entre le table `article` et `category` (clé étrangère) et ajuster la création, l'édition et la suppression des article en AJAX en prenant en compte la relation entre les deux tables.