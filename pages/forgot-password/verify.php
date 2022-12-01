<?php
//THE VERIFICATION CODE STARTS AT LINE 47
session_start();

if (isset($_SESSION['v-status'])){
       
}
else{
    header ("location: ../signin.php");
    exit;
} 


?>




<!doctype html>
<html lang="en">
<head>
<title>Verify</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">
<link rel="stylesheet" href="../../styles/bootstrap.min.css">
<link rel="icon" href="https://peteramos.42web.io/img/gallery/PP.png">
<link rel="stylesheet" href="../../styles/verify.css">
<body>

<section class="ftco-section">
<div class="container">
<div class="row justify-content-center">
<div class="col-md-6 text-center mb-5">
<h2 class="heading-section">Enter The Code sent to your email</h2>
<p><?php echo ($_SESSION['u_email']); ?></p>
</div>
</div>
<div class="row justify-content-center">
<div class="col-md-7 col-lg-5">
<div class="wrap">
<!--<div class="img" style="background-image:url(https://source.unsplash.com/random/300x200)"></div>-->
<div class="login-wrap p-4 p-md-5">
<div class="d-flex">
<div class="w-100">
<!--<h3 class="mb-4">Sign In</h3>-->


<!-- THIS IS THE VERIFICATION -->
<!-- THIS IS THE VERIFICATION -->
<!-- THIS IS THE VERIFICATION -->

<?php
    if (isset($_POST['submit'])){
        $code = $_POST['otp_entered'];
        $expected = $_SESSION['exp_code'];

        if ($code != $expected) {
            echo ' <div class="alert alert-danger alert-dismissible fade show" role="alert"">
            <strong>Invalid!</strong> Incorrect OTP Code.
            <button type="button" class="btn-close"
            data-bs-dismiss="alert"
            aria-label="Close"></button>
            </div> ';
            
        }
        else{
            unset($_SESSION['v-status']); //unset the verify status for security reasons
            $_SESSION['change-passw-lvl'] = 'true';  //set a new session to protect the next page
            header("Location: change-passw.php");
        }



    }

    else if (isset($_POST['req_new'])){

                        //This Code generates random 5 digit number
                        $random_number = (rand(10000,99999));

                        //This code sends mail to the user's email address
                        $toEmail = $e_mail;       //The email address entered by the user
                        $uname = 'Verify your email address';    //Email Subjesct
                        $mailHeaders = "Kindly enter the code below in LIT Alumni Website Forgot Password Page."  .
                        "\r\n OTP: ". $random_number ;

                        if(mail($toEmail, $uname, $mailHeaders)) {
                            $message = "Done";   //Useless piece of code
                            $_SESSION['exp_code'] = $random_number;  //Updates the expected code session
                            header("Location: verify.php");  //Not tested yet, just here..in case
                        }

    }

    ?>


<!-- THIS IS THE END OF VERIFICATION -->
<!-- THIS IS THE END OF VERIFICATION -->
<!-- THIS IS THE END OFVERIFICATION -->



</div>

</div>
<form class="signin-form" method="POST">
<div class="form-group mt-3">
<input type="text" class="form-control" name="otp_entered" placeholder="Enter 5 digit Code"required oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" minlength="5" maxlength="5">
<label class="form-control-placeholder"></label>
</div>

<div class="form-group">
<button type="submit" class="form-control btn btn-primary rounded submit px-3" name="submit">Proceed</button>
</div>

<form method="POST">
    <button type="submit" name="req-new" 
    style="text-decoration:none; 
    background:none; border-style:none; color:orange; float:right;">Request New Code</button>
</form>

</div>
</div>
</div>
</div>
</div>
</section>
<script src="../../styles/bootstrap.min.js"></script>
</body>
</html>