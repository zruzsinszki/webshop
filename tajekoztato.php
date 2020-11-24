<?php require "properties/user.php"; ?>
<?php require "header.php"; ?>

<div id="top">
    <img id="logo" src="" alt="">
    <?php  require "menu.php";   ?>
</div>

<div id="left">

</div>


<div id="right_tajekoztato">
    <?php

        $con = mysqli_connect(HOST,USER,PWD,DBNAME);
        mysqli_query($con, "SET NAMES utf8");

        $sql = "SELECT * FROM tajekoztato";

        $result = mysqli_query($con, $sql)
            or die('Error querying database.');
        
        while($row = mysqli_fetch_array($result)){

            $cim = $row["cim"];
            $content = $row["content"];

            echo "

                <div id='tajekoztato' class=container >
                    <div class='row justify-content-center taj_echo;'><h2>".$cim."</h2>
                    ".$content."
                    </div>
                </div>
            ";
        }


    ?>
</div>

<?php  require "footer.php";   ?>
</body>
</html>