# ATELIER CRUD - @05_relation many to one Article / Category

## Présentation

L'objectif de cet exercice est de créer une relation entre deux entités : `Article` et `Category`.

En effet, considérons que nous sommes sur un blog, et que nous souhaitons trier nos articles par catégorie en partant du principe que chaque article ne peut appartenir qu'à une seule catégorie mais qu'une catégorie peut contenir plusieurs articles.

Il s'agit donc d'un relation `many to one` (plusieurs articles peuvent appartenir qu'à une seule catégorie).

### Consignes : 
Pour cette nouvelle fonctionnalité, tu t'en doutes il va donc nous falloir modifier notre base de données :
- La premère chose à faire est d'ajouter un champ `category_id` dans la table `article` (type `int`) 
```sql
ALTER TABLE `article`
  ADD COLUMN `category_id` INT(11) NOT NULL AFTER `image`;
```

- Ensuite, il va falloir supprimer toutes les données de la table `article` (pour éviter les erreurs de clé étrangère)

- Une fois que c'est fait, il va falloir ajouter une clé étrangère sur la table `article` vers la table `category` :muscle:
```sql
ALTER TABLE `article`
  ADD CONSTRAINT `fk_article_category` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`);
```

- Enfin on peut remplir notre table `article` à nouveau en prenant soin d'avoir déjà créé des categories :smile:

- La relation entre les 2 tables impliquent maintenant de gérer la création et l'édition d'un article en prenant en compte son nouveau champ `category_id` :wink:

- La première chose à faire est de modifier le formulaire d'édition et de création d'article pour ajouter un champ `category_id` de type `select` qui va permettre de choisir la catégorie de l'article :muscle:

- Ensuite, sur les pages d'édition et de création d'article, il va falloir modifier le traitement du formulaire pour prendre en compte le nouveau champ `category_id` :wink:

- Des erreurs à ce stade ?? :scream: 
  - Pourquoi ? :thinking:
  - Indice : il faut ajuster 2 méthodes dans `article-model.php` pour ajouter la gestion du nouveau champ `category_id` :wink:

### Tips :

> 👀 Tu peux suivre le commentaire : `@05_relation` dans les fichiers pour t'aider dans la réalisation de cette fonctionnalité


### Teaser :

> :warning: Toujours des erreurs sur la page d'édition d'un article ? :scream:
>
> C'est normal, moi aussi :/ <br> En fait, le problème est que notre code commence à devenir un peu trop compliqué et que nous allons devoir encore faire du refactoring :muscle:
>
> Cette fois-ci on va essayer de penser notre architecture différemment pour éviter de trop se retrouver dans ce genre de situation ! :smile:
>
> Je t'invite à poursuivre vers la branche `06_mvc` pour découvrir une façon de structurer son code qui permet de mieux gérer les erreurs et de mieux séparer les responsabilités 🙌 