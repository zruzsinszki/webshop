<?php

    require "properties2/adminUser.php";
    
    $user = new User();
    $msg = "";

    if(isset($_POST['reg'])) {
      $msg = $user->registrate($_POST['username'], $_POST['email'], $_POST['pwd1'], $_POST['pwd2']);
    }

?>



<!DOCTYPE html>
<html lang="hu">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.1/css/bootstrap.min.css">
<link href="../img/icon.png" rel="shortcut icon" type="image/x-icon"> 
<title>Regisztráció</title>
</head>

<body class="bg-light">
    <div class="container">
        <div class="row">
            <div class="col-10 col-sm-9 col-md-8 col-lg-7 col-xl-6 mx-auto mt-3 rounded shadow bg-dark text-light p-3 text-center">
                <h3 class="mt-0 mb-3">Regisztráció</h3>

                <?=$msg?>

                <form action="" method="post" class="form-group col-11 col-sm-9 col-md-8 col-lg-7 mx-auto">
                    <label>Felhasználónév:</label>
                    <input class="form-control mb-3" type="text" name="username" required>
                    <label>e-mail cím:</label>
                    <input class="form-control mb-3" type="email" name="email" required>
                    <label>Jelszó:</label>
                    <input class="form-control mb-3" type="password" name="pwd1" required>
                    <label>Jelszó megerősítése:</label>
                    <input class="form-control mb-3" type="password" name="pwd2" required>
                    <button type="submit" class="btn btn-success" name="reg">Regisztráció</button>
                    <button type="reset" class="btn btn-primary">Mégse</button>
                    
                </form>
                <a href="adminLogin.php" class="text-link">Jelentkezz be!</a>
            </div>
        </div>
    </div>
</body>

</html>