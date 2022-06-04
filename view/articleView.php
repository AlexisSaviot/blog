<?php require 'view/partials/header.php'; ?>

<div>
    <div>
        <div>
            <?php echo $article['title'] . "</br>" ?>
            <a href="user.php?id=<?php echo $article['ud'] ?>"><?php echo $article['pseudo'] ?></a>
            <?php echo $article['date']?>
        </div>
        <div>
            <img src="<?php echo $article['image']?>" alt="<?php echo $article['title']?>">
        </div>
        <div>
            <p><?php echo $article['content']?></p>
        <div>
            <button onclick="window.location.href = 'tag.php?id=<?php echo $article['caid']?>'" type="button" class="btn">
                <span class="badge badge-light"><?php echo $article['name']?></span>
            </button>
        </div> 
        </div><br><br>
        <div>
            <span>Add comments</span>
            <form>
                <input id="articleId" type="hidden" name="articleId" value="<?php echo $id ?>">
                <div class="form-group">
                    <label for="pseudo">Pseudo</label>
                    <input type="text" class="form-control" id="pseudo" name="pseudo">
                </div>
                <div class="form-group">
                    <label for="content">Content</label>
                    <textarea class="form-control" id="content" name="content"></textarea>
                </div>
                <button id="commentSubmit" class="btn btn-secondary" type="submit">Send</button>
            </form>
        </div><br>
        <div >
            <span>Comments</span>
            <span id="badge" class="badge badge-light"><?php echo count($comments) ?></span>
        </div>
        <div id="comments">
            <?php foreach($comments as $comment){?>
                <div>
                    <h5><?php echo $comment['pseudo'] . " " . $comment['date']?></h5>
                </div>
                <div>
                    <p><?php echo $comment['content'] ?></p>
                    
                </div>
                <?php } ?>
        </div>
    </div>
</div>

<?php require 'view/partials/footer.php' ?>