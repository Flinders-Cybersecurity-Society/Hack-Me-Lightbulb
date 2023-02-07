<!DOCTYPE html>
<body>
    <h1>Light Control Page</h1>
    <button type="button">Turn Light Off</button>
    <button type="button">Turn Light On</button>

<?php
if (($_GET["loggedin"]) == "false"){
    header("location: login.php?loggedin=false");
}
?>
<!-- not really necessary, but this if statement makes it so if you change the loggedin= back to false 
it sends you back to the login page (just for consistency) -->



</body>

</html>