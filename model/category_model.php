<?php
require '../../../.connec.php';
/*
 * @create_category
 */
function createCategory(string $name)
{
    $pdo = new PDO(DSN, USER, PASSWORD);
    try {
        $statement = $pdo->prepare("INSERT INTO category (name) VALUES (:name)");
        $statement->bindValue(":name", $name, PDO::PARAM_STR);
        $statement->execute();
        return $pdo->lastInsertId();
    } catch (PDOException $e) {
        throw $e;
    }
}

/*
 * @find_all categories []
 */
function readAllCategories()
{
    $pdo = new PDO(DSN, USER, PASSWORD);
    try {
        $statement = $pdo->query("SELECT * FROM category");
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        throw $e;
    }
}

/*
 * @find_one category
 */
function readOneCategory(int $id)
{
    $pdo = new PDO(DSN, USER, PASSWORD);
    try {
        $statement = $pdo->prepare('SELECT * FROM category WHERE id=:id');
        $statement->bindValue(':id', $id, PDO::PARAM_INT);
        $statement->execute();
        return $statement->fetch(PDO::FETCH_OBJ);
    } catch (PDOException $e) {
        throw $e;
    }
    
}

/*
 * @update category
 */
function updateCategory(int $id, string $name)
{
    $pdo = new PDO(DSN, USER, PASSWORD);
    try {
        $statement = $pdo->prepare("UPDATE category SET name=:name WHERE id=:id");
        $statement->bindValue(":name", $name, PDO::PARAM_STR);
        $statement->bindValue(":id", $id, PDO::PARAM_INT);
        $statement->execute();
        return $statement->rowCount();
    } catch (PDOException $e) {
        throw $e;
    }
}

/*
 * @delete category
 */
function deleteCategory(int $id)
{
    $pdo = new PDO(DSN, USER, PASSWORD);
    try {
        $statement = $pdo->prepare("DELETE FROM category WHERE id=:id");
        $statement->bindValue(":id", $id, PDO::PARAM_INT);
        $statement->execute();
        return $statement->rowCount();
    } catch (PDOException $e) {
        throw $e;
    }
}
