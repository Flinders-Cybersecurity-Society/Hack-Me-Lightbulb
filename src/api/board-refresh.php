<?php 

require_once "../scripts/dbconn.php";


$sql2 = 'SELECT * FROM api WHERE item = "board" ORDER BY id DESC LIMIT 0, 1;';

$result2 = mysqli_query($conn, $sql2);
$resultCheck2 = mysqli_num_rows($result2);
$row2 = mysqli_fetch_assoc($result2);
echo $row2['id'];

mysqli_close($conn);

?>