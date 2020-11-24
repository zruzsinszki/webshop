<?php
   
    require "adminMenu.php";
    require "PHPMailer/Exception.php";
    require "PHPMailer/PHPMailer.php";
    require "PHPMailer/SMTP.php";

    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;

    
    $mail = new PHPMailer(true); 

   
    $msg = "";

    
    if(isset($_POST['send'])) {

        try {

            $mail->isSMTP(); 
            $mail->Host = 'smtp.gmail.com'; 
            $mail->SMTPAuth = true; 
            $mail->Username = $_POST['senderAddress']; 
            $mail->Password = $_POST['pwd']; 
            $mail->Port = 587; 

            
            $mail->setFrom($_POST['senderAddress'], $_POST['senderName']); 
            $mail->addAddress($_POST['address']); 
           
           
            $mail->CharSet = "UTF-8";

            
            $mail->isHTML(true); 
            $mail->Subject = $_POST['subject']; 
            $mail->Body = '<p>'.nl2br($_POST['body']).'</p>';
            

            
            $mail->AddAttachment('image/kep.jpg', 'kep.jpg'); 

            $mail->send();
            $msg = " <h3 class='text-success'>Levél sikeresen elküldve!</h3> ";
        }
        catch(Exception $e) {
            
            $msg = ' <h3 class="text-danger">Levélküldés sikertelen!</h3> <p>Üzenet: '.$mail->ErrorInfo().'</p> ';
        }

    }

?>


<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link href="../img/icon.png" rel="shortcut icon" type="image/x-icon"> 
    <title>Levélküldés</title>
</head>
<body class="bg-secondary">
    <div class="container">
        <div class="row">
            <div class="col-8 mx-auto rounded bg-light shadow my-3 text-center p-3 ">
                <h1>Hírlevél küldése</h1>
                <?=$msg?>
                <form action="" method="post" class="form-group col-7 mx-auto">
                    <label>Feladó e-mail címe:</label>
                    <input type="email" name="senderAddress" class="form-control mb-3" required>
                    <label>Feladó Neve:</label>
                    <input type="text" name="senderName" class="form-control mb-3" required>
                    <label>E-mail fiók jelszava:</label>
                    <input type="password" name="pwd" class="form-control mb-5" required>
                    <label>Címzett</label>
                    <input type="email" name="address" class="form-control mb-3" required>
                    <label>Tárgy:</label>
                    <input type="text" name="subject" class="form-control mb-3" required>
                    <label>Üzenet:</label>
                    <textarea name="body" rows="4" class="form-control mb-3" required></textarea>
                    <button type="submit" name="send" class="btn btn-dark">Küldés</button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>