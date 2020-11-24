<?php
    
   
    require "adminMenu.php";
    require "properties2/sql2.php";

    $sql = new Sql();

    $msg = "";
    

    if(isset($_POST["upload"])){

        $file = $_POST["file"];
        $termeknev = $_POST["termeknev"];
        $termekar = $_POST["termekar"];
        $cikkszam = $_POST["cikkszam"];
        $keszlet = $_POST["keszlet"];
        $termekrovid = $_POST["termekrovid"];
        $termekhosszu = $_POST["termekhosszu"];
        $termekkat = $_POST["termekkat"];

        try{


            $sql->uploadTermek($file,$termeknev,$termekar,$cikkszam,$keszlet,
                                $termekrovid,$termekhosszu,$termekkat);
           
        }
        catch(Exception $e){

            $msg = $e->getMessage();

        }
       
        

      
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
<title>Admin Modify</title>
</head>

<body class="bg-secondary">

    <div class="container">
        <div class="row justify-content-center col-8 mx-auto rounded bg-light shadow my-3 text-center p-3  ">
            <h1>Termék Feltöltése</h1>

        <form class="form-group text-center bg-light p-5" action="" method="post">

                <?php echo"  $msg "  ?>
                
                
                <label>Válassz ki egy termékképet</label>
                <input class="form-control mb-3" type="file" name="file" id="">

                <label>Terméknév</label>
                <input class="form-control mb-3" type="text" name="termeknev" id="">

                <label>Termékár</label>
                <input class="form-control mb-3" type="text" name="termekar" id="">

                <label>Termék kategória</label>
                <input class="form-control mb-3" type="text" name="termekkat" id="">

                <label>Cikkszám</label>
                <input class="form-control mb-3" type="text" name="cikkszam" id="">

                <label>Készlet</label>
                <input class="form-control mb-3" type="text" name="keszlet" id="">

                <label>Termék rövid leírása</label>
                <input class="form-control mb-3" type="text" name="termekrovid" id="">

                <label>Termék részletes leírása</label>
                <textarea class="form-control mb-3" name="termekhosszu" id="" cols="50" rows="13"></textarea>

                <button class="btn btn-success" type="submit" name="upload">Termék felvétele</button>
            </form>
        </div>
    </div>

</body>
</html>