<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="author" contents="regform">
    <meta name="description" contents="login">
    <title>Login</title>
    <link href="../output.css" rel="stylesheet">
    <!-- <link rel="stylesheet" href="temp.css"> -->
</head>
<body>
<?php
require_once "scripts/dbconn.php";

//$sql1 = "SELECT * FROM players WHERE task1='1' AND task2='1' AND task3='1';";
//$sql1 = "SELECT * FROM players ;";
$sql2 = 
$sql3 = 
$result = mysqli_query($conn, $sql1);
$resultCheck = mysqli_num_rows($result);
if ($resultCheck > 0){
    while ($row = mysqli_fetch_assoc($result)){
        echo $row['username'] ;
       
    }
}



?>

</body>

</html>