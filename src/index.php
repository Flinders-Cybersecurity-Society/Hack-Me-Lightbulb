<?php
session_start();
$_SESSION['loginAttempt'] = 'default';
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
  <meta charset="utf-8">
  <meta name="author" contents="regform">
  <meta name="description" contents="index">
  <title>Login</title>
  <link href="output.css" rel="stylesheet">
  <script src="https://challenges.cloudflare.com/turnstile/v0/api.js" async defer></script>
</head>

<body class="bg-indigo-600">
  <script type="text/javascript" src="scripts/onboard.js"></script>

  <div class="relative z-10" aria-labelledby="modal-title" role="dialog" aria-modal="true">

    <div class="fixed inset-0 bg-indigo-500 bg-opacity-75 transition-opacity"></div>

    <div class="fixed inset-0 z-10 overflow-y-auto">
      <div class="flex min-h-full items-end justify-center p-4 text-center sm:items-center sm:p-0">

        <div id="slides-container" class="relative transform overflow-hidden rounded-lg bg-white px-4 pt-5 pb-4 text-left shadow-xl transition-all sm:my-8 sm:w-full sm:max-w-sm sm:p-6">
          <div id="slide-1">
            <img class="items-center justify-center" src="images/CySoc-Small.png">
            <div class="mt-3 text-center sm:mt-5">
              <h3 class="text-2xl font-medium leading-6 text-gray-900" id="modal-title">Flinders Cybersecurity Society O'Week Challenge</h3>
              <div class="mt-2">
                <p class="text-lg text-gray-500">Welcome and thanks for joining, these challenges are meant to be a fun way to learn about some of the vulnerabilities in web applications! <br><br>
                  This experience was created by <br><a class="font-medium text-blue-600 dark:text-blue-500 hover:underline" href="https://www.linkedin.com/in/evan-sahlos-9b07941a9/" target="_blank">Evan Sahlos</a> &  <br><a class="font-medium text-blue-600 dark:text-blue-500 hover:underline" href="https://www.linkedin.com/in/ahorwood/" target="_blank">Alistair Horwood</a></p>
              </div>
            </div>
          </div>

          <div id="slide-2" hidden>
            <img class="items-center justify-center" src="images/ask-for-help.gif">
            <div class="mt-3 text-center sm:mt-5">
              <h3 class="text-2xl font-medium leading-6 text-gray-900" id="modal-title">Remember to ask for help <br>(& introduce yourself)</h3>
              <div class="mt-2">
                <p class="text-lg text-gray-500">You'll see some of our friendliest members ready to help at our O'Week stand. <br> <br>
                  We are here to give you hints, guide you in the right direction and answer any questions you may have</p>
              </div>
            </div>
          </div>

          <div id="slide-3" hidden>
            <img class="items-center justify-center" src="images/tick.gif">
            <div class="mt-3 text-center sm:mt-5">
              <h3 class="text-2xl font-medium leading-6 text-gray-900" id="modal-title">What's the Goal?</h3>
              <div class="mt-2">
                <p class="text-lg text-gray-500">Find as many ways as possible to get past the login box and be able to control the light. <br><br>
                  Finding all the possible ways to get into a system is one of the roles of security auditors and hackers alike.
                </p>
              </div>
            </div>
          </div>

          <div id="slide-4" hidden>
            <img class="items-center justify-center" src="images/hacker.gif">
            <div class="mt-3 text-center sm:mt-5">
              <h3 class="text-2xl font-medium leading-6 text-gray-900" id="modal-title">Enter your cool hacker name below!</h3>
              <div class="mt-2">
                <p class="text-lg text-gray-500">
                <div>
                  <label for="email" class="block text-sm font-medium text-gray-700">Name:</label>
                  <form action="scripts/playerVerify.php" method="POST">
                    <div class="mt-1">
                      <input type="text" name="playerName" id="usernameInput" required class="block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" placeholder="Extreme Hacker Person 4000">
                    </div>
                    <div class="cf-turnstile inline-block pt-3" data-sitekey="0x4AAAAAAACf-Rp-1xKcOoEh"></div>
                    <button type="submit" id="submit-button" class="mt-5 sm:mt-6 inline-flex w-full justify-center rounded-md border border-transparent bg-[#22c55e] px-4 py-2 text-base font-medium text-white shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 sm:text-sm">Get Started</button>
                  </form>
                </div>
                </p>
              </div>
            </div>
          </div>
          <div class="mt-5 sm:mt-6">
            <button type="button" id="next-button" onclick="next()" class="inline-flex w-full justify-center rounded-md border border-transparent bg-indigo-600 px-4 py-2 text-base font-medium text-white shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 sm:text-sm">Next</button>
          </div>
        </div>
      </div>
    </div>
  </div>



</body>

</html>