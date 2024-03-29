<!DOCTYPE html>
<?php require_once 'header.php'; ?>

<body>
  <div class="pt-8 mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
    <!-- Content goes here -->
    <h1 class="text-2xl pb-8">Admin Light Control Page</h1>
    <span class="isolate inline-flex rounded-md shadow-sm">
      <button type="button" onclick="location.href='api/light-change.php?lightOff'"
        class="relative inline-flex items-center rounded-l-md border border-gray-300 bg-white px-4 py-2 text-sm font-medium text-gray-700 hover:bg-gray-50 focus:z-10 focus:border-indigo-500 focus:outline-none focus:ring-1 focus:ring-indigo-500">Turn
        Off</button>
      <button type="button" onclick="location.href='api/light-change.php?lightOn'"
        class="relative -ml-px inline-flex items-center rounded-r-md border border-gray-300 bg-white px-4 py-2 text-sm font-medium text-gray-700 hover:bg-gray-50 focus:z-10 focus:border-indigo-500 focus:outline-none focus:ring-1 focus:ring-indigo-500">Turn
        On</button>
    </span>
    <h1 class="pt-8 text-2xl pb-4">You're Logged in!</h1>
    <p class="text-base">Thanks for signing in securely with your credentials, we had to make this webapp really secure
      so that random people at o-week couldn't just randomly turn our light on and off.</p>


  </div>
  <div>

    <?php
    if (!isset($_GET["redirect"])) {
      require_once 'reward_card.php';
    }
    ?>
  </div>



  <?php
  if (($_SESSION["loggedin"]) == false) {
    header("location: login.php");
  }
  ?>
  <!-- not really necessary, but this if statement makes it so if you change the loggedin= back to false 
it sends you back to the login page (just for consistency) -->



</body>

</html>