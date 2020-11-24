<?php 

if (isset($_POST["hirlev"])) {

    $email3  =  $_POST["email"];

    $emailErr = "";
    $success = "";

        if (empty($email3) || (!filter_var($email3, FILTER_VALIDATE_EMAIL))) {

                $emailErr = "Érvénytelen email cím!";
                
            } else {

            $con = mysqli_connect(HOST,USER,PWD,DBNAME);
            mysqli_query($con, "SET NAMES utf8");

            $sql = "INSERT INTO hirlevel(email) VALUES('$email3')";

            mysqli_query($con, $sql);

            $success = "Köszönjük a feliratkozást!";
        }
    }
?>

<footer class="container-fluid" id="footer" > 
    <div class="row"  > 

            <div id="footer1">
                    <ul class="footer-link">
                        <li><a href="index.php">Kezdőoldal</a></li>
                        <li><a href="termekek.php">Termékek</a></li>
                        <li><a href="kapcsolat.php">Kapcsolat</a></li>
                        <li><a href="tajekoztato.php">Tájékoztató</a></li>
                    </ul>
            </div>
            
      <div id="footer2" >
            <div class="col-12 text-center p-2 mt-3" >
                <label for="email">Iratkozz fel a Hírlevélre!</label>
            </div>

            <div class="container-fluid ">
                <div class="row justify-content-center" >

                    <form name="form1" class="form-group col-md-4 text-center p-1" id="hirlev" method="post">
                        <input type="email" class="form-control my-auto" name="email" id="email" placeholder="E-mail cím" required>
                        <br>
                        <button onclick="koszon()"  type="submit" name="hirlev_button" class="btn_footer btn btn-success">Elküld</button>
                    </form>

                    <script>
                    
                    function koszon(){
                        var x = document.form1.email.value;
                            if( x == ""){
                                alert("Mező kitöltése kötelező!");
                                
                            }else{
                                alert("Sikeres feliratkozás!");
                            }
                        }
                    </script>
            
                </div>

            </div>
        </div>
 
    
    </div>
    
</footer>