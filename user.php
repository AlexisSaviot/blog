<?php 
    require 'functions.php';

    $get = $_GET;
    if (isset($get['id'])) {
        $id = $get['id'];
    };

    $users = getUser($id);

require 'view/userView.php';