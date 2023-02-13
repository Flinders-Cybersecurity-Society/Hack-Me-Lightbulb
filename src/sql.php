<?php

$sql = "UPDATE players SET task1 = '1', last_updated = CURRENT_TIMESTAMP WHERE uuid = \'" . $_SESSION["uuid"] . " \';";


?>