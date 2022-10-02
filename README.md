# ATELIER CRUD - PHP/PDO

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

- READ ALL : Affichage de la liste des articles [http://localhost:8000](http://localhost:8000)
- UPDATE : edition d'un article [http://localhost:8000/pages/article/edit.php?id=1](http://localhost:8000/pages/article/edit.php?id=1)


### Fonctionnalités à développer :

- CREATE : Création d'un article [http://localhost:8000/pages/article/create.php](http://localhost:8000/pages/article/create.php)
- READ ONE : Affichage d'un article en détail [http://localhost:8000/pages/article/show.php?id=1](http://localhost:8000/pages/article/show.php?id=1)
- DELETE : Suppression d'un article [http://localhost:8000/pages/article/delete.php?id=1](http://localhost:8000/pages/article/delete.php?id=1)

- CRUD d'une nouvelle ressource : `category` (catégorie d'article)

```sql
CREATE TABLE `category` (
    `id` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `name` varchar(255) NOT NULL);
```

- CREATE : Création d'une catégorie [http://localhost:8000/pages/category/create.php](http://localhost:8000/pages/category/create.php)
- READ ALL : Affichage de la liste des catégories [http://localhost:8000/pages/category/index.php](http://localhost:8000/pages/category/index.php)
- UPDATE : Édition d'une catégorie [http://localhost:8000/pages/category/edit.php?id=1](http://localhost:8000/pages/category/edit.php?id=1)
- DELETE : Suppression d'une catégorie [http://localhost:8000/pages/category/delete.php?id=1](http://localhost:8000/pages/category/delete.php?id=1)


### Consignes : 
En t'aidant des commentaires présents dans le code source de l'application, dévoloppe les fonctionnalités manquantes.
Pense à bien respecter les bonnes pratiques de développement et de programmation.

Tu peux commencer par consulter le fichier app/index.php et app/pages/article/edit.php pour comprendre le fonctionnement de l'application.

Lance toi ensuite sur l'ajout du CREATE, READ ONE ou DELETE, le code est fragmenté et indique à quel endroit il doit être adapté.

Une fois que tu en as terminé avec la ressources `article`, passe à la ressource `category`. 
Tu verras que le code est très similaire dès lors que tu as un premier CRUD fonctionnel sur une ressource.

Je te souhaite bon courage et bon apprentissage ! :muscle:

### Tips :

> 👀 Il y a un template `_default.template.php` à la racine du dossier `pages` que tu peux utiliser pour la création de nouvelles pages, en utilisant le template tu gagneras du temps sur la mise en forme de tes pages. <br>
> 👀 Lorsqu'on mélange du code HTML et du code PHP, il est préférable de respecter les bonnes pratiques d'indentation afin de faciliter la lisibilité du code. <br>
> 👀 Quand on ouvre une balise PHP, on ferme la balise PHP à la fin de l'instruction. ```<?php echo 'ici du code php'; ?>``` <br>
> 👀 Pour débugger du code PHP on peut utiliser la fonction `var_dump()` ou `print_r()`.


### Evolutions possibles du projet :

- @03_404 : Gérer les erreurs 404 au cas où l'utilisateur tente d'accéder à une ressource qui n'existe pas.
- @01_refacto : Factoriser le code 
  - créer des fonctions pour les requêtes SQL et les redirections. (créer un fichier `model_article.php` dans un dossier `model` et y écrire les fonctions nécessaires à l'application tout en les appelant dans les fichiers adéquats)
- @02_handleErrorDb : Gérer les erreurs SQL 
  - Lever une exception PDO en cas d'erreur SQL pour la ressource article. (try/catch)
- @04_handleEditCreateForm : Gérer les fonctionnalités de création et de modification des articles à l'aide d'un seul et même formulaire.
- @05_relation : Ajouter une relation entre le table `article` et `category` (clé étrangère `category_id` dans la table `article`) et ajuster la création et l'édition des articles en prenant en compte la relation entre les deux tables.