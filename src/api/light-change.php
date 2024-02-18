<?php 
header("Access-Control-Allow-Origin: *");
require_once "../scripts/dbconn.php";


$sql_on = "INSERT INTO `api` (`id`, `item`, `status`) VALUES (NULL, 'light', '1')";
$sql_off = "INSERT INTO `api` (`id`, `item`, `status`) VALUES (NULL, 'light', '0')";


if (isset($_GET["lightOn"])) {
    $sql = $sql_on;
}
else if (isset($_GET["lightOff"])){
    $sql = $sql_off;
}
else{
    header("location: ../light-control.php?redirect=1");
}

$statement = mysqli_stmt_init($conn);
mysqli_stmt_prepare($statement, $sql);

mysqli_stmt_execute($statement);

mysqli_close($conn);

header("location: ../light-control.php?redirect=1");
?>