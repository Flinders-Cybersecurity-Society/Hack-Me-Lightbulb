<!DOCTYPE html>
<html lang="en">

<head>
<meta name="viewport" 
      content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
  <meta charset="utf-8">
  <meta name="author" contents="regform">
  <meta name="description" contents="index">
  <title>Login</title>
  <link href="../output.css" rel="stylesheet">
  <!-- <link rel="stylesheet" href="temp.css"> -->
</head>

<body>
  <script type="text/javascript" src="scripts/onboard.js"></script>

  <div class="relative z-10" aria-labelledby="modal-title" role="dialog" aria-modal="true">
    <!--
    Background backdrop, show/hide based on modal state.

    Entering: "ease-out duration-300"
      From: "opacity-0"
      To: "opacity-100"
    Leaving: "ease-in duration-200"
      From: "opacity-100"
      To: "opacity-0"
  -->
    <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity"></div>

    <div class="fixed inset-0 z-10 overflow-y-auto">
      <div class="flex min-h-full items-end justify-center p-4 text-center sm:items-center sm:p-0">
        <!--
        Modal panel, show/hide based on modal state.

        Entering: "ease-out duration-300"
          From: "opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
          To: "opacity-100 translate-y-0 sm:scale-100"
        Leaving: "ease-in duration-200"
          From: "opacity-100 translate-y-0 sm:scale-100"
          To: "opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
      -->
        <div id="slides-container" class="relative transform overflow-hidden rounded-lg bg-white px-4 pt-5 pb-4 text-left shadow-xl transition-all sm:my-8 sm:w-full sm:max-w-sm sm:p-6">
          <div id="slide-1">
            <img class="items-center justify-center" src="images/CySoc-Small.png">
            <div class="mt-3 text-center sm:mt-5">
              <h3 class="text-lg font-medium leading-6 text-gray-900" id="modal-title">Flinders Cybersecurity Society O'Week Challenge</h3>
              <div class="mt-2">
                <p class="text-sm text-gray-500">Welcome and thanks for joining, these challenges are meant to be a fun way to learn about some of the vulnerabilities in web applications!</p>
              </div>
            </div>
          </div>
          <div id="slide-2" hidden>
            <img class="items-center justify-center" src="images/ask-for-help.gif">
            <div class="mt-3 text-center sm:mt-5">
              <h3 class="text-lg font-medium leading-6 text-gray-900" id="modal-title">Flinders Cybersecurity Society O'Week Challenge</h3>
              <div class="mt-2">
                <p class="text-sm text-gray-500">Welcsssssome and thanks for joining, these challenges are meant to be a fun way to learn about some of the vulnerabilities in web applications!</p>
              </div>
            </div>
          </div>
          <div class="mt-5 sm:mt-6">
            <button type="button" onclick="next()" class="inline-flex w-full justify-center rounded-md border border-transparent bg-indigo-600 px-4 py-2 text-base font-medium text-white shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 sm:text-sm">Next</button>
          </div>
        </div>

      </div>
    </div>
  </div>


  <!-- <form action=scripts/playerVerify.php method="POST">
<ul>
    <li>
    Enter your cool hacker name: <input type="text" class="inputBox" id="usernameInput" name="usernameInput" placeholder="Required"required autocomplete="off">
    </li>
    <li>
    <input type="submit" class="listSubmit" id="startButton" name="startInput"
    value="Start"></button>
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
  <div class="bg-white shadow sm:rounded-lg">
    <div class="px-4 py-5 sm:p-6">
      <h3 class="text-lg font-medium leading-6 text-gray-900">Enter your cool hacker name</h3>
      <div class="mt-2 max-w-xl text-sm text-gray-500">
        <p>Change the email address you want associated with your account.</p>
      </div>
      <form class="mt-5 sm:flex sm:items-center" action="scripts/playerVerify.php" method="POST">
        <div class="w-full sm:max-w-xs">
          <label for="email" class="sr-only">Email</label>
          <input type="text" name="playerName" required id="playerName" class="block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" placeholder="required" autocomplete="off">
        </div>
        <button type="submit" class="mt-3 inline-flex w-full items-center justify-center rounded-md border border-transparent bg-indigo-600 px-4 py-2 font-medium text-white shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm">Begin</button>
      </form>
    </div>
  </div>

</body>

</html>