<?php require "properties/user.php"; ?>
<?php require "header.php"; session_start(); ?>

<div id="top">
    <img id="logo" src="" alt="">
    <?php  require "menu.php";   ?>
</div>

<div id="right_megrendel"> 

<div class="row justify-content-center m-0 p-0">

    <h2 class="mb-5">Megrendeles összesítése</h2>

    <table align="center" cellpadding="7" width="95%">
        
        <tr align="center">
            <th>Sorszám</th>
            <th>Terméknév</th>
            <th>Bruttó ár</th>
            <th>Darabszám</th>
            <th>Cikkszám</th>
            <th>Érték</th>
        </tr>
        <?php
            $vegosszeg = 0;
            
            if(isset($_SESSION["cart"])){
                
                foreach($_SESSION["cart"] as $product_id => $db){
                    
                    $con = mysqli_connect(HOST,USER,PWD,DBNAME)
                        or die('Error querying database1.');
                    
                        mysqli_query($con, "SET NAMES utf8");
                    
                    $sql = "SELECT * FROM termekek WHERE id='$product_id'";
                   
                    $result = mysqli_query($con, $sql)
                        or die('Error querying database2.');
                    
                    while($row = mysqli_fetch_array($result)){
                        
                        $id = $row["id"];
                        $termeknev = $row["nev"];
                        $bruttoar = $row["ar"];
                        $cikkszam = $row["cikkszam"];
                        $ertek = $bruttoar * $db;
                        
                        echo "
                            <tr align='center'>
                                <td>".$id."</td>
                                <td>".$termeknev."</td>
                                <td>".number_format($bruttoar)." Ft</td>
                                <td>".$db."</td>
                                <td>".$cikkszam."</td>
                                <td>".$ertek." Ft</td>
                            </tr>
                        ";
                        $vegosszeg += $ertek;
                    }
                }
                mysqli_close($con);
            }
        ?>
        <tr align="right"> <td colspan="7"> <strong> Végösszeg: <?php echo number_format($vegosszeg);  ?> Ft</strong>   </td> </tr>
    </table>



    <?php
            $error = "";
            $error2 = "";
            $success = "";
            
            if(isset($_POST["megrendel"]) && (isset($_POST["check"]) == 1)){
                
                $nev = $_POST["nev"];
                $email = $_POST["email"];
                $telefon = $_POST["telefon"];
                $szcim = $_POST["cim"];
                $szmod = $_POST["szmod"];
                $fizmod = $_POST["fizmod"];
                
                if( empty($nev) || empty($email) || empty($telefon) || empty($szcim)){
                    
                    $error = "Minden mező kitöltése kötelező!";
                }
                else{
                    
                    $con = mysqli_connect(HOST,USER,PWD,DBNAME)
                        or die('Error connecting to MySQL server.');

                    mysqli_query($con, "SET NAMES utf8");
                   
                     $sql = "INSERT INTO vevok(nev,email,cim,telefon,pw,szcim) VALUES('$nev', '$email', '', '$telefon', '', '$szcim')";
                    
                    mysqli_query($con, $sql)
                        or die('Error querying database3.');
                
                        $utolsovevoid = "SELECT id FROM vevok ORDER BY id DESC LIMIT 1";

                        $result = mysqli_query($con, $utolsovevoid);

                        $get_vevoid = mysqli_fetch_array($result);

                        $kapottvevoid = $get_vevoid[0];
                        
                        $sql2 = "INSERT INTO rendelesek(vevoid, szallitas, fizmod, datum, statusz, bosszeg) 
                        VALUES('$kapottvevoid', '$szmod', '$fizmod', NOW(), 'függőben', '$vegosszeg')";

                    mysqli_query($con, $sql2)
                        or die('Error querying database4.');

                        $utolsorendelesid = "SELECT id FROM rendelesek ORDER BY id DESC LIMIT 1";

                        $result2 = mysqli_query($con, $utolsorendelesid);

                        $get_rendelesid = mysqli_fetch_array($result2);

                        $kapottrendelesid = $get_rendelesid[0];


                    foreach($_SESSION["cart"] as $product_id => $db){

                        $sql3 = "INSERT INTO rend_term(rendelesid, termekid, db) 
                        VALUES('$kapottrendelesid', '$product_id', '$db')"; 

                        mysqli_query($con, $sql3)
                            or die('Error querying database5.');

                        $success = "Rendeléseded elküldve. Köszönjük.";

                    }
                    mysqli_close($con);

                }
            }
            
            else if(isset($_POST["megrendel"]) && (isset($_POST["check"]) == 0)){

                    $error2 = "Vásárlási feltételek elfogadása kötelező!<br>";

                    if(empty($nev) || empty($email) || empty($telefon) || empty($cim)){

                       $error = "Minden mező kitöltése kötelező!";
                   }
                  
               }


    ?>




    <div id="megrendeles">
            
            <form action="" method="post">
            <!-- Hibák megjelenítése -->
               <h4 style="color: red;"><?php if(!empty($error)){echo  $error; } ?></h4>
               <h4 style="color: green;"><?php if(!empty($success)){echo  $success; } ?></h4>

                <input type="text" name="nev" placeholder="Név...">
                <input type="email" name="email" placeholder="E-mail cím...">
                <input type="text" name="telefon" placeholder="Telefonszám...">
                <input type="text" name="cim" placeholder="Szállítási cím (irsz, város, utca, házszám)...">

                <select name="szmod" id="">
                    <option value="gls">GLS Futárral</option>
                    <option value="posta">Postai utánvéttel</option>
                    <option value="szemelyes">Személyes átvétel</option>
                </select>

                <select name="fizmod" id="">
                    <option value="obk">Online bankkártya</option>
                    <option value="atutalas">Átutlás</option>
                    <option value="utanvet">Utánvét</option>
                </select>

               <h4 style="color: red;"><?php if(!empty($error2)){echo  $error2; } ?></h4>
                <p> A rendelés elküldésével elfogadom az <a href="tajekoztato.php">Adatvédelmi nyilatkozatot</a></p>
                <input id="checkbox" type="checkbox" name="check">

                <button type="submit" name="megrendel">Rendelés leadása</button>
            
            </form>

    </div>
   
</div>   
</div>

<?php  require "footer.php";   ?>
</body>
</html>