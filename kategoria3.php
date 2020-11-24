<?php
    /*require "header.php"; */
    require "properties/sql.php";
    $sql = new Sql();
  
?>


<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<meta name="Description" content="Enter your description here"/>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css">
<link rel="stylesheet" href="css/style.css">
<title>Autók megjelenítése</title>
</head>
<body>


<div class="container">
        <div class="row justify-content-center">
            <form action="" method="post" class="bg-dark text-light text-center p-5 m-auto rounded">
                <select name="select" id="">
                    <?php
                        $kategoria = $sql->kategoria();

                        foreach($kategoria as $kulcs =>$ertek){

                            echo "<option value='$ertek[1]'> $ertek[0] </option>";
                        }
                    ?>
                </select>

                <button type="submit" name="show" class="btn btn-warning">Autók megejelenítése</button>
            </form>
        </div>
    </div>


    <?php
    if(isset($_POST["show"])){

        $select = $_POST["select"];

        $car = $sql->show($select);

        foreach($car as $kulcs => $ertek ){
       
            echo "

                <div class='result ml-5 mt-5 text-center'>
                    <div>Kép: <img src='".$ertek[7]."' /> </div>
                    <div>Név: ".$ertek[1]."</div>
                    <div>Ár: ".number_format($ertek[2])." Ft</div>
                    <div><button class='btn btn-warning'>Megveszem</button></div>
                </div>
            
            ";
        }
    }





?>

