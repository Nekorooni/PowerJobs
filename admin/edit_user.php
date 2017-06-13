<?php require('../inc/base-header.php'); ?>
<?php
if (isset($_GET['id'])){
    //If saving
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        //TODO: Make a nice function for updating shit
        $stmt = $pdo->prepare("UPDATE `users` SET `Email`=?, `Password`=?, `Role`=? WHERE `Id`=?");
        $stmt->execute(array($_POST['Email'], $_POST['Password'], $_POST['Role'], $_GET['id']));
        append_error("User saved!", 'success');
    }
    //Load user values
    $stmt = $pdo->prepare("SELECT * FROM `users` WHERE `Id`=?");
    $stmt->execute(array($_GET['id']));
    $user = $stmt->fetch(PDO::FETCH_ASSOC);
    if ($stmt->rowCount()) {

    }else{
        append_error("User doesn't exist");
    }
}
?>
<div class="jumbotron">
    <div class="container">
        <h1 class="display-3">Edit user</h1>
        <?php if (!empty($user)){?><p>Editing user "<?= $user['Email'];?>".</p><?php } ?>
    </div>
</div>

<div class="container">
    <div class="row"><h3>General user info:</h3></div>
    <form method="post" action="<?= basename($_SERVER['REQUEST_URI']);?>">
        <div class="row">
            <div class="col-6">
                <?php foreach($user as $key=>$val){ ?>
                    <div class="form-group row">
                        <label for="text-user" class="col-2 col-form-label"><?= $key ?></label>
                        <div class="col-10">
                            <input class="form-control" type="text" name="<?= $key ?>" value="<?= $val ?>" id="text-user">
                        </div>
                    </div>
                <?php } ?>
                <div class="form-group row">
                    <div class="offset-sm-2 col-sm-10">
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
    <div class="row">
        <?php echo_errors(); ?>
    </div>
</div>

<?php require('../inc/base-footer.php'); ?>