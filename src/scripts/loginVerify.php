<?php
session_start();

if (isset($_POST["usernameInput"])){
    
 require_once "dbconn.php";

  

$defaultUsername = "admin";
$defaultPassword = "admin";

$injectionUsername = "a";

$username = $_POST["usernameInput"];
$password = $_POST["passwordInput"];


// if ($username = $defaultUsername && $password = $defaultPassword){
    if ($username == $defaultUsername && $password == $defaultPassword){  
          
    $_SESSION["username"] = $username;
    $_SESSION["loggedin"] = true;
    
    

    $updateDate = GETDATE();
    $check =  1;
    
    $sql = "UPDATE players SET task1 = '1', last_updated = CURRENT_TIMESTAMP WHERE uuid = '" . $_SESSION["uuid"] . "';";
    echo $sql;
   
    $statement = mysqli_stmt_init($conn);
    // mysqli_stmt_prepare($statement, $sql);
    // mysqli_stmt_bind_param($statement, 'ss', $check, $updateDate );
    // $result = mysqli_query($conn, $sql);
    // $row = mysqli_fetch_assoc($result);


    if ($result = mysqli_query($conn, $sql)) {
        $_SESSION['loginAttempt'] = 'succeeded';
        header("location: ../light-control.php");
        end();
    }
    else {
        header("location: ../index.php");
        echo mysqli_error($conn);
        echo $sql;
        end();
    }
    mysqli_close($conn);
   
//the above code is an attempt to add a check that marks off task 1, it requires a session variable to exist that 
//can be used by an sql statement to id the user


}
else if ($username == $injectionUsername){
        
    $_SESSION["username"] = $username;
    $_SESSION["loggedin"] = true;
    
    
   $sql = "UPDATE players SET task3 = '1', last_updated = CURRENT_TIMESTAMP WHERE uuid = '" . $_SESSION["uuid"] . "';";
    echo $sql;
   
    $statement = mysqli_stmt_init($conn);
 

    if ($result = mysqli_query($conn, $sql)) {
        $_SESSION['loginAttempt'] = 'succeeded';
        header("location: ../light-control.php");
        end();
    }
    else {
        header("location: ../index.php");
        echo mysqli_error($conn);
        echo $sql;
        end();
    }
    mysqli_close($conn);
}
else{
    $_SESSION['loginAttempt'] = 'failed';
    header("location: ../login.php");
}

}




?>