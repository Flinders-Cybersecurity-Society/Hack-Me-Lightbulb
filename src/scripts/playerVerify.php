
<?php
session_start();



//TO TEST LOCALLY CHANGE $secretKey to: 1x0000000000000000000000000000000AA
//YOU WILL ALSO NEED TO CHANGE data-sitekey in  index.php (line 75ish) to: 1x00000000000000000000AA
if (isset($_POST["cf-turnstile-response"])) {
    $captcha = $_POST["cf-turnstile-response"];
    $secretKey = "1x0000000000000000000000000000000AA"; //comment this line out when deploying on server
    $ip = "oweek.flinderscybersociety.org";

    $url_path = 'https://challenges.cloudflare.com/turnstile/v0/siteverify';
    $data = array('secret' => $secretKey, 'response' => $captcha, 'remoteip' => $ip);

    $options = array(
        'http' => array(
            'method' => 'POST',
            'content' => http_build_query($data)
        )
    );

    $stream = stream_context_create($options);

    $result = file_get_contents(
        $url_path,
        false,
        $stream
    );

    $response =  $result;

    $responseKeys = json_decode($response, true);

    if (intval($responseKeys["success"]) !== 1) {
        header("location: ../index.php"); //Captcha failed, redirect user to index.php

    } else {
        echo "you have been verified as a human"; //verified as human, continue with playerverify.php
    }
}

function guidv4($data = null)
{
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

if (isset($_POST["playerName"])) {
    require_once "dbconn.php";
    $myuuid = guidv4();
    $_SESSION["uuid"] = $myuuid;
    $sql = "INSERT INTO players(username, uuid) VALUES(?,?);";
    $statement = mysqli_stmt_init($conn);
    mysqli_stmt_prepare($statement, $sql);
    mysqli_stmt_bind_param($statement, 'ss', htmlspecialchars($_POST["playerName"]), $myuuid);


    if (mysqli_stmt_execute($statement)) {
        $url = 'https://oweek.flinderscybersociety.org/api/board-change.php';
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $url);
        $data = curl_exec($curl);
        header("location: ../login.php"); //success, redirect to login page
        end();
    } else {
        header("location: ../index.php"); //failed to insert into db, return to index.php
        echo mysqli_error($conn);
        end();
    }
    mysqli_close($conn);
}






?>