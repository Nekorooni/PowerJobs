<?php
if (is_logged_in()){
    header("Location: index.php?id=home");
}
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['user']) && isset($_POST['pass'])) {
        if (login($pdo, $_POST['user'], $_POST['pass'])){
            header('Location: index.php?id=home');
        }
        //close connection
        $conn = null;
    }
}
?>
<div class="jumbotron">
    <div class="container">
        <h1 class="display-3">Login</h1>
    </div>
</div>
<div class="container">
    <div class="row">
        <div class="col-6">
            <form method="post" action="<?php echo basename($_SERVER['REQUEST_URI']);?>">
                <div class="form-group row">
                    <label for="text-username" class="col-4 col-form-label">Username</label>
                    <div class="col-8">
                        <input class="form-control" type="text" placeholder="Username.." id="text-username" name="user">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="text-password" class="col-4 col-form-label">Password</label>
                    <div class="col-8">
                        <input class="form-control" type="password" placeholder="Password.." id="text-password" name="pass">
                    </div>
                </div>
                <div class="form-group row">
                    <div class="offset-sm-4 col-sm-8">
                        <button type="submit" class="btn btn-primary">Login</button>
                    </div>
                </div>
            </form>
        </div>
        <div class="col-6">
            <?php echo_errors();?>
        </div>
    </div>
</div>