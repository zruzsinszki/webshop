<?php require "properties/user.php"; ?>

<?php require "header.php"; session_start(); ?>

<div id="top">
    <img id="logo" src="" alt="">
    <?php  require "menu.php";   ?>
</div>


<div id="right_kosar"> 

<div class="row justify-content-center m-0 p-0">

    <h2 class="mb-5">Kosár tartalma</h2>

    <table align="center" width="95%" cellpadding="7">

        <tr align="center">
            <th>Sorszám</th>
            <th>Terméknév</th>
            <th>Bruttó ár</th>
            <th>Darabszám</th>
            <th>Cikkszám</th>
            <th>Érték</th>
            <th> <a href="kosarmuvelet.php?action=empty"> <i class="fas fa-trash-alt"></i> </a> </th>
        </tr>

        <?php

           $vegosszeg = 0;

            if(isset($_SESSION["cart"])){

                foreach($_SESSION["cart"] as $product_id => $db){

                    $con = mysqli_connect(HOST,USER,PWD,DBNAME);
                    mysqli_query($con, "SET NAMES utf8");

                    $sql = "SELECT * FROM termekek WHERE id='$product_id'";

                    $result = mysqli_query($con, $sql)
                        or die('Error querying database.');

                    while($row = mysqli_fetch_array($result)){

                        $id = $row["id"];
                        $termeknev = $row["nev"];
                        $bruttoar = $row["ar"];
                        $cikkszam = $row["cikkszam"];
                        $ertek = $bruttoar*$db;

                        echo "
                        
                            <tr align='center'>
                                <td>".$id."</td>
                                <td>".$termeknev."</td>
                                <td>".number_format($bruttoar)." Ft</td>
                                <td>".$db."</td>
                                <td>".$cikkszam."</td>
                                <td>".$ertek." Ft</td>

                                <td>
                                    <a href='kosarmuvelet.php?id=".$id."&action=add'> <i class='fas fa-plus'></i> </a>
                                    <a href='kosarmuvelet.php?id=".$id."&action=remove'> <i class='fas fa-minus'></i> </a>
                                </td>
                            </tr>
                        
                        ";

                        $vegosszeg += $ertek;
                    }
                }

            }

        ?>

        <tr align="right">

            <td colspan="7">

                <strong>Végösszeg: </strong> <?php echo number_format($vegosszeg);  ?> Ft

            </td>

        </tr>

    </table>

    <!-- megrendelés tilt ha összeg ==0 -->

   <div id="rendeles">
        <a href="megrendeles.php"> <button id="rendeles_btn" name="rendeles_btn">Megrendeles</button> </a>
    </div>

</div>
</div>

<?php  require "footer.php";   ?>
</body>
</html>