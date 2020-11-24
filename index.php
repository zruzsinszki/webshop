
<?php
    require "header.php";
    require "menu.php";
    require "properties/user.php";
    $user = new User();
    
    if(!$user->loginCheck()) {
        header('Location: login.php');
    }

    

//Meghívjuk a user objektum loginCheck metódusát, ha nem igazzal tér vissza, akkor visszairányítunk a bejelentkezésre
    //A loginCheck értéket adott a két publikus attribútumunknak
?>



<div id="right_index">

    <div class="index_bg_section">
        <div class="container">
        <div class="row">
        <div class="col-10 col-sm-9 col-md-8 col-lg-7 col-xl-6 mx-auto mt-3 p-3 text-center">
        <h2>Üdvözöllek az oldalon: </br> <?=$user->username?>!</h2>
         <a class="btn btn-secondary" href="logout.php"><i class="fas fa-sign-out-alt"></i> Kijelentkezés</a> 
        </div>
        </div>
        </div>

    </div>

</div>

<?php  require "footer.php";   ?>

</body>
</html>
