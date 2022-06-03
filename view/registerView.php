<?php include 'view/partials/header.php'; ?>


<div>
    <h2>Register</h2>
</div>
<form action="" method="post">
    <div>
        <label for="lastname">Lastname</label>
        <input type="text" name="lastname" id="lastname" class="input-width" require>
    </div>
    <div>
        <label for="firstname">Firstname</label>
        <input type="text" name="firstname" id="firstname" class="input-width" require>
    </div>
    <div>
        <label for="pseudo">Pseudo</label>
        <input type="text" name="pseudo" id="pseudo" class="input-width" require>
    </div>
    <div>
        <label for="email">Email</label>
        <input type="email" name="email" id="email" class="input-width" require>
    </div>
    <div>
        <label for="password">Password</label>
        <input type="password" name="password" id="password" class="input-width" require>
    </div>
    <div>
        <button type="submit" name ="submit" id="submit">Send form</button>
    </div>
</form>


<?php include 'view/partials/footer.php'; ?>