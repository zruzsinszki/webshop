<?php require "properties/user.php"; ?>
<?php

    session_start();

    
    $action = $_GET["action"];
    $product_id = $_GET["id"];

    switch($action){

        case "add":
            $_SESSION["cart"][$product_id]++;
            $url = "kosar.php";
            echo "<META HTTP-EQUIV=Refresh CONTENT='0; URL=".$url."'/>";
        break;


        case "remove":
            $_SESSION["cart"][$product_id]--;
                if($_SESSION["cart"][$product_id] == 0){

                    unset($_SESSION["cart"][$product_id]);

                if(empty($_SESSION["cart"])){

                    unset($_SESSION["cart"]);
                }
            }
            $url = "kosar.php";
            echo "<META HTTP-EQUIV=Refresh CONTENT='0; URL=".$url."'/>";
        break;


        case "empty":
            unset($_SESSION["cart"]);
            $url = "kosar.php";
            echo "<META HTTP-EQUIV=Refresh CONTENT='0; URL=".$url."'/>";
        break;
    }
    header("Location: kosar.php");