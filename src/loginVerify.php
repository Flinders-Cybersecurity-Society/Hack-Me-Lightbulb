<?php

if (isset($_POST["usernameInput"])){

$defaultUsername = 'admin';
$defaultPassword = 'admin';

$username = $_POST["usernameInput"];
$password = $_POST["passwordInput"];
if ($username = $defaultUsername && $password = $defaultPassword){
    header("location: light-control.php");
}
else{
    header("location: login.php");
}

}




?>