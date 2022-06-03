<?php require 'view/partials/header.php'; ?>


<!-- <h3><?php echo $articles['name'] ?></h3> -->
<div class="container">
    <div class="row">
        <?php
        foreach($articles as $article){ ?>
            <div class="card" style="width: 18rem;">
                <img src="<?php echo $article['image']?>" class="card-img-top" alt="<?php echo $article['title'] ?>">
                    <div class="card-body">
                        <h5 class="card-title"><?php echo $article['title'] ?></h5>
                        <span>Auteur : </span><a href="user.php?id=<?php echo $article['ud'] ?>" class="text-secondary"><?php echo $article['pseudo'] ?></a>
                        <a href="article.php?id=<?php echo $article['aid']?>">Lire l'article</a>
                        <button onclick="window.location.href = 'tag.php?id=<?php echo $article['caid']?>'" type="button" class="btn">
                            <span class="badge badge-light"><?php echo $article['name']?></span>
                        </button>
                    </div>
            </div>
        <?php } ?>
    </div>
</div>



<?php include 'view/partials/footer.php' ?>