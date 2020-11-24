
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
<?php  require "kategoria2.php"; ?>
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

        $termekek = $sql->termekek();

        foreach($termekek as $kulcs => $ertek){

            echo "
            <div class='termekdoboz'>

               <div class='termekkep'>
                  <a href='termek2.php?termekid=".$ertek[0]."'> <img src='".$ertek[3]."' alt='' title='' /> </a>
               </div>

               <div class='termeknev'>".$ertek[1]."</div>
               <div class='termekar'>". number_format($ertek[2])." Ft </div>

               <div class='termekkosar'>
                  <a href='kosarmuvelet.php?id=".$ertek[0]."&action=add'>Kosárba</a>
               </div>

            </div>
                ";
            }

    ?>
</div>

<?php  require "footer.php";   ?>

</body>
</html>

