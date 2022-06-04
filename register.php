<?php
require 'functions.php';

  if (isset($_POST) && !empty($_POST)) {
    $lastname = $_POST['lastname'];
    $firstname = $_POST['firstname'];
    $pseudo = $_POST['pseudo'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    addUser($lastname, $firstname, $pseudo, $email, $password);
  }

require 'view/registerView.php';

// header('location:login.php');