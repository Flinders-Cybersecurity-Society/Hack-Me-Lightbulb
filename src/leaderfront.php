<?php
// require_once 'header.php';


?>

<!DOCTYPE html>
<html lang="en">
<link href="output.css" rel="stylesheet">

<head>
    <meta charset="utf-8">
    <meta name="author" contents="regform">
    <meta name="description" contents="login">
    <title>Leaderbord</title>
    <!-- <link rel="stylesheet" href="../output.css"> -->
    <!-- <link rel="stylesheet" href="temp.css"> -->
</head>

<body>
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <!-- Content goes here -->
        <div class="px-4 sm:px-6 lg:px-8">
            <!-- <div class="sm:flex sm:items-center">
                <div class="sm:flex-auto">
                    <h1 class="text-xl font-semibold text-gray-900">Users</h1>
                    <p class="mt-2 text-sm text-gray-700">A list of all the users in your account including their name, title, email and role.</p>
                </div>
                <div class="mt-4 sm:mt-0 sm:ml-16 sm:flex-none">
                    <button type="button" class="inline-flex items-center justify-center rounded-md border border-transparent bg-indigo-600 px-4 py-2 text-sm font-medium text-white shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 sm:w-auto">Add user</button>
                </div>
            </div> -->
            <div class="mt-8 flex flex-col">
                <div class="-my-2 -mx-4 overflow-x-auto sm:-mx-6 lg:-mx-8">
                    <div class="inline-block min-w-full py-2 align-middle md:px-6 lg:px-8">
                        <div class="overflow-hidden shadow ring-1 ring-black ring-opacity-5 md:rounded-lg">
                            <table class="min-w-full divide-y divide-gray-300">
                                <thead class="bg-gray-50">
                                    <tr class="divide-x divide-gray-200">
                                        <th scope="col" class="py-3.5 pl-4 pr-4 text-left text-sm font-semibold text-gray-900 sm:pr-6">Hacker Name</th>
                                        <th scope="col" class="px-4 py-3.5 text-left text-sm font-semibold text-gray-900">Task 1:<br>Default Credentials</th>
                                        <th scope="col" class="px-4 py-3.5 text-left text-sm font-semibold text-gray-900">Task 2:<br>What's in that URL bar?</th>
                                        <th scope="col" class="px-4 py-3.5 text-left text-sm font-semibold text-gray-900">Task 3:<br>Injection</th>
                                        <th scope="col" class="px-4 py-3.5 text-left text-sm font-semibold text-gray-900">Task 4:<br>I'm Colin Stirling</th>

                                    </tr>
                                </thead>
                                <tbody class="divide-y divide-gray-200 bg-white">
                                    <tr class="divide-x divide-gray-200">
                                        <td class="whitespace-nowrap py-4 pl-4 pr-4 text-sm font-medium text-gray-900 sm:pl-6">Lindsay WaltonLindsay WaltonLindsay WaltonLindsay WaltonLindsay Walton</td>
                                        <td class="whitespace-nowrap p-4 text-sm text-gray-500 bg-green-500">Completed</td>
                                        <td class="whitespace-nowrap p-4 text-sm text-gray-500 bg-green-500">Completed</td>
                                        <td class="whitespace-nowrap p-4 text-sm text-gray-500">Not Completed</td>
                                        <td class="whitespace-nowrap p-4 text-sm text-gray-500">Not Completed</td>

                                    </tr>

                                    <!-- More people... -->
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

</body>

</html>