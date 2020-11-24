<?php

    require "properties/user.php";

    $con = mysqli_connect(HOST,USER,PWD,DBNAME)
        or die('Error connecting to MySQL server.'); //

    mysqli_query($con, "SET NAMES utf8");

    $search = mysqli_real_escape_string($con, $_POST["search"]);

    $sql = "SELECT * FROM termekek WHERE nev LIKE '%".$search."%'";

    $result = mysqli_query($con, $sql)
        or die('Error querying database.'); //

    if(mysqli_num_rows($result) > 0){

        while($row = mysqli_fetch_array($result)){

            $id = $row["id"];
            $termeknev = $row["nev"];
            $termekar = $row["ar"];
            $termekkep = $row["kep"];
            $cikkszam = $row["cikkszam"];
            $keszlet = $row["keszlet"];

            echo"
            
            <div class='termekdoboz'>

                <div class='termekkep'>
                    <a href='termek.php?termekid=".$id."'> <img src='$termekkep' alt='' title='' /> </a>
                </div>

                <div class='termeknev'>".$termeknev."</div>
                <div class='termekar'>". number_format($termekar)." Ft </div>

                <div id='cikkszam'>
                <p> <strong>Cikkszám: </strong>".$cikkszam."  <strong>Készlet: </strong>".$keszlet."</p>
                </div>

                <div class='termekkosar'>
                    <a href='kosarmuvelet.php?id=".$id."&action=add'>Kosárba</a>
                </div>

            </div>
            
            ";
            
            
        }

       
    }
    else{

        echo "<h4>Nincs ilyen termék az adatbázisban!</h4>";
    }