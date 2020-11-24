<?php

   require "properties/user.php";
    $user = new User();
    $user->logout();
    header('Location: login.php');

?>