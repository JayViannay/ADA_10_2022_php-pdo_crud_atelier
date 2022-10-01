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

[WebServer PHP doc](https://www.php.net/manual/fr/features.commandline.webserver.php)

- Lancer le serveur PHP en ligne de commande depuis la racine du dossier (l'attribut `-t` permet de spécifier le dossier racine dans lequel se trouve l'application, dans notre cas il s'agit du dossier `app`):

```bash
php -S localhost:8000 -t app
```

- Ouvrir l'application dans un navigateur à l'adresse suivante: [http://localhost:8000](http://localhost:8000)