<?php
    
    require "adminMenu.php";
    require "properties2/adminUser.php";
    $user = new User();

   
    if(!$user->loginCheck()) {
        header('Location:adminLogin.php');
    }

    

?>

<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link href="../img/icon.png" rel="shortcut icon" type="image/x-icon"> 
    <title>Admin Főoldal</title>
</head>
<body class="bg-secondary">
    <div class="container">
        <div class="row">
            <div class="col-10 col-sm-9 col-md-8 col-lg-7 col-xl-6 mx-auto mt-3 rounded shadow bg-light p-3 text-center">
                <h3 class="mt-0 mb-3">Admin Főoldal</h3>
                <h4 class="mb-3">Üdvözöllek az oldalon, <br>
                <?=$user->username?>!</h4>
                <a href="adminLogout.php">Kijelentkezés</a>
            </div>

            
           

           

        </div>
    </div>



</body>
</html>