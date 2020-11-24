<?php require "header.php"; ?>

<div id="top">
    <img id="logo" src="" alt="">
    <?php  require "menu.php";   ?>
</div>

<div id="left">
<?php require "kategoria.php"; ?>
</div>


<div id="right">

        <div id="sort" >
            <a href="?sort=name">Név szerint </a>|
            <a href="?sort=price_asc">Legolcsóbb elől </a>|
            <a href="?sort=price_desc">Legdrágább elől </a>|
            <a href="?sort=new">Legújabb elől </a>|
            <a href="?sort=best">Legnépszerűbb elől </a>
        </div>

    <?php


        $con = mysqli_connect(HOST,USER,PWD,DBNAME);
        mysqli_query($con, "SET NAMES utf8");

        if(isset($_GET["katid"])){

            $katid = $_GET["katid"];

            $sql = "SELECT * FROM termekek WHERE kategoria='$katid'";
        }
        else if(isset($_GET["sort"])){

            $sort = $_GET["sort"];

            switch($sort){

                case "name":
                    $sql = "SELECT id,nev,ar,kep FROM termekek GROUP BY nev";
                break;
                
                case "price_asc":
                    $sql = "SELECT * FROM termekek ORDER BY ar";
                break;

                case "price_desc":
                    $sql = "SELECT * FROM termekek ORDER BY ar DESC";
                break;

                case "new":
                    $sql = "SELECT * FROM termekek ORDER BY id DESC";
                break;

                case "best":
                    $sql = "SELECT * FROM termekek INNER JOIN rend_term ON termekek.id=rend_term.termekid GROUP BY nev ORDER BY SUM(db) DESC";
                break;
            }
        }
        else{

            $sql = "SELECT * FROM termekek ORDER BY id DESC";

        }

        $result = mysqli_query($con, $sql)
            or die('Error querying database.');

        while($row = mysqli_fetch_array($result)){

            $id = $row["id"];
            $termeknev = $row["nev"];
            $termekar = $row["ar"];
            $termekkep = $row["kep"];

            echo "

            

            <div class='termekdoboz'>

                <div class='termekkep'>
                    <a href='termek.php?termekid=".$id."'> <img src='$termekkep' alt='' title='' /> </a>
                </div>

                <div class='termeknev'>".$termeknev."</div>
                <div class='termekar'>". number_format($termekar)." Ft </div>

                <div class='termekkosar'>
                    <a href='kosarmuvelet.php?id=".$id."&action=add'>Kosárba</a>
                </div>

            </div>

            ";
        }
        
       

       


    ?>
</div>

<?php  require "footer.php";   ?>

</body>
</html>