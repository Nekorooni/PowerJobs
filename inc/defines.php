<?php
//SITE GEGEVENS
define('siteTitle', 'Powerjobs');

//DB GEGEVENS
define('dbHost','127.0.0.1');
define('dbUser','root');
define('dbPass','');
define('dbName','powerjobs');

session_start();

//TODO: In db class zetten
$pdo = new PDO('mysql:host='.dbHost.';dbname='.dbName, dbUser, dbPass);

include('tempfunctions.php');

$messages=array();

if (isset($_GET['a'])){
    switch($_GET['a']){
        case 'logout':
            session_destroy();
            header("Location: index.php?id=home");
            break;
    }
}