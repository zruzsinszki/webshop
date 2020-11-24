<?php
    require "adminMenu.php";
    require "properties2/sql2.php";
    $sql = new Sql();


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
      <title>Admin View</title>
   </head>

   <body class="bg-secondary">

      <div class="container">
         <div class="row justify-content-center col-12 mx-auto rounded bg-light shadow my-3 text-center p-3  ">
            <h1 class="p-3">Termék Lista</h1>
                        
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
               
            $read = $sql->read();

            foreach($read as $kulcs => $ertek){

               echo "


               <tbody>      
                     <tr align='center'>
                        <th scope='row'> ".$ertek[0]." </th>
                        <td>  ".$ertek[1]."  </td>
                        <td>  ".number_format($ertek[2])."  </td>
                        <td>        
                           <a class='btn btn-danger' type='submit' name='delete' href= '' > <i class='far fa-trash-alt'></i> Törlés </a>         
                        </td>
                        <td>
                           <a class='btn btn-warning' type='submit' href='adminModAcc.php?id=' > <i class='fas fa-edit'></i> Módosítás </a>         
                        </td>
                     </tr>
                  </tbody>



               
                           ";
                     }
                     ?>

            
                     <?php
            /*
               
               while($r = mysqli_fetch_assoc($read)){ ?>

                  <tbody>      
                     <tr align="center">
                        <th scope='row'> <?php echo $r['id']; ?></th>
                        <td><?php echo $r['nev']; ?></td>
                        <td><?php echo $r['cikkszam']; ?></td>
                        <td>        
                           <a class="btn btn-danger" type="submit" href="adminDelete2.php?id=<?php echo $r['id']; ?>" > <i class="far fa-trash-alt"></i> Törlés </a>         
                        </td>
                        <td>
                           <a class='btn btn-warning' type='submit' href='adminModAcc.php?id=".$id."&cikkszam=".$cikkszam."' > <i class='fas fa-edit'></i> Módosítás </a>         
                        </td>
                     </tr>
                  </tbody>


               <?php } ?>
               */
                  ?>



               

         </table>
      </div>                  
   </div>


   <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.1/umd/popper.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/js/bootstrap.min.js"></script>
   </body>
</html>