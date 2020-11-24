<?php

   require "properties2/adminUser.php";
    $user = new User();
    $user->logout();
    header('Location:adminLogin.php');

?>