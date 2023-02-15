<?php 

require_once "../scripts/dbconn.php";


$sql = "INSERT INTO `api` (`id`, `item`, `status`) VALUES (NULL, 'board', '1')";

$statement = mysqli_stmt_init($conn);
mysqli_stmt_prepare($statement, $sql);

mysqli_stmt_execute($statement);

mysqli_close($conn);

?>