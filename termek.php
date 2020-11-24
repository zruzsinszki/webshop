<?php
    require "properties/sql.php";
    $sql = new Sql();
?>

<?php require "header.php"; ?>

<div id="top">
    <img id="logo" src="" alt="">
    <?php  require "menu.php";   ?>
</div>

    <div id="left">
        <?php  require "kategoria2.php";  ?>
    </div>


<div id="right">

        <?php

            $con = mysqli_connect(HOST,USER,PWD,DBNAME);
            mysqli_query($con, "SET NAMES utf8");

            if(isset($_GET["termekid"])){

                $termekid = $_GET["termekid"];

                $sql = "SELECT * FROM termekek WHERE id='$termekid'";
            }

                $result = mysqli_query($con, $sql)  
                    or die('Error querying database.');

            while($row = mysqli_fetch_array($result)){

                $id = $row["id"];
                $termeknev = $row["nev"];
                $termekar = $row["ar"];
                $cikkszam = $row["cikkszam"];
                $keszlet = $row["keszlet"];
                $rleiras = $row["rleiras"];
                $hleiras = $row["hleiras"];
                $termekkep = $row["kep"];

                echo "
                    <div id='tradatok' class='container-fluid'>
                        <div class=''>
                        <div id='trkep'>
                            <img src='$termekkep' alt='' title='' />
                        </div>

                        <div id='trnev'>
                            <h1>".$termeknev."</h1>
                        </div>

                        <div id='trar'>
                            Ár: ". number_format($termekar) ." Ft
                        </div>

                        <div id='trrovid'>".$rleiras."</div>
                        
                        <div id='trhosszu'>
                            ".$hleiras."
                        </div>

                        <div id='trcikk'>
                            <p> 
                                <strong>Cikkszám: </strong>".$cikkszam." <strong>Készlet: </strong>".$keszlet." 
                            </p>
                        </div>

                        <div id='trkosar'>
                            <a href='kosarmuvelet.php?id=".$id."&action=add'>Kosárba</a>
                        </div>

                        </div>
                    </div>
                ";
            }

        ?>
</div>

<?php  require "footer.php";   ?>
</body>
</html>