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
            <?php
                
                $con = mysqli_connect(HOST,USER,PWD,DBNAME)
                    or die('Error connecting to MySQL server.');

                $id = $_GET['id'];
                $cikkszam = $_GET['cikkszam'];

                $query = "DELETE FROM termekek WHERE id = '$id' AND cikkszam ='$cikkszam'";

                mysqli_query($con,$query)
                    or die('Error querying database.');

                    echo "
                    <div>
                        <h4 style='color: red;'> A $cikkszam cikkszámú termék törölve lett. </h4> 
                        <a class='btn btn-dark' type='submit' href='adminMod.php'> <i class='far fa-check-circle'> Visszalépés</i> </a> 
                    </div>
                    
                    ";

                mysqli_close($con);
            ?>
      </div>      
    </div>
</body>
</html>