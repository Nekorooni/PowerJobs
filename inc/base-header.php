<?php
    require('defines.php');
    $err='';
    //require('db.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php echo siteTitle; ?></title>
    <link rel="stylesheet" href="/style.css">
    <link rel="stylesheet" href="/libs/bootstrap4/css/bootstrap.min.css">
    <script src="/script.js"></script>
    <script src='https://www.google.com/recaptcha/api.js'></script>
</head>
<body>
<nav class="navbar navbar-toggleable-md navbar-inverse fixed-top" style="background-color: #00A2E8;">
    <div class="container">
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <a class="navbar-brand" href="#"><img src="/img/powerjobs_logo.png" class="img-fluid" alt="Responsive image" width="32px"></a>

        <div class="collapse navbar-collapse" id="navbarsExampleDefault">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="/?id=home">Home</a>
                </li>
                <li class="nav-item"><a class="nav-link" href="#">Over ons</a></li>
                <li class="nav-item"><a class="nav-link" href="#">FAQ</a></li>
                <li class="nav-item"><a class="nav-link" href="#">Contact</a></li>
                <li class="nav-item">
                    <a class="nav-link disabled" href="#">Disabled</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="http://example.com" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Dropdown</a>
                    <div class="dropdown-menu" aria-labelledby="dropdown01">
                        <a class="dropdown-item" href="#">Action</a>
                        <a class="dropdown-item" href="#">Another action</a>
                        <a class="dropdown-item" href="#">Something else here</a>
                    </div>
                </li>
            </ul>
            <?php if (is_logged_in()){ ?>
                <span class="navbar-text">Logged in as <?php echo $_SESSION['email'];?></span>
                <?php if (is_admin()){ ?><a class="btn btn-primary ml-sm-2" href="/?id=admin" role="button">Admin</a><?php }?>
                <a class="btn btn-primary ml-sm-2" href="/?a=logout" role="button">Log out</a>
            <?php }else{ ?>
                <a class="btn btn-primary ml-sm-2" href="/?id=login" role="button">Login</a>
                <a class="btn btn-primary ml-sm-2" href="/?id=register" role="button">Register</a>
            <?php } ?>
        </div>
    </div>
</nav>