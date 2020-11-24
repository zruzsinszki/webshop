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
<title>Admin Delete</title>
</head>

<body class="bg-secondary">

   <div class="container">
      <div class="row justify-content-center col-12 mx-auto rounded bg-light shadow my-3 text-center p-3  ">
         <h1 class="p-3">Termék Törlése / Módosítása</h1>
                     
         <table class="table">
            <thead>
               <tr class="text-center table-active">
                  <th scope="col">ID</th>
                  <th scope="col">Terméknév</th>
                  <th scope="col">Cikkszám</th>
                  <th scope="col">Törlés</th>
                  <th scope="col">Módosítás</th>
               </tr>
            </thead>     
            <?php
               
               $con = mysqli_connect(HOST,USER,PWD,DBNAME)
                  or die('Error connecting to MySQL server.');

               mysqli_query($con, "SET NAMES utf8");

               $sql = "SELECT * FROM termekek";

               $result = mysqli_query($con, $sql)
                  or die('Error querying database.');

               while($row = mysqli_fetch_array($result)){

               $id = $row["id"];
               $termeknev = $row["nev"];
               $cikkszam = $row["cikkszam"];

               echo "
               <tbody>      
                  <tr align='center'>
                     <th scope='row'>".$id."</th>
                     <td>".$termeknev."</td>
                     <td>".$cikkszam."</td>
                     <td>        
                        <a class='btn btn-danger' type='submit' href='adminDelAcc.php?id=".$id."&cikkszam=".$cikkszam."' onclick=\"return confirm('Biztos törli a kiválasztott elemet?')\"> <i class='far fa-trash-alt'></i> Törlés </a>         
                     </td>
                     <td>        
                        <a class='btn btn-warning' type='submit' href='adminModAcc.php?id=".$id."&cikkszam=".$cikkszam."' onclick=\"return confirm('Biztos módosítja a kiválasztott elemet?')\"> <i class='fas fa-edit'></i> Módosítás </a>         
                     </td>
                  </tr>
               </tbody>      
                     ";
               }

               mysqli_close($con);

            ?>

         </table>
      </div>                  
   </div>

</body>
</html>