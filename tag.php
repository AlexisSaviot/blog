<?php
require 'functions.php';

$get = $_GET;
if ( isset( $get['id'] ) ) {
    $tag = $get['id'];
}
$articles = getArticlesByTag($tag);

require 'view/tagView.php'
?>