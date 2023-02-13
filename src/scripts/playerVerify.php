session_start();
<?php
echo 'please go back and enter your name';

function guidv4($data = null) {
    // Generate 16 bytes (128 bits) of random data or use the data passed into the function.
    $data = $data ?? random_bytes(16);
    assert(strlen($data) == 16);

    // Set version to 0100
    $data[6] = chr(ord($data[6]) & 0x0f | 0x40);
    // Set bits 6-7 to 10
    $data[8] = chr(ord($data[8]) & 0x3f | 0x80);

    // Output the 36 character UUID.
    return vsprintf('%s%s-%s-%s-%s-%s%s%s', str_split(bin2hex($data), 4));
}

if (isset($_POST["playerName"])){
    require_once "dbconn.php";
    $myuuid = guidv4();
    $sql = "INSERT INTO players(username, uuid) VALUES(?,?);";
    $statement = mysqli_stmt_init($conn);
    mysqli_stmt_prepare($statement, $sql);
    mysqli_stmt_bind_param($statement, 'ss', htmlspecialchars($_POST["playerName"]), $myuuid);
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);


    if (mysqli_stmt_execute($statement)) {
        // $success = "Account created! Click here to login";
        header("location: ../login.php");
        end();
    }
    else {
        header("location: ../index.php");
        echo mysqli_error($conn);
        end();
    }
    mysqli_close($conn);


}



?>