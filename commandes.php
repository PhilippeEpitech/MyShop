<?php

function modifier($id, $name, $price, $desc, $img, $cat)
{
    require('connect.php');
    $sql = "UPDATE `products` SET (:name, :price, :desc, :img, :cat) WHERE `id`=:id";
    $stmt = $pdo->prepare($sql);
    $stmt->bindValue("id", $id, PDO::PARAM_INT);
    $stmt->bindValue("name", $name, PDO::PARAM_STR);
    $stmt->bindValue("price", $price, PDO::PARAM_INT);
    $stmt->bindValue("desc", $desc, PDO::PARAM_STR);
    $stmt->bindValue("img", $img, PDO::PARAM_STR);
    $stmt->bindValue("cat", $cat, PDO::PARAM_STR);
    $stmt->execute();
    return $stmt;
    $stmt->closeCursor();
}

function getProduct($id)
{
    require('connect.php');
    $sql = "SELECT * FROM `products` WHERE `id`=:id";
    $stmt = $pdo->prepare($sql);
    $stmt->bindValue("id", $id, PDO::PARAM_INT);
    $stmt->execute();
    $data = $stmt->fetch(PDO::FETCH_OBJ);
    return $data;
    $stmt->closeCursor();
}

function ajouter($name, $price, $desc, $img, $cat)
{
    require('connect.php');
    $sql = "INSERT INTO `products` (`name`, `price`, `description`, `photo`, `category_id`) VALUES (:name, :price, :desc, :img, :cat)";
    $stmt = $pdo->prepare($sql);
    $stmt->bindValue("name", $name, PDO::PARAM_STR);
    $stmt->bindValue("price", $price, PDO::PARAM_INT);
    $stmt->bindValue("desc", $desc, PDO::PARAM_STR);
    $stmt->bindValue("img", $img, PDO::PARAM_STR);
    $stmt->bindValue("cat", $cat, PDO::PARAM_STR);
    $stmt->execute();
    return $stmt;
    $stmt->closeCursor();
}

function afficher()
{
    require('connect.php');
    $sql = "SELECT * FROM `products`";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    $data = $stmt->fetchAll();
    return $data;
}

function supprimer($id)
{
    require('connect.php');
    $sql = "DELETE FROM `products` WHERE `id` = :id";
    $stmt = $pdo->prepare($sql);
    $stmt->bindValue("id", $id, PDO::PARAM_INT);
    $stmt->execute();
    $stmt->closeCursor();
}
