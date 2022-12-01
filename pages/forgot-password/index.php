<?php
//THE VERIFICATION CODE STARTS AT LINE 47
session_start();
include ('../../includes/db-conn.php');


?>


<!doctype html>
<html lang="en">
<head>
<title>Forgot Password</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">
<link rel="stylesheet" href="../../styles/bootstrap.min.css">
<link rel="stylesheet" href="../../styles/verify.css">
<link rel="icon" href="https://peteramos.42web.io/img/gallery/PP.png">
<body>

<section class="ftco-section">
<div class="container">
<div class="row justify-content-center">
<div class="col-md-6 text-center mb-5">
<h2 class="heading-section">Enter your email address</h2>

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


<!-- THIS IS THE EMAIL VERIFICATION -->
<!-- THIS IS THE EMAIL VERIFICATION -->
<!-- THIS IS THE EMAIL VERIFICATION -->

<?php
   if (isset($_POST['submit'])){
    $dmail = $_POST['email'];


    $sql =  mysqli_query($conn, "SELECT email FROM members where email = '$dmail' ");
    $row_num = mysqli_num_rows($sql);

          if ($row_num  < 1){
            echo ' <div class="alert alert-danger alert-dismissible fade show" role="alert"">
            <strong>Invalid!</strong> This account is not registered.
            <button type="button" class="btn-close"
            data-bs-dismiss="alert"
            aria-label="Close"></button>
            </div> ';

          }
          else if ($dmail==="" || strlen($dmail)>54  ){
            echo ' <div class="alert alert-danger alert-dismissible fade show" role="alert"">
            <strong>Invalid!</strong> Invalid Input.
            <button type="button" class="btn-close"
            data-bs-dismiss="alert"
            aria-label="Close"></button>
            </div> ';
            
          }
          else{
            $random_number = (rand(10000,99999));

            //This code sends mail to the user's email address
            $toEmail = $e_mail;       //The email address entered by the user
            $uname = 'Verify your email address';    //Email Subjesct
            $mailHeaders = "Kindly enter the code below in LIT Alumni Website Forgot Password Page."  .
            "\r\n OTP: ". $random_number ;

            if(mail($toEmail, $uname, $mailHeaders)) {
                $message = "Done";   //Useless piece of code
            }

        //set session variables, I am supposed to put this where $message is, but I like it this way...
            $_SESSION['v-status'] = 'true';          //This is for securing the verification page       
            $_SESSION['u_email'] = $dmail;    
            $_SESSION['exp_code'] = $random_number;        //Expected OTP Code to be used in "verify" page
            header ('location: verify.php' );
          }


        
        }

    ?>


<!-- THIS IS THE END OF EMAIL VERIFICATION -->
<!-- THIS IS THE END OF EMAIL VERIFICATION -->
<!-- THIS IS THE END OF EMAIL VERIFICATION -->



</div>

</div>
<form class="signin-form" method="POST">
<div class="form-group mt-3">
<input type="email" class="form-control" name="email" placeholder="Enter registered email"required  minlength="4" maxlength="54">
<label class="form-control-placeholder"></label>
</div>

<div class="form-group">
<button type="submit" class="form-control btn btn-primary rounded submit px-3" name="submit">Proceed</button>
</div>


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
