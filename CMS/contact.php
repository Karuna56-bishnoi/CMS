<?php 
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';
require 'PHPMailer/src/Exception.php';

include "includes/header.php"; 
include "includes/navigation.php"; 

$msg = "";

if (isset($_POST['submit'])) {
    $mail = new PHPMailer(true);

    try {
        // Server settings
        $mail->isSMTP();                                    
        $mail->Host       = 'smtp.gmail.com';                
        $mail->SMTPAuth   = true;                             
        $mail->Username   = 'bishnoikaruna5@gmail.com';          
        $mail->Password   = 'elvwejjeyygawjqf';            
        $mail->SMTPSecure = 'tls';                           
        $mail->Port       = 587;                             

        // Recipients
        $mail->setFrom($_POST['email'], 'CMS Contact Form');
        $mail->addAddress('bishnoikaruna5@gmail.com');        // Where to receive

        // Content
        $mail->isHTML(false);                                
        $mail->Subject = $_POST['subject'];
        $mail->Body    = $_POST['body'];

        $mail->send();
        $msg = "<span class='text-success'>Mail has been sent successfully.</span>";
    } catch (Exception $e) {
        $msg = "<span class='text-danger'>Sending failed. Error: {$mail->ErrorInfo}</span>";
    }
}
?>

<!-- Page Content -->
<div class="container">
    <section id="login">
        <div class="row justify-content-center align-items-center">
            <div class="col-sm-5 border border-dark mt-4 px-5 py-3">
                <div class="form-wrap">
                    <h3 class="text-center"><i class="fas fa-envelope fa-3x"></i></h3>
                    <form role="form" action="contact.php" method="post" id="login-form" autocomplete="off">
                        <h6 class="text-center mb-3"><?php echo $msg; ?></h6>
                        <div class="form-group">
                            <label for="email" class="sr-only">Email</label>
                            <input type="email" name="email" id="email" class="form-control" placeholder="Enter Your Email" required>
                        </div>
                        <div class="form-group">
                            <label for="subject" class="sr-only">Subject</label>
                            <input type="text" name="subject" id="subject" class="form-control" placeholder="Enter Subject" required>
                        </div>
                        <div class="form-group">
                            <textarea class="form-control" name="body" id="body" cols="50" rows="6" placeholder="Type Your Message..." required></textarea>
                        </div>
                        <input type="submit" name="submit" id="btn-login" class="btn btn-secondary btn-lg btn-block mb-3" value="Submit">
                    </form>
                </div>
            </div>
        </div>
    </section>
    <hr>
    <?php include "includes/footer.php"; ?>
</div>
