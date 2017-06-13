<?php
if (is_logged_in()){
    header("Location: index.php?id=home");
}
if (isset($_POST['user']) && isset($_POST['pass'])) {
    if ($_POST['pass']!=$_POST['pass2']) {
        append_error("Herhaalde wachtwoord komt niet overeen.");
    }
    if (!strlen($_POST['pass'])>6)
        append_error("Wachtwoord moet minimaal 6 tekens bevatten");
    if (!preg_match("/^(?=.*[0-9])(?=.*[a-z])(?=.*[A-Z]).*$/", $_POST['pass'])) {
        append_error("Wachtwoord moet kleine letters, hoofdletters en nummers bevatten.");
    }
    if (empty($messages)){
        //Login check
        try {
            // set the PDO error mode to exception
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            // prepare sql and bind parameters
            $stmt = $pdo->prepare("INSERT INTO users (Email, Password, Role) VALUES (:email, :password, 1)");
            $stmt->bindParam(':email', $_POST['user']);
            $stmt->bindParam(':password', hash("sha256", $_POST['pass']));
            $stmt->execute();
            append_error("Account aangemaakt!", 'success');
        } catch(PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
        $conn = null;
    }
}
?>
<div class="jumbotron">
    <div class="container">
        <h1 class="display-3">Register</h1>
    </div>
</div>
<div class="container">
    <div class="col-6 align-content-center">
        <form method="post" action="<?=basename($_SERVER['REQUEST_URI'])?>">
            <div class="form-group row">
                <label for="text-email" class="col-4 col-form-label">E-mail</label>
                <div class="col-8">
                    <input class="form-control" type="email" placeholder="username@example.com" name="user" id="text-email">
                </div>
            </div>
            <div class="form-group row">
                <label for="text-pass" class="col-4 col-form-label">Password</label>
                <div class="col-8">
                    <input class="form-control" type="password" placeholder="Password.." name="pass" id="text-pass">
                </div>
            </div>
            <div class="form-group row">
                <label for="text-pass2" class="col-4 col-form-label">Confirm password</label>
                <div class="col-8">
                    <input class="form-control" type="password" placeholder="Confirm password.." name="pass2" id="text-pass2">
                </div>
            </div>
            <div class="form-group row">
                <div class="offset-sm-2 col-sm-10">
                    <button type="submit" class="btn btn-primary">Register</button>
                </div>
            </div>
        </form>
    </div>
    <div class="col-6">
        <?php echo_errors();?>
    </div>
</div>