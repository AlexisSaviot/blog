<?php 
require 'functions.php';

if (isset($_POST) && !empty($_POST)) {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $user = getUserInfo($email);
    // var_dump($user);
    if (password_verify($password, $user['password'])){
        session_start();
        // var_dump($_SESSION);
        $_SESSION['userlogged'] = $user;
        // var_dump($_SESSION['userlogged']);
        header('location:index.php');
    } else {
        echo "Connexion échouée";
    }
}

require 'view/loginView.php'; ?>