# ATELIER CRUD - @06 Architecture MVC (Model Vue Controller)

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

### Se positionner sur la branche `@06_mvc`
```bash
git checkout @06_mvc
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

- [ ] CRUD pour les users

- CREATE USER : Création d'un user [http://localhost:8000/users/add](http://localhost:8000/users/create)
- READ ALL ARTICLES : Affichage de la liste des users [http://localhost:8000/users](http://localhost:8000/users)
- READ ONE USER : Affichage d'un user en détail [http://localhost:8000/users/show](http://localhost:8000/users/show)
- UPDATE USER : edition d'un user [http://localhost:8000/users/edit](http://localhost:8000/users/edit)
- DELETE USER : Suppression d'un user [http://localhost:8000/users/delete](http://localhost:8000/users/delete)

### Consignes : 

- [ ] Créer une branche `feature/CRUD_users` à partir de la branche `mvc_architecture`
- [ ] Ajuster la structure de la base de données pour ajouter la table `user` qui prendra en compte les champs suivants : `id INT AUTO_INCREMENT PRIMARY NOT NUL`, `email VARCHAR(255) NOT NULL`, `password VARCHAR(255) NOT NULL`, `role VARCHAR(8) NOT NULL DEFAULT 'ROLE_USER'`
- [ ] Ajouter les routes pour les users dans le fichier `routing.php`
- [ ] Créer le modèle `user-model.php` dans le dossier `src/models` (ne pas hésiter à s'inspirer du modèle `article-model.php`)
- [ ] Créer le contrôleur `user-controller.php` dans le dossier `src/controllers` (ne pas hésiter à s'inspirer du contrôleur `article-controller.php`)
- [ ] Créer les vues pour les users dans le dossier `src/views` (ne pas hésiter à s'inspirer des vues `article` et à utiliser le `_default.template.php`à la racine du dossier views)
- [ ] Tester les fonctionnalités de l'application en local depuis le navigateur
- [ ] Une fois les fonctionnalités de l'application fonctionnelles, faire une pull request sur la branche `mvc_architecture` du projet (si tu n'as les droits tu peux m'envoyer une demande d'ajout au repo via slack en me précisant ton pseudo github et le lien vers le repo)

### Evolutions possibles du projet :

- [ ] Ajouter un système de register/login/logout pour les utilisateurs et hasher les mots de passe en base de données
- [ ] Ajouter un système de commentaires pour les articles par les utilisateurs
- [ ] Ajouter un système de filtre pour les articles
- [ ] Ajouter un système de favoris entre les utilisateurs et les articles