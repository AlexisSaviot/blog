<?php require 'functions.php';

if(isset($_POST)&&!empty($_POST)){
    $id = intval($_POST['id']);
    $pseudo = $_POST['pseudo'];
    $content = $_POST['content'];
    $userid = $_SESSION['userlogged']['id'];
    $date = date('Y-m-d');
    addComment($pseudo, $content, $date, $id, $userid); 
    $comments = getComments($id);
    foreach($comments as $comment){?>
        <div>
            <h5><?php echo $comment['pseudo'] . " " . $comment['date']?></h5>
        </div>
        <div>
            <p><?php echo $comment['content'] ?></p>
        </div>
    <?php } 
}

