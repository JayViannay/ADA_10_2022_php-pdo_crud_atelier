# ATELIER CRUD - @00_CORRECTION

## Présentation

L'application est développée en PHP et utilise une base de données MySQL.

L'atelier CRUD est un micro projet qui consiste à créer une application web de gestion d'articles et d'introduire les notions de CRUD (Create, Read, Update, Delete), PDO, SQL, OBJET, et de renforcer les notions de PHP.


## Installation du projet

>##### Prérequis :
>- PHP >= 7.4
>- PDO DRIVER ON
>- MySQL >= 5.7

### Cloner le projet
```bash
git clone git@github.com:JennyViannay/ADA_10_2022_php-pdo_crud_atelier.git atelier-crud-php-pdo
```

### Configuration de la base de données

- Créer une base de données MySQL depuis le fichier `atelier_crud.sql` situé à la racine du projet.

- Créer un fichier `.connec.php` à la racine du projet et y renseigner les informations de connexion à la base de données comme dans l'exemple du fichier `.connec.php.dist`.


### Lancer le projet

- Lancer le serveur PHP en ligne de commande depuis la racine du dossier 

```bash
php -S localhost:8000 -t app
```

>💡 L'attribut `-t` permet de spécifier le dossier racine dans lequel se >trouve l'application, dans notre cas il s'agit du dossier `app`):
>[WebServer PHP doc](https://www.php.net/manual/fr/features.commandline.webserver.php)

- Ouvrir l'application dans un navigateur à l'adresse suivante: [http://localhost:8000](http://localhost:8000)

### Fonctionnalités présentes dans l'application :

- CREATE : Création d'un article [http://localhost:8000/pages/article/create.php](http://localhost:8000/pages/article/create.php)
- READ ALL : Affichage de la liste des articles [http://localhost:8000](http://localhost:8000)
- READ ONE : Affichage d'un article en détail [http://localhost:8000/pages/article/show.php?id=1](http://localhost:8000/pages/article/show.php?id=1)
- UPDATE : edition d'un article [http://localhost:8000/pages/article/edit.php?id=1](http://localhost:8000/pages/article/edit.php?id=1)
- DELETE : Suppression d'un article [http://localhost:8000/pages/article/delete.php?id=1](http://localhost:8000/pages/article/delete.php?id=1)
- CREATE : Création d'une catégorie [http://localhost:8000/pages/category/create.php](http://localhost:8000/pages/category/create.php)
- READ ALL : Affichage de la liste des catégories [http://localhost:8000/pages/category/index.php](http://localhost:8000/pages/category/index.php)
- UPDATE : Édition d'une catégorie [http://localhost:8000/pages/category/edit.php?id=1](http://localhost:8000/pages/category/edit.php?id=1)
- DELETE : Suppression d'une catégorie [http://localhost:8000/pages/category/delete.php?id=1](http://localhost:8000/pages/category/delete.php?id=1)

### Evolutions possibles du projet :

- @03_404 : Gérer les erreurs 404 au cas où l'utilisateur tente d'accéder à une ressource qui n'existe pas.
- @01_refacto : Factoriser le code 
  - créer des fonctions pour les requêtes SQL et les redirections. (créer un fichier `model_article.php` dans un dossier `model` et y écrire les fonctions nécessaires à l'application tout en les appelant dans les fichiers adéquats)
- @02_handleErrorDb : Gérer les erreurs SQL 
  - Lever une exception PDO en cas d'erreur SQL pour la ressource article. (try/catch)
- @04_handleEditCreateForm : Gérer les fonctionnalités de création et de modification des articles à l'aide d'un seul et même formulaire.
- @05_relation : Ajouter une relation entre le table `article` et `category` (clé étrangère `category_id` dans la table `article`) et ajuster la création et l'édition des articles en prenant en compte la relation entre les deux tables.