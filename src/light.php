<?php 
header("Access-Control-Allow-Origin: *");
require_once "scripts/dbconn.php";
    $sql2 = 'SELECT * FROM api WHERE item = "light" ORDER BY id DESC LIMIT 0, 1;';

    $result2 = mysqli_query($conn, $sql2);
    $resultCheck2 = mysqli_num_rows($result2);
    $row2 = mysqli_fetch_assoc($result2);


    if ($row2['status'] == 1) {
        echo "<img src='images/light_on.png' alt='light on' class='w-1/2 mx-auto'>";
    } else {
        echo "<img src='images/light_off.png' alt='light off' class='w-1/2 mx-auto'>";
    }


    echo '<p id = "update-version" class="text-white">' . $row2['id'] . '</p>';
    mysqli_close($conn);
    echo '<script type="text/javascript" src="scripts/light-refresh.js"></script>';
