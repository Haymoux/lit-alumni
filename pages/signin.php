<?php
//THE VERIFICATION CODE STARTS AT LINE 47
session_start();
include ('../includes/db-conn.php');

if ( isset($_SESSION ['logged_in'])){
	header ("location: ../user-dashboard/index.php");
	exit;
		}
?>


<!doctype html>
<html lang="en">
<head>
<title>Sign In</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">
<link rel="icon" href="https://peteramos.42web.io/img/gallery/PP.png">
<link rel="stylesheet" href="../styles/bootstrap.min.css">
<link rel="stylesheet" href="../styles/signin.css">
<body>
    <!-- from https://colorlib.com/wp/template/login-form-15/-->
<section class="ftco-section" style="margin-top: -80px;">
<div class="container">
<div class="row justify-content-center">
<div class="col-md-6 text-center mb-5">
<h2 class="heading-section">Welcome to Lakeside Institute of Technology Alumni Website</h2> 
</div>
</div>
<div class="row justify-content-center">
<div class="col-md-7 col-lg-5">
<div class="wrap">
<div class="img" style="background-image:url(https://source.unsplash.com/random/300x200)"></div>
<div class="login-wrap p-4 p-md-5">
<div class="d-flex">
<div class="w-100">




<!-- THIS IS THE VERIFICATION -->
<!-- THIS IS THE VERIFICATION -->
<!-- THIS IS THE VERIFICATION -->


<?php

    if (isset($_POST['submit'])){
        $e_mail = $_POST['email-inp'];
        $p_assword = $_POST['passwd-inp'];

            //This is for the the normal email address and password check
            $email_check = mysqli_query($conn, "SELECT * FROM members WHERE email = '$e_mail' and password = '$p_assword'");
                        //This line fetches the result from mysql as an array
            $email_check_array = mysqli_fetch_array($email_check);


            //This is for the email address and unchanged password check
            $unverified_user_check = mysqli_query($conn, "SELECT * FROM members WHERE email = '$e_mail' and fixed_password = '$p_assword'");
                        //This line fetches the result from mysql as an array
            $unverified_user_check_array = mysqli_fetch_array($unverified_user_check);
            
                            
                         

            //This may be useful for email or phone number login 
           // $username_check = mysqli_query($conn, "SELECT * FROM user WHERE username = '$e_mail' and password = '$p_assword'");
                        //This line fetches the result from mysqli as an array
           // $username_check_array = mysqli_fetch_array($username_check);



        if (empty($e_mail) || empty($p_assword) ){
            echo ' <div class="alert alert-danger alert-dismissible fade show" role="alert"">
                                                            <strong>Invalid!</strong> Kindly fill in your login details.
                                                            <button type="button" class="btn-close"
                                                            data-bs-dismiss="alert"
                                                            aria-label="Close"></button>
                                                            </div> ';
        }

        else if (is_array($email_check_array)){
        //set session variables
            $_SESSION['logged_in'] = true; 
            $_SESSION['name'] = $email_check_array['name']; 
            $_SESSION['address'] = $email_check_array['address'];
            $_SESSION['user_email'] = $email_check_array['email'];
            $_SESSION['user_id'] = $email_check_array['id'];
            $_SESSION['number'] = $email_check_array['phone_number'];
            $_SESSION['department'] = $email_check_array['department'];
            $_SESSION['sch_set'] = $email_check_array['sch_set'];
            
            header ('location: ../user-dashboard/index.php' );
        }


        else if (is_array($unverified_user_check_array)){

                //This Code generates random 5 digit number
                $random_number = (rand(10000,99999));

                //This code sends mail to the user's email address
                $toEmail = $e_mail;       //The email address entered by the user
                $uname = 'Verify your email address';    //Email Subjesct
                $mailHeaders = "Kindly enter the code below in LIT Alumni Website Verification Page."  .
                "\r\n OTP: ". $random_number ;

                if(mail($toEmail, $uname, $mailHeaders)) {
                    $message = "Done";   //Useless piece of code
                }

            //set session variables, I am supposed to put this where $message is, but I like it this way...
                $_SESSION['ve-status'] = 'true';          //This is for securing the verification page
                $_SESSION['name'] = $unverified_user_check_array['name'];
                $_SESSION['address'] = $unverified_user_check_array['address']; 
                $_SESSION['user_email'] = $unverified_user_check_array['email'];    //thissss, all way na way..
                $_SESSION['user_id'] = $unverified_user_check_array['id'];
                $_SESSION['number'] = $unverified_user_check_array['phone_number'];
                $_SESSION['department'] = $unverified_user_check_array['department'];
                $_SESSION['sch_set'] = $unverified_user_check_array['sch_set'];
                $_SESSION['expected_code'] = $random_number;        //Expected OTP Code to be used in "verify" page
                
                header ('location: verify.php' );
            }


        
           //This may be useful for email OR phone number login 
       /*  else if (is_array($username_check_array)){
                   //set session variables
                   $_SESSION['logged_in'] = true; 
                   $_SESSION['first_name'] = $email_check_array['first_name']; 
                   $_SESSION['last_name'] = $email_check_array['last_name'];
                   $_SESSION['user_name'] = $email_check_array['username'];
                   $_SESSION['user_email'] = $email_check_array['email'];
                   $_SESSION['user_id'] = $email_check_array['id'];
                           //I will not advise you to do this please... this code is here because I just feel like and it is not  a real project, you dig?
                   $_SESSION['user_password'] = $email_check_array['password'];
       
                   header ('location: dashboard.php' );
        } */

        else{
            echo ' <div class="alert alert-danger alert-dismissible fade show" role="alert"">
                                                            <strong>Invalid!</strong> Incorrect email or password.
                                                            <button type="button" class="btn-close"
                                                            data-bs-dismiss="alert"
                                                            aria-label="Close"></button>
                                                            </div> ';
        }

       

        
    }
?>



<!-- THIS IS THE END OF VERIFICATION -->
<!-- THIS IS THE END OF VERIFICATION -->
<!-- THIS IS THE END OFVERIFICATION -->











<h3 class="mb-4">Sign In to continue</h3>
</div>
<!--
<div class="w-100">
<p class="social-media d-flex justify-content-end">
<a href="#" class="social-icon d-flex align-items-center justify-content-center"><span class="fa fa-facebook"></span></a>
<a href="#" class="social-icon d-flex align-items-center justify-content-center"><span class="fa fa-twitter"></span></a>
</p>
</div>
-->
</div>

<form action="" class="signin-form" method="POST">
<div class="form-group mt-3">
<input type="email" class="form-control" required placeholder="Email" name="email-inp" maxlength="55">
<label class="form-control-placeholder"></label>
</div>
<div class="form-group">
<input type="password" class="form-control" placeholder="Password" required minlength="8" maxlength="15" name="passwd-inp">
<label class="form-control-placeholder" for="password"></label>
<span toggle="#password-field" class="fa fa-fw fa-eye field-icon toggle-password"></span>
</div>
<div class="form-group">
<button type="submit" name="submit" class="form-control btn btn-primary rounded submit px-3">Sign In</button>
</div>
<!--
<div class="form-group d-md-flex">
<div class="w-50 text-left">
<label class="checkbox-wrap checkbox-primary mb-0">Remember Me
<input type="checkbox" checked>
<span class="checkmark"></span>
</label>
</div>
-->
<div class="w-50 text-md-right" style="float:right;">
<a href="forgot-password/">Forgot Password</a>
</div>
<!--
</div>

</form>
<p class="text-center">Not a member? <a data-toggle="tab" href="#signup">Sign Up</a></p>

-->
</div>
</div>
</div>
</div>
</div>
</section>
<script type="text/javascript">

</script>
<script src="../styles/bootstrap.min.js"></script>
</body>
</html>
