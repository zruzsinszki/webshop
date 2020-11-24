<?php
   /* require "header.php"; 
    require "properties/sql.php";
    $sql = new Sql();
  */
?>


<?php 

    $kategoria = $sql->kategoria();
     
    foreach($kategoria as $kulcs =>$ertek){
        
       
        echo "
         
            <div class='katlista'>
            <a href='termek2.php?katid=".$ertek[1]."'>".$ertek[0]."</a>
            </div>
        ";

        
    }  
?>

