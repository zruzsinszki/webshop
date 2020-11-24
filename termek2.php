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

            if(isset($_GET['termekid'])){

                $termekid = $_GET['termekid'];

                $termek = $sql->show_termek($termekid);

                foreach($termek as $kulcs => $ertek){


                echo "
                    <div id='tradatok' class='container-fluid'>
                        <div class=''>
                        <div id='trkep'>
                        <a href='termek2.php?termekid=$ertek[0]'>
                            <img src=".$ertek[7]." alt='' title='' />
                        </a>
                        </div>

                        <div id='trnev'>
                            <h1>".$ertek[1]."</h1>
                        </div>

                        <div id='trar'>
                            Ár: ". number_format($ertek[2]) ." Ft
                        </div>

                        <div id='trrovid'>".$ertek[5]."</div>
                        
                        <div id='trhosszu'>
                            ".$ertek[6]."
                        </div>

                        <div id='trcikk'>
                            <p> 
                                <strong>Cikkszám: </strong>".$ertek[3]." <strong>Készlet: ".$ertek[4]." </strong> 
                            </p>
                        </div>

                        <div id='trkosar'>
                            <a href='kosarmuvelet.php?id=".$ertek[0]."&action=add'>Kosárba</a>
                        </div>

                        </div>
                    </div>
                ";
            }
        }

        ?>
</div>

<?php  require "footer.php";   ?>
</body>
</html>