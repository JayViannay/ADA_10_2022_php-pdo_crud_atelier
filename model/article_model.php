<?php
require __DIR__ . '/../.connec.php';
/*
 * @create_article
 */
function create(string $title, string $content, string $image)
{
    $pdo = new PDO(DSN, USER, PASSWORD);
    // @02_handleErrorDb
    try {
        $statement = $pdo->prepare("INSERT INTO article (title, content, image) VALUES (:title, :content, :image)");
        $statement->bindValue(":title", $title, PDO::PARAM_STR);
        $statement->bindValue(":content", $content, PDO::PARAM_STR);
        $statement->bindValue(":image", $image, PDO::PARAM_STR);
        $statement->execute();
        return $pdo->lastInsertId();
    } catch (PDOException $e) {
        throw $e;
    }
}

/*
 * @find_all articles []
 */
function readAll()
{
    $pdo = new PDO(DSN, USER, PASSWORD);
    // @02_handleErrorDb
    try {
        $statement = $pdo->query("SELECT * FROM article");
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        throw $e;
    }
}

/*
 * @find_one article
 */
function readOne(int $id)
{
    $pdo = new PDO(DSN, USER, PASSWORD);
    // @02_handleErrorDb
    try {
        $statement = $pdo->prepare('SELECT * FROM article WHERE id=:id');
        $statement->bindValue(':id', $id, PDO::PARAM_INT);
        $statement->execute();
        return $statement->fetch(PDO::FETCH_OBJ);
    } catch (PDOException $e) {
        throw $e;
    }
    
}

/*
 * @update article
 */
function update(int $id, string $title, string $content, string $image)
{
    $pdo = new PDO(DSN, USER, PASSWORD);
    // @02_handleErrorDb
    try {
        $statement = $pdo->prepare("UPDATE article SET title=:title, content=:content, image=:image WHERE id=:id");
        $statement->bindValue(":title", $title, PDO::PARAM_STR);
        $statement->bindValue(":content", $content, PDO::PARAM_STR);
        $statement->bindValue(":image", $image, PDO::PARAM_STR);
        $statement->bindValue(":id", $id, PDO::PARAM_INT);
        $statement->execute();
        return $statement->rowCount();
    } catch (PDOException $e) {
        throw $e;
    }
}

/*
 * @delete article
 */
function delete(int $id)
{
    $pdo = new PDO(DSN, USER, PASSWORD);
    // @02_handleErrorDb
    try {
        $statement = $pdo->prepare("DELETE FROM article WHERE id=:id");
        $statement->bindValue(":id", $id, PDO::PARAM_INT);
        $statement->execute();
        return $statement->rowCount();
    } catch (PDOException $e) {
        throw $e;
    }
}
