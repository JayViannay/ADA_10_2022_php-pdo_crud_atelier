-- --------------------------------------------------------
-- Pour importer le script de cette base de données en local sur ton serveur MySql local il y a plusieurs solutions :

-- 1. La plus facile : 
  -- Ouvrir le fichier avec un éditeur de texte et copier/coller le contenu dans la console de PhpMyAdmin (onglet SQL)

-- 2. Si tu n'as pas PhpMyAdmin alors on peut le faire en ligne de commande :
  -- 2.1. Se connecter au serveur MySQL depuis le terminal : `mysql -u root -p` si vous avez mysql d'installé sur votre machine sans MAMP ou autre 
  -- Si vous avez MAMP éxécuter le serveur MySQL depuis le terminal : `Applications/MAMP/Library/bin/mysql -u root -p` || mdp : root 
  -- 2.2. Une fois connecté au serveur MySQL, exécuter le script : `source /chemin/vers/atelier_crud.sql`
  -- ou
  -- 2.2 Copier/Coller le contenu du fichier dans le terminal mysql et appuyer sur Entrée

-- 3. La plus sombre :
  -- Ouvrir le fichier avec un éditeur de texte et exécuter la commande suivante dans le terminal : mysql -u root -p atelier_pdo < atelier_crud.sql

-- Propositions de ressources :
  -- https://www.youtube.com/watch?v=gvcBDA2wJJ4 Using Workbench
  -- https://www.youtube.com/watch?v=jW5lrS6EUPM Using Terminal
  -- https://www.youtube.com/watch?v=uyP46E0UA9I Using PhpMyAdmin

-- --------------------------------------------------------
-- CREATION DE LA BASE DE DONNÉES : 

CREATE DATABASE `atelier_crud`;

-- --------------------------------------------------------
-- DÉPLACEMENT SUR LA BASE DE DONNÉES : 

USE `atelier_crud`;

-- --------------------------------------------------------
-- CRÉATION DE LA TABLE `article` :

CREATE TABLE `article` (
  `id` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------
-- AJOUT DE QUELQUES DONNÉES DANS LA TABLE `article` :

INSERT INTO `article` (`id`, `title`, `content`, `image`) VALUES 
    (NULL, 'Auburn', 'Blanditiis doloremque natus aut aspernatur labore mollitia ad hic reiciendis temporibus.', 'https://via.placeholder.com/150'), 
    (NULL, 'Seoul', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Repudiandae debitis fugiat vitae.', 'https://via.placeholder.com/150'), 
    (NULL, 'Gotham', 'Repellendus alias quaerat magni at labore non dignissimos animi ipsam nobis, aperiam.', 'https://via.placeholder.com/150');

CREATE TABLE `category` (
    `id` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `name` varchar(255) NOT NULL);

-- --------------------------------------------------------
-- AJOUT DE QUELQUES DONNÉES DANS LA TABLE `category` :

INSERT INTO `category` (`id`, `name`) VALUES 
    (NULL, 'Sport'), 
    (NULL, 'Mode'), 
    (NULL, 'Science');