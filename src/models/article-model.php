<?php

/*
 * @create_article
 */
function createArticle(string $title, string $content, string $image, int $category)
{
    $pdo = new PDO(DSN, USER, PASSWORD);
    try {
        $statement = $pdo->prepare("INSERT INTO article (title, content, image, category_id) VALUES (:title, :content, :image, :category_id)");
        $statement->bindValue(":title", $title, PDO::PARAM_STR);
        $statement->bindValue(":content", $content, PDO::PARAM_STR);
        $statement->bindValue(":image", $image, PDO::PARAM_STR);
        $statement->bindValue(":category_id", $category, PDO::PARAM_INT);
        $statement->execute();
        return $pdo->lastInsertId();
    } catch (PDOException $e) {
        throw $e;
    }
}

/*
 * @find_all articles []
 */
function readAllArticles()
{
    $pdo = new PDO(DSN, USER, PASSWORD);
    try {
        $statement = $pdo->query("SELECT article.id, article.title, article.content, article.image, article.category_id, category.name as category_name FROM article JOIN category ON article.category_id = category.id");
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        throw $e;
    }
}

/*
 * @find_one article
 */
function readOneArticle(int $id)
{
    $pdo = new PDO(DSN, USER, PASSWORD);
    try {
        $statement = $pdo->prepare('SELECT article.id, article.title, article.content, article.image, article.category_id, category.name as category_name FROM article JOIN category ON article.category_id = category.id WHERE article.id=:id');
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
function updateArticle(int $id, string $title, string $content, string $image, int $category)
{
    $pdo = new PDO(DSN, USER, PASSWORD);
    try {
        $statement = $pdo->prepare("UPDATE article SET title=:title, content=:content, image=:image, category_id=:category_id WHERE id=:id");
        $statement->bindValue(":title", $title, PDO::PARAM_STR);
        $statement->bindValue(":content", $content, PDO::PARAM_STR);
        $statement->bindValue(":image", $image, PDO::PARAM_STR);
        $statement->bindValue(":category_id", $category, PDO::PARAM_INT);
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
function deleteArticle(int $id)
{
    $pdo = new PDO(DSN, USER, PASSWORD);
    try {
        $statement = $pdo->prepare("DELETE FROM article WHERE id=:id");
        $statement->bindValue(":id", $id, PDO::PARAM_INT);
        $statement->execute();
        return $statement->rowCount();
    } catch (PDOException $e) {
        throw $e;
    }
}