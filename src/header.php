<title>Flinders Cyber Soc</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<?php
if (session_status() === PHP_SESSION_NONE) {
  session_start();
}



if (!isset($_SESSION['loggedin'])) {
  $_SESSION['loggedin'] = false;
}


?>

<header class="bg-indigo-600">
<link href="output.css" rel="stylesheet">
  <nav class="mx-auto max-w-7xl px-6 lg:px-8" aria-label="Top">
    <div class="flex w-full items-center justify-between border-b border-indigo-500 py-6 lg:border-none">
      <div class="flex items-center">
        <a href="#">
          <span class="sr-only">Flinders Cyber Society</span>
          <img class="h-10 w-auto" src="images/electric-light-bulb_1f4a1.png" alt="website icon">
        </a>

      </div>
      <div class="ml-10 space-x-4">
        <?php
        if ($_SESSION['loggedin']) {
          echo '<a href="scripts/logout.php" class="inline-block rounded-md border border-transparent bg-white py-2 px-4 text-base font-medium text-indigo-600 hover:bg-indigo-50">Log Out</a>';
          
        } else {
          echo '<a href="login.php" class="inline-block rounded-md border border-transparent bg-indigo-500 py-2 px-4 text-base font-medium text-white hover:bg-opacity-75">Sign in</a>';
        }

        ?>
        
        
      </div>
    </div>

  </nav>
</header>