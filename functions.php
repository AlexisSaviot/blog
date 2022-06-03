<?php
session_start();
function db_connect(){
    include 'connections.php';
    try {
        $db = new PDO('mysql:host=localhost:8889;dbname=blog', $user, $pass);
        return $db;        
    } catch(PDOException $e) {
        print "Error!: " . $e->getMessage() . "<br/>";
        die();
    }
}

function getAll() {
    $connection = db_connect();
    $query = "  SELECT a.title, a.date, a.image, a.content, a.id as aid,
                        u.pseudo, u.id as ui, ca.name, ca.id as caid
                FROM articles as a
                INNER JOIN users as u
                ON u.id = a.author_id
                INNER JOIN article_category as ac
                ON ac.article_id = a.id
                INNER JOIN categories as ca
                ON ca.id = ac.category_id ";
    $stmt = $connection->prepare($query);
    $stmt->execute();
    // print_r($stmt);
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
    // print_r($results);
    return $results;
}
// getArticles();

function getArticlesByTag($id) {
    $connection = db_connect();
    $query = "  SELECT a.title, a.date, a.image, a.content, a.id as aid,
                        u.pseudo, u.id as ud, ca.name, ca.id as caid
                FROM articles as a
                INNER JOIN users as u
                ON u.id = a.author_id
                INNER JOIN article_category as ac
                ON ac.article_id = a.id
                INNER JOIN categories as ca
                ON ca.id = ac.category_id
                WHERE ca.id = '$id'";
    $stmt = $connection->prepare($query);
    $stmt->execute();
    // print_r($stmt);
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
    // print_r($results);
    return $results;
}

function getArticlesByUsers($id) {
    $connection = db_connect();
    $query = "  SELECT a.title, a.date, a.image, a.content,
                        u.pseudo, ca.name, ca.id
                FROM articles as a
                INNER JOIN users as u
                ON u.id = a.author_id
                INNER JOIN article_category as ac
                ON ac.article_id = a.id
                INNER JOIN categories as ca
                ON ca.id = ac.category_id 
                WHERE u.id = '$id'";
    $stmt = $connection->prepare($query);
    $stmt->execute();
    // print_r($stmt);
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
    // print_r($results);
    return $results;
}

function getUser($id){
    $connection = db_connect();
    $query = "  SELECT a.title as ati, a.date as ad, a.image as ai, a.content as ac, a.id as aid,
                        u.pseudo as up, u.lastname as ul, u.firstname as uf, u.id as ui,
                        ca.name as can, ca.id as caid
                FROM articles as a
                INNER JOIN users as u
                ON u.id = a.author_id
                INNER JOIN article_category as ac
                ON ac.article_id = a.id
                INNER JOIN categories as ca
                ON ca.id = ac.category_id
                WHERE u.id = '$id'";
    $stmt = $connection->prepare($query);
    $stmt->execute();
    // print_r($stmt);
    $results = $stmt->fetch(PDO::FETCH_ASSOC);
    // print_r($results);
    return $results;
}

function getArticle($id) {
    $connection = db_connect();
    $query = "  SELECT a.title, a.date, a.image, a.content, a.id as aid,
                        u.pseudo, u.id as ud, ca.name, ca.id as caid
                FROM articles as a
                INNER JOIN users as u
                ON u.id = a.author_id
                INNER JOIN article_category as ac
                ON ac.article_id = a.id
                INNER JOIN categories as ca
                ON ca.id = ac.category_id
                WHERE a.id ='$id' ";
    $stmt = $connection->prepare($query);
    $stmt->execute();
    // print_r($stmt);
    $results = $stmt->fetch(PDO::FETCH_ASSOC);
    // print_r($results);
    return $results;
}

function getComments($id) {
    $connection = db_connect();
    $query = "  SELECT c.pseudo, c.content, c.date
                FROM commentaires as c
                INNER JOIN articles as a
                ON c.article_id = a.id
                WHERE a.id ='$id' ";
    $stmt = $connection->prepare($query);
    $stmt->execute();
    // print_r($stmt);
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
    // print_r($results);
    return $results;
}

function addUser($value1, $value2, $value3, $value4, $value5){
    $connection = db_connect();
    $query = "  INSERT INTO `users`(`id`, `lastname`, `firstname`, `pseudo`, `email`, `password`) 
                VALUES (null, :lastname, :firstname, :pseudo, :email, :password)";
    $stmt = $connection->prepare($query);
    $stmt->bindParam(':lastname', $value1);
    $stmt->bindParam(':firstname', $value2);
    $stmt->bindParam(':pseudo', $value3);
    $stmt->bindParam(':email', $value4);
    $stmt->bindParam(':password', $value5);
    $stmt->execute();
}

function getUserInfo($email){
    $con = db_connect();
    $query = "  SELECT *
                FROM users
                WHERE users.email = '$email'";
    $stmt = $con->prepare($query);
    $stmt->execute();
    $results = $stmt->fetch(PDO::FETCH_ASSOC);
    return $results;
}

function addArticle($value1, $value2, $value3, $value4){
    $connection = db_connect();
    $query = "  INSERT INTO `articles`(`id`, `title`, `author_id`, `date`, `image`, `content`) 
                VALUES (null, :title, :author_id, CURRENT_TIMESTAMP, :image, :content)";
    $stmt = $connection->prepare($query);
    $stmt->bindParam(':title', $value1);
    $stmt->bindParam(':author_id', $value2);
    $stmt->bindParam(':image', $value3);
    $stmt->bindParam(':content', $value4);
    $stmt->execute();
}

function setArticleTag($value1, $value2){
    $connection = db_connect();
    $query = "  INSERT INTO `article_category`
                VALUES (null, :article_id, :category_id)";
    $stmt = $connection->prepare($query);
    $stmt->bindParam(':article_id', $value1);
    $stmt->bindParam(':category_id', $value2);
    $stmt->execute();
}

function getLastArticle($value1, $value2, $value3 ){
    $connection = db_connect();
    $query = "SELECT id FROM articles
    WHERE `title` = '$value1' AND `image` = '$value2' AND `content` = '$value3'";
    $stmt = $connection->prepare($query);
    $stmt->execute();
    $lastArticle = $stmt->fetch(PDO::FETCH_ASSOC);
    return $lastArticle;
}

function getTags(){
    $connection = db_connect();
    $query = '  SELECT *
                FROM categories';
    $stmt = $connection->prepare($query);
    $stmt->execute();
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $results;
}

function addComment($pseudo, $content, $id){
    $con = db_connect();
    $query = 'INSERT INTO commentaires (id, pseudo, content, article_id)
    VALUES(null, :pseudo, :content, :article_id)';
    $stmt = $con->prepare($query);
    $stmt->bindValue(':pseudo', $pseudo, PDO::PARAM_STR);
    $stmt->bindValue(':content', $content, PDO::PARAM_STR);
    $stmt->bindValue(':article_id', $id, PDO::PARAM_INT);
    $stmt->execute();
}