<?php 
    require 'functions.php';

    $get = $_GET;
    if (isset($get['id'])) {
        $id = $get['id'];
        // echo 'User\'s id : '. $id;
    };

    $users = getUser($id);

require 'view/userView.php';