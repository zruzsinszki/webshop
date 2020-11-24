<?php require "header.php"; ?>

<div id="top">
    <img id="logo" src="" alt="">
    <?php  require "menu.php";   ?>
</div>

<div id="right_kereses">

    <div id="search_form">

        <h2>Termék keresése</h2>

        <form action="" method="post">
                    
            <input class="search_text" type="text" name="search_text" placeholder="Írja be a termék nevét...">
        
        </form>

    </div>

    <div class="result"> </div>


</div>


<script>
    $(function(){

    $(".search_text").keyup(function(){

    var text = $(this).val();

    if(text != ""){

    $.ajax({
        url: "fetch.php",
        type: "post",
        dataType: "text",
        data: {search:text},
        success: function(data){

            $(".result").html(data);
            
        }
    })

    }
    else{

    $(".result").html('');

    }
    })
    })
</script>

<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>

<?php  require "footer.php";   ?>
</body>
</html>

