<?php
    require "adminMenu.php";
    require "properties2/adminUser.php";
   
  
?>


<!DOCTYPE html>
<html lang="hu">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.1/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.min.css">
<link href="../img/icon.png" rel="shortcut icon" type="image/x-icon"> 
<title>Admin Modification</title>
</head>

<body class="bg-secondary">

<div class="container ">
   <div class="row">
      <div class="justify-content-center col-sm-8 mx-auto rounded bg-light shadow my-3 text-center p-3 ">
         <h1 class="p-3">Termék Adat Módosítás</h1>
  
            <?php
               
               $con = mysqli_connect(HOST,USER,PWD,DBNAME)
                  or die('Error connecting to MySQL server.');

               mysqli_query($con, "SET NAMES utf8");

                  if(isset($_GET["id"])){

                        $id = $_GET["id"];
                     
                        $sql = "SELECT * FROM termekek WHERE id='$id'";
                     }

               $result = mysqli_query($con, $sql)
                  or die('#1 - Error querying database.');
               
                  while($row = mysqli_fetch_array($result)){

                  $termekkat = $row["kategoria"];
                  $termeknev = $row["nev"];
                  $cikkszam = $row["cikkszam"];   
                  $termekar = $row["ar"];
                  $termekrovid = $row["rleiras"];
                  $termekhosszu = $row["hleiras"];
                  $file = $row["kep"];
                  $keszlet = $row["keszlet"];
                  

                  echo "
                     

                  <form class='form-group col-11 col-sm-9 col-md-8 col-lg-7 mx-auto' action='' method='post'>  
                  
                  <label><strong>Termék kategória: </strong> ".$termekkat." id=".$id."</label>
                  <input class='form-control mb-3' type='text' name='termekkat2' id=".$id.">

                  <label><strong>Terméknév: </strong> ".$termeknev."</label>
                  <input class='form-control mb-3' type='text' name='termeknev2' id=".$id."> 
                  
                  <label><strong>Cikkszám: </strong> ".$cikkszam."</label>
                  <input class='form-control mb-3' type='text' name='cikkszam2' id=".$id.">
                  
                  <label><strong>Ár: </strong> ".$termekar."</label>
                  <input class='form-control mb-3' type='text' name='termekar2' id=".$id.">
                  
                  <label><strong>Rövid leírás: </strong> ".$termekrovid."</label>
                  <input class='form-control mb-3' type='text' name='termekrovid2' id=".$id.">

                  <label><strong>Hosszú leírás: </strong> ".$termekhosszu."</label>
                  <input class='form-control mb-3' type='text' name='termekhosszu2' id=".$id.">

                  <label><strong>Kép: </strong> ".$file."</label>
                  <input class='form-control mb-3' type='file' name='file2' id=".$id.">
                  
                  <label><strong>Készlet: </strong> ".$keszlet."</label>
                  <input class='form-control mb-3' type='text' name='keszlet2' id=".$id.">
                                                   
                  ";

                  mysqli_close($con);
               }
            ?>


            <?php
              

               if(isset($_POST["updated"])){

                  $error = "";
                  $updated = "";
                     
                  $termekkat2 = $_POST["termekkat2"];
                  $termeknev2 = $_POST["termeknev2"];
                  $cikkszam2 = $_POST["cikkszam2"];
                  $termekar2 = $_POST["termekar2"];
                  $termekrovid2 = $_POST["termekrovid2"];
                  $termekhosszu2 = $_POST["termekhosszu2"];
                  $file2 = $_POST["file2"];
                  $keszlet2 = $_POST["keszlet2"];
                           
                  if(empty($termekkat2) || empty($termeknev2) || empty($cikkszam2) || empty($termekar2) ||
                              empty($termekrovid2) || empty($termekhosszu2) || empty($file2) || 
                                 empty($keszlet2)){
                        $error = "Minden mező kitöltése kötelező!";
                     } else{

                  $con = mysqli_connect(HOST,USER,PWD,DBNAME)
                     or die('Error connecting to MySQL server.');
                     
                  mysqli_query($con, "SET NAMES utf8");
                     
                     $id = $_GET["id"];
                     $cikkszam = $_GET['cikkszam'];

                  $query = "UPDATE termekek
                        SET kategoria = '$termekkat2', nev = '$termeknev2', cikkszam = '$cikkszam2', 
                           ar = '$termekar2', rleiras = '$termekrovid2', hleiras ='$termekhosszu2',  
                              kep = 'img/termekek/".$file2."', keszlet = '$keszlet2', 
                                 WHERE id = '$id' AND cikkszam ='$cikkszam' ";
                     
                     mysqli_query($con, $query)
                        or die('#2 - Error querying database.');

                     $updated = "Termék módosítva.";
                     
                     
                  }
               }
            ?> 
         
            <button class="btn btn-warning" type="submit" name="updated">Termék módosítása</button>
         </form>
                 
      </div>
 </div>
</div>

</body>
</html>