<?php header("Access-Control-Allow-Origin: *"); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="author" contents="regform">
    <meta name="description" contents="login">
    <title>Login</title>
    <link href="output.css" rel="stylesheet">
    <script src="scripts/confetti.js"></script>

</head>

<body class="container">
    <?php
    require_once "scripts/dbconn.php";


    $sql2 = 'SELECT * FROM api WHERE item = "board" ORDER BY id DESC LIMIT 0, 1;';

    $result2 = mysqli_query($conn, $sql2);
    $resultCheck2 = mysqli_num_rows($result2);
    $row2 = mysqli_fetch_assoc($result2);






    $sql = "SELECT * FROM players ORDER BY last_updated DESC";

    $result = mysqli_query($conn, $sql);
    $resultCheck = mysqli_num_rows($result);




    ?>




    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <!-- Content goes here -->
        <div class="px-4 sm:px-6 lg:px-8">

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

                                    </tr>
                                </thead>
                                <tbody class="divide-y divide-gray-200 bg-white">


                                    <?php
                                    if ($resultCheck > 0) {
                                        while ($row = mysqli_fetch_assoc($result)) {

                                    ?>
                                            <tr class="divide-x divide-gray-200">
                                                <td class="whitespace-nowrap py-4 pl-4 pr-4 text-sm font-medium text-gray-900 sm:pl-6"><?php echo $row['username']; ?></td>
                                                <?php if ($row['task1'] == 1) {
                                                    echo '<td class="whitespace-nowrap p-4 text-sm text-gray-500 bg-green-500">Completed</td>';
                                                } else {
                                                    echo '<td class="whitespace-nowrap p-4 text-sm text-gray-500 ">Not Complete</td>';
                                                }

                                                if ($row['task2'] == 1) {
                                                    echo '<td class="whitespace-nowrap p-4 text-sm text-gray-500 bg-green-500">Completed</td>';
                                                } else {
                                                    echo '<td class="whitespace-nowrap p-4 text-sm text-gray-500 ">Not Complete</td>';
                                                }

                                                if ($row['task3'] == 1) {
                                                    echo '<td class="whitespace-nowrap p-4 text-sm text-gray-500 bg-green-500">Completed</td>';
                                                } else {
                                                    echo '<td class="whitespace-nowrap p-4 text-sm text-gray-500 ">Not Complete</td>';
                                                }
                                                ?>
                                            </tr>
                                    <?php
                                        }
                                    }
                                    ?>
                                    <!-- More people... -->
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>


    <?php 
    // echo '<p id = "update-version" class="text-white">' . $row2['id'] . '</p>';

    echo '<script type="text/javascript" src="scripts/leader-refresh.js"></script>'; ?>
    <script>
        startConfetti();
    </script>
</body>

</html>