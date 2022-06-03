<?php require 'functions.php';

if(isset($_POST)&&!empty($_POST)){
    $id = $_POST['id'];
    $pseudo = $_POST['pseudo'];
    $content = $_POST['content'];
    addComment($pseudo, $content, $id); 
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
