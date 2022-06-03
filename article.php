<?php require 'functions.php';

$get = $_GET;

if (isset($get['id'])) {
    $id = $get['id'];
}

$article = getArticle($id);
$comments = getComments($id);

require 'view/articleView.php' ?>
