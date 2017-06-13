<?php

//Login stuff

function login($pdo, $user, $pass){
    $user = htmlspecialchars($user);
    $pass = hash("sha256", htmlspecialchars($pass));
    try {
        $stmt = $pdo->prepare("SELECT * FROM users WHERE Email = ?");
        $stmt->execute(array($user));
        $row = $stmt->fetch(PDO::FETCH_ASSOC); //only first record
        if ($stmt->rowCount()) {
            if ($pass == $row['Password']) {
                $_SESSION["login"] = true;
                $_SESSION["email"] = $user;
                $_SESSION["role"] = $row['Role'];
                return true;
            }
            else
                echo($pass);
                append_error('Wrong username or password.');
        } else {
            append_error('Wrong username or password.');
        }
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}

function register($pdo, $user, $pass){

}

function logout(){

}

function is_logged_in(){
    return isset($_SESSION['login']);
}

function is_admin(){
    if (is_logged_in()){
        return $_SESSION['role']==2;
    }
}

function echo_welcome(){
    if (is_logged_in())
        echo "Welcome ".$_SESSION['email'];
}

function echo_login_details(){

}

//Crud
function crud_delete($id){
    global $pdo;
    $sql = "DELETE FROM `users` WHERE `Id` = ?";
    $query = $pdo->prepare($sql);
    $query->execute(array($id));
}
function crud_create($user, $pass, $role){
    global $pdo;
    $sql = "INSERT INTO `users` (`Email`, `Password`, `Role`) VALUES (?,?,?)";
    $query = $pdo->prepare($sql);
    $query->execute(array($user, hash("sha256", htmlspecialchars($pass)), $role));
}

//Authentication checks

//Helpful
function append_error($content, $type='warning'){
    global $messages;
    array_push($messages, array('content'=>$content,'type'=>$type));
}
function echo_errors(){
    global $messages;
    foreach($messages as $msg){
        echo "<div class=\"alert alert-".$msg['type']."\" role=\"alert\">".$msg['content']."</div>";
    }
}