<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="author" contents="regform">
    <meta name="description" contents="login">
    <title>Login</title>
    <!-- <link rel="stylesheet" href="../output.css"> -->
    <!-- <link rel="stylesheet" href="temp.css"> -->
</head>
<body>

<?php
if (($_GET["loggedin"]) == "true"){
    header("location: light-control.php?loggedin=true");
}
?>

<h1>Log In</h1>

<form action=scripts/loginVerify.php method="POST">
<ul>
    <li>
    Username: <input type="text" class="inputBox" id="usernameInput" name="usernameInput" placeholder="Required"required autocomplete="off">
    </li>
    <li>
    Password: <input type="password" class="inputBox" id="passwordInput" name="passwordInput" placeholder="Required"required autocomplete="off">    
    </li>
    <li>
    <input type="submit" class="listSubmit" id="loginButton" name="loginInput"
    value="Log In"></button>
    </li>

</form>
</body>
</html>