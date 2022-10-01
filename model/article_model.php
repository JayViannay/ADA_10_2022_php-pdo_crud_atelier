<?php

/*
 * @create_article
 */
function create(string $title, string $content, string $image)
{
    require '../../../.connec.php';
    $pdo = new PDO(DSN, USER, PASSWORD);
    $statement = $pdo->prepare("INSERT INTO article (title, content, image) VALUES (:title, :content, :image)");
    $statement->bindValue(":title", $title, PDO::PARAM_STR);
    $statement->bindValue(":content", $content, PDO::PARAM_STR);
    $statement->bindValue(":image", $image, PDO::PARAM_STR);
    $statement->execute();
}

/*
 * @find_all articles
 */
function readAll()
{
    require '../.connec.php';
    $pdo = new PDO(DSN, USER, PASSWORD);
    return $pdo->query('SELECT * FROM article')->fetchAll();
}

/*
 * @find_one article
 */
function readOne(int $id)
{
    require '../../../.connec.php';
    $pdo = new PDO(DSN, USER, PASSWORD);
    $statement = $pdo->prepare('SELECT * FROM article WHERE id=:id');
    $statement->bindValue(':id', $id, PDO::PARAM_INT);
    $statement->execute();
    return $statement->fetch(PDO::FETCH_OBJ);
}

/*
 * @update article
 */
function update(int $id, string $title, string $content, string $image)
{
    require '../../../.connec.php';
    $pdo = new PDO(DSN, USER, PASSWORD);
    $statement = $pdo->prepare("UPDATE article SET title=:title, content=:content, image=:image WHERE id=:id");
    $statement->bindValue(":title", $title, PDO::PARAM_STR);
    $statement->bindValue(":content", $content, PDO::PARAM_STR);
    $statement->bindValue(":image", $image, PDO::PARAM_STR);
    $statement->bindValue(":id", $id, PDO::PARAM_STR);
    $statement->execute();
}

/*
 * @delete article
 */
function delete(int $id)
{
    require '../../../.connec.php';
    $pdo = new PDO(DSN, USER, PASSWORD);
    $statement = $pdo->prepare("DELETE FROM article WHERE id=:id");
    $statement->bindValue(':id', $id, PDO::PARAM_INT);
    $statement->execute();
}
