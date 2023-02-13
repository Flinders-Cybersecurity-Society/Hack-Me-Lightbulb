<?php
session_start();

if (isset($_POST["usernameInput"])){
    
 require_once "dbconn.php";

  

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
   
    // UPDATE Customers
    // SET ContactName = 'Alfred Schmidt', City= 'Frankfurt'
    // WHERE CustomerID = 1;

    // $sql = "UPDATE players
    // SET task1 = '1'
    // WHERE user_id = ;
    // $statement = mysqli_stmt_init($conn);
    // mysqli_stmt_prepare($statement, $sql);
    // mysqli_stmt_bind_param($statement, 's', htmlspecialchars($_POST["playerName"]));
    // $result = mysqli_query($conn, $sql);
    // $row = mysqli_fetch_assoc($result);


    // if (mysqli_stmt_execute($statement)) {
    //     // $success = "Account created! Click here to login";
    //     header("location: ../light-control.php");
    //     end();
    // }
    // else {
    //     header("location: ../index");
    //     echo mysqli_error($conn);
    //     end();
    // }
    // mysqli_close($conn);
   
//the above code is an attempt to add a check that marks off task 1, it requires a session variable to exist that 
//can be used by an sql statement to id the user

    header("location: ../light-control.php");
}
else{
    header("location: ../login.php");
}

}




?>