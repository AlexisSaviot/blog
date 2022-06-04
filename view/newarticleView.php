<?php include 'view/partials/header.php'; ?>

<div class="container">
    <div class="row">
        <div class="col-12 justify-content-center">
            <h2>New article</h2>
        </div>
        <form action="" method="post" enctype="multipart/form-data">
            <div>
                <label for="title">Title</label>
                <input type="text" name="title" id="title" class="input-width form-control" require>
            </div>
            <div>
                <label for="picture">Picture</label>
                <input type="file" name="picture" id="picture" class="input-width form-control" require>
            </div>
            <div>
                <label for="content">Content</label>
                <textarea name="content" id="content" style="width:25rem" class="form-control" require></textarea>
            </div>
            <div>
            <p>Select the category</p>
                    <?php
                        foreach ($tag as $tag) { ?>
                        <input type="checkbox" value="<?php echo $tag['id']?>" name="tag<?php echo $tag['id']?>" 
                        id="<?php echo $tag['name']?>"><?php echo $tag['name']?>
                        <label for="<?php echo $tag['id']?>"></label>
                    <?php } ?>
            </div>
            <div>
                <button type="submit" name ="submit" id="submit">Add new article</button>
            </div>
        </form>
    </div>
</div>

<?php include 'view/partials/footer.php'; ?>