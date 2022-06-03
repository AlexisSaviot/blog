<?php 
    require 'view/partials/header.php';
?>

<form action="" method="post">  
    <div>
        <label for="email">Email</label>
        <input type="email" name="email" id="email" class="form-control input-width" require>
    </div>
    <div>
        <label for="password">Password</label>
        <input type="password" name="password" id="password" class="form-control input-width" require>
    </div>
    <div>
        <button type="submit" name ="submit" id="submit">Send form</button>
    </div>
</form>

<?php include 'view/partials/footer.php' ?>