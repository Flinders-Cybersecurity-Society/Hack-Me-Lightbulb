<?php
require_once 'header.php';
require_once "scripts/dbconn.php";
session_start();
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="author" contents="regform">
    <meta name="description" contents="login">
    <title>Login</title>
</head>

<body>

    <?php
    echo $_SESSION["uuid"];
    if (isset($_GET["loggedin"])) {
        if (($_GET["loggedin"]) == "true") {
            $_SESSION['loggedin'] = true;
            $sql = "UPDATE players SET task2 = '1', last_updated = CURRENT_TIMESTAMP WHERE uuid = '" . $_SESSION["uuid"] . "';";
            echo "<br>" . $sql . "<br>";
            $statement = mysqli_stmt_init($conn);
            mysqli_stmt_prepare($statement, $sql);
            if (mysqli_stmt_execute($statement)) {
                    header("location: light-control.php");
                    echo "sql sent";
            }
            else {
                echo "sql not sent";

                header("location: index.php");
                echo mysqli_error($conn);
                echo $sql;

            }
            mysqli_close($conn);

        }
    } else {
        header("location: login.php?loggedin=false");
    }

    ?>

    <div class="flex min-h-full items-center justify-center py-12 px-4 sm:px-6 lg:px-8">
        <div class="w-full max-w-md space-y-8">
            <div>
                <img class="mx-auto h-12 w-auto" src="images/electric-light-bulb_1f4a1.png" alt="Your Company">
                <h2 class="mt-6 text-center text-3xl font-bold tracking-tight text-gray-900">Login Required</h2>

            </div>
            <form class="mt-8 space-y-6" action=scripts/loginVerify.php method="POST">
                <input type="hidden" name="remember" value="true">
                <div class="-space-y-px rounded-md shadow-sm">
                    <div>
                        <label for="usernameInput" class="sr-only">Username</label>
                        <input id="usernameInput" name="usernameInput" type="text" autocomplete="off" required class="relative block w-full appearance-none rounded-none rounded-t-md border border-gray-300 px-3 py-2 text-gray-900 placeholder-gray-500 focus:z-10 focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm" placeholder="Username">
                    </div>
                    <div>
                        <label for="passwordInput" class="sr-only">Password</label>
                        <input id="passwordInput" name="passwordInput" type="password" autocomplete="off" required class="relative block w-full appearance-none rounded-none rounded-b-md border border-gray-300 px-3 py-2 text-gray-900 placeholder-gray-500 focus:z-10 focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm" placeholder="Password">
                    </div>
                </div>



                <div>
                    <button type="submit" class="group relative flex w-full justify-center rounded-md border border-transparent bg-indigo-600 py-2 px-4 text-sm font-medium text-white hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
                        <span class="absolute inset-y-0 left-0 flex items-center pl-3">
                            <!-- Heroicon name: mini/lock-closed -->
                            <svg class="h-5 w-5 text-indigo-500 group-hover:text-indigo-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                <path fill-rule="evenodd" d="M10 1a4.5 4.5 0 00-4.5 4.5V9H5a2 2 0 00-2 2v6a2 2 0 002 2h10a2 2 0 002-2v-6a2 2 0 00-2-2h-.5V5.5A4.5 4.5 0 0010 1zm3 8V5.5a3 3 0 10-6 0V9h6z" clip-rule="evenodd" />
                            </svg>
                        </span>
                        Sign in
                    </button>
                </div>
            </form>
            <?php
            if($_SESSION['loginAttempt']=='failed'){
            echo '
            <div class="group relative flex w-full justify-center rounded-md border border-transparent bg-yellow-500  py-2 px-4 text-m font-medium text-black">
            
            Username or password incorrect! Please try again.
            </div>
            ';}
            ?>
        </div>
    </div>



</body>

</html>