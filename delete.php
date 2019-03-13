<?php

include ('Connection.php');
include ('User.php');

   $user = new User();
    if(isset($_GET['idd'])) {

      $obj = $user->delete($_GET['idd']);
    }
?>
