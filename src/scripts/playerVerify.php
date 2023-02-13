<?php
echo 'please go back and enter your name';

if (isset($_POST["playerName"])){
    require_once "dbconn.php";

    $sql = "INSERT INTO players(username) VALUES(?);";
    $statement = mysqli_stmt_init($conn);
    mysqli_stmt_prepare($statement, $sql);
    mysqli_stmt_bind_param($statement, 's', htmlspecialchars($_POST["playerName"]));
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);


    if (mysqli_stmt_execute($statement)) {
        // $success = "Account created! Click here to login";
        header("location: ../login.php");
        end();
    }
    else {
        header("location: ../index");
        echo mysqli_error($conn);
        end();
    }
    mysqli_close($conn);


}



?>