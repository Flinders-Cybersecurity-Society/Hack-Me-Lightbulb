<?php
require_once 'header.php';

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="author" contents="regform">
    <meta name="description" contents="login">
    <title>Login</title>
    <!-- <link rel="stylesheet" href="../output.css"> -->
    <!-- <link rel="stylesheet" href="temp.css"> -->
</head>

<body>

    <?php
    if (isset($_GET["loggedin"])) {
        if (($_GET["loggedin"]) == "true") {
            $_SESSION['loggedin'] = true;
            header("location: light-control.php");
        }
    } else {
        header("location: light-control.php?loggedin=false");
    }

    ?>

    <!-- <h1>Log In</h1>

    <form action=scripts/loginVerify.php method="POST">
        <ul>
            <li>
                Username: <input type="text" class="inputBox" id="usernameInput" name="usernameInput" placeholder="Required" required autocomplete="off">
            </li>
            <li>
                Password: <input type="password" class="inputBox" id="passwordInput" name="passwordInput" placeholder="Required" required autocomplete="off">
            </li>
            <li>
                <input type="submit" class="listSubmit" id="loginButton" name="loginInput" value="Log In"></button>
            </li>

    </form> -->

    <!--
  This example requires some changes to your config:
  
  ```
  // tailwind.config.js
  module.exports = {
    // ...
    plugins: [
      // ...
      require('@tailwindcss/forms'),
    ],
  }
  ```
-->
    <!--
  This example requires updating your template:

  ```
  <html class="h-full bg-gray-50">
  <body class="h-full">
  ```
-->
    <div class="flex min-h-full items-center justify-center py-12 px-4 sm:px-6 lg:px-8">
        <div class="w-full max-w-md space-y-8">
            <div>
                <img class="mx-auto h-12 w-auto" src="https://tailwindui.com/img/logos/mark.svg?color=indigo&shade=600" alt="Your Company">
                <h2 class="mt-6 text-center text-3xl font-bold tracking-tight text-gray-900">Sign in to your account</h2>

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
        </div>
    </div>



</body>

</html>