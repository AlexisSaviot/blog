<?php 
require 'functions.php';

if (isset($_POST) && !empty($_POST)) {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $user = getUserInfo($email);
    if (password_verify($password, $user['password'])){
        session_start();
        $_SESSION['userlogged'] = $user;
        header('location:index.php');
    } else {
        echo "Connexion échouée";
    }
}

require 'view/loginView.php'; ?>