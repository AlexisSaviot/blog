<?php
    require 'functions.php';

    $tag = getTags();
    if(isset($_SESSION['userlogged'])){ 
        require 'view/newarticleView.php';
        $userid = $_SESSION['userlogged']['id'];
        if (isset($_POST) && !empty($_POST)) {
            // var_dump($_POST);
            // var_dump($_FILES);
            $upload_dir = "img/";
            $tmp_name = $_FILES['picture']['tmp_name'];
            $img_name = $_FILES['picture']['name'];
            $prefix = uniqid();
            $destination = $upload_dir.$prefix.$img_name;
            move_uploaded_file($tmp_name, $destination);
            // var_dump($destination.'</br>');
            $title = $_POST['title'];
            $content = $_POST['content'];
            // var_dump($title, $userid, $picturePath, $content);
    
            if($title != "" && $img_name != "" && $content != "") {
                addArticle($title, $userid, $destination, $content);
                foreach($_POST as $key => $value){
                    if(strpos($key, 'tag')!== false){
                        $last = getLastArticle($title, $destination, $content);
                        var_dump("KEY : ".$key);
                        var_dump("VALUE : ".$value);
                        setArticleTag($last['id'], $value);
                    }
                }
            }
        }
    } else if (!isset($_SESSION['userlogged'])) {
        header('location:index.php');
    }