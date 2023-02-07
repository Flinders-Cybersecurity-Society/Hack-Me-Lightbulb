<?php
session_start();

if (isset($_POST["usernameInput"])){
    

$defaultUsername = "admin";
$defaultPassword = "admin";

$username = $_POST["usernameInput"];
$password = $_POST["passwordInput"];
// if ($username = $defaultUsername && $password = $defaultPassword){
    if ($username == $defaultUsername && $password == $defaultPassword){    
    $_SESSION["username"] = $username;
    $_SESSION["loggedin"] = true;
    
    // echo  $_SESSION["username"];
    // echo  $_SESSION["loggedin"];

    // echo "$username";
    // echo "$password";
    // echo "$defaultUsername";
    // echo "$defaultPassword";
    // echo "<br>";
    // echo $_POST["usernameInput"];
    // echo $_POST["passwordInput"];
   
    header("location: ../light-control.php");
}
else{
    header("location: ../login.php");
}

}




?>