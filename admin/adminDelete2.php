<?php
    
   
    require "adminMenu.php";
    require "properties2/sql2.php";
    $sql = new Sql();

    $ID = $_GET('id');

    $delete = $sql->deleteProduct($ID);

    if($delete){
        header('location: adminModAcc.php');
    }else{
        echo"Failed to Delete Record!!";
    }


?>

