<?php require 'view/partials/header.php';?>

<h1>Pseudo : <?php echo $users['up'] ?></h1>
        <div>
            <span>Name : </span><?php echo $users['ul'] . " " . $users['uf']?>
        </div>
        <br><br><br>
        <div>
        <h4>Ses articles</h4>
        <a href="article.php?id=<?php echo $users['aid']?>" class="btn btn-primary"><?php echo $users['ati']?></a>
        </div>
        <br><br><br>
        <div>
            <h4>Ses tags</h4>
            <button onclick="window.location.href = 'tag.php?id=<?php echo $users['caid']?>'" type="button" class="btn">
                <span class="badge badge-light"><?php echo $users['can']?></span>
            </button>
        </div>

<?php include 'view/partials/footer.php' ?>