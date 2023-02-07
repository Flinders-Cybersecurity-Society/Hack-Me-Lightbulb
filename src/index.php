<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="author" contents="regform">
    <meta name="description" contents="index">
    <title>Login</title>
    <link href="http://localhost/o-week/output.css" rel="stylesheet">
    <!-- <link rel="stylesheet" href="temp.css"> -->
</head>
<body>
<h1>hello</h1>

<form action=playerVerify.php method="POST">
<ul>
    <li>
    Enter your cool hacker name: <input type="text" class="inputBox" id="usernameInput" name="usernameInput" placeholder="Required"required autocomplete="off">
    </li>
    <li>
    <input type="submit" class="listSubmit" id="startButton" name="startInput"
    value="Start"></button>
    </li>

</form>

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
    <h3 class="text-lg font-medium leading-6 text-gray-900">Update your email</h3>
    <div class="mt-2 max-w-xl text-sm text-gray-500">
      <p>Change the email address you want associated with your account.</p>
    </div>
    <form class="mt-5 sm:flex sm:items-center">
      <div class="w-full sm:max-w-xs">
        <label for="email" class="sr-only">Email</label>
        <input type="email" name="email" id="email" class="block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" placeholder="you@example.com">
      </div>
      <button type="submit" class="mt-3 inline-flex w-full items-center justify-center rounded-md border border-transparent bg-indigo-600 px-4 py-2 font-medium text-white shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm">Save</button>
    </form>
  </div>
</div>

</body>
</html>