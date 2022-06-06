<?php require 'view/partials/header.php' ?>
<div class="container">
    <div class="row">
        <?php 
        foreach($articles as $article){ ?>
            <div>
                <div class="card" style="width: 18rem;">
                    <img src="<?php echo $article['image']?>" class="card-img-top" alt="<?php echo $article['title'] ?>">
                    <div class="card-body">
                        <h5 class="card-title"><?php echo $article['title'] ?></h5>
                        <span>Auteur : </span><a href="user/<?php echo $article['ui'] ?>" class="text-secondary"><?php echo $article['pseudo'] ?></a>
                        <a href="article/<?php echo $article['aid']?>">Lire l'article</a>
                        <button onclick="window.location.href = 'tag/<?php echo $article['caid']?>'" type="button" class="btn">
                            <span class="badge badge-light"><?php echo $article['name']?></span>
                        </button>
                    </div>
                </div>
            </div>
        <?php } ?>
    </div>
</div>


<?php require 'view/partials/footer.php' ?>