<?php
//THE VERIFICATION CODE STARTS AT LINE 45
	include ('../includes/db-conn.php');
	session_start();

	if ( isset($_SESSION ['adm_logged_in'])){
		header ("location: dashboard.php");
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
<link rel="stylesheet" href="../styles/bootstrap.min.css">
<link rel="icon" href="https://peteramos.42web.io/img/gallery/PP.png">
<link rel="stylesheet" href="../styles/signin.css">
<link rel="stylesheet" href="../styles/footer.css">
<body>
    <!-- from https://colorlib.com/wp/template/login-form-15/-->
<section class="ftco-section" style="margin-top: -80px;">
<div class="container">
<div class="row justify-content-center">
<div class="col-md-6 text-center mb-5">
<h2 class="heading-section">Welcome to LIT Alumni Admin Dashboard</h2> 
</div>
</div>
<div class="row justify-content-center">
<div class="col-md-7 col-lg-5">
<div class="wrap">
<div class="img" style="background-image:url(https://source.unsplash.com/random/300x200)"></div>
<div class="login-wrap p-4 p-md-5">
<div class="d-flex">
<div class="w-100">
<h3 class="mb-4">Sign In as admin to continue</h3>





<!-- THIS IS THE VERIFICATION -->
<!-- THIS IS THE VERIFICATION -->
<!-- THIS IS THE VERIFICATION -->


<?php

    if (isset($_POST['submit'])){
        $e_mail = $_POST['email-inp'];
        $p_assword = $_POST['passwd-inp'];

            //This is for the the normal email address and password check
            $email_check = mysqli_query($conn, "SELECT * FROM admins WHERE email = '$e_mail' and password = '$p_assword'");
                        //This line fetches the result from mysql as an array
            $email_check_array = mysqli_fetch_array($email_check);


                   
                         

            //This may be useful for email or phone number login 
           // $username_check = mysqli_query($conn, "SELECT * FROM user WHERE username = '$e_mail' and password = '$p_assword'");
                        //This line fetches the result from mysqli as an array
           // $username_check_array = mysqli_fetch_array($username_check);



        if (empty($e_mail) || empty($p_assword) ){
            echo ' <div class="alert alert-danger alert-dismissible fade show" role="alert"">
                                                            <strong>Invalid!</strong> Please fill in all required fields.
                                                            <button type="button" class="btn-close"
                                                            data-bs-dismiss="alert"
                                                            aria-label="Close"></button>
                                                            </div> ';
        }

        else if (is_array($email_check_array)){
        //set session variables
            $_SESSION['adm_logged_in'] = true; 
            $_SESSION['adm_first_name'] = $email_check_array['first_name']; 
            $_SESSION['adm_last_name'] = $email_check_array['last_name'];
            $_SESSION['adm_user_email'] = $email_check_array['email'];
            $_SESSION['adm_user_id'] = $email_check_array['id'];
            $_SESSION['adm_user_role'] = $email_check_array['role'];
            
            header ('location: dashboard.php' );
        }


       


        
           //This may be useful for email or phone number login 
       /*  else if (is_array($username_check_array)){
                   //set session variables
                   $_SESSION['logged_in'] = true; 
                   $_SESSION['first_name'] = $email_check_array['first_name']; 
                   $_SESSION['last_name'] = $email_check_array['last_name'];
                   $_SESSION['user_name'] = $email_check_array['username'];
                   $_SESSION['user_email'] = $email_check_array['email'];
                   $_SESSION['user_id'] = $email_check_array['id'];
                   $_SESSION['adm_user_role'] = $email_check_array['role'];
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
<button type="submit" name="submit" class="form-control btn btn-primary rounded submit px-3">Enter Dasboard</button>
</div>
<!--
<div class="form-group d-md-flex">
<div class="w-50 text-left">
<label class="checkbox-wrap checkbox-primary mb-0">Remember Me
<input type="checkbox" checked>
<span class="checkmark"></span>
</label>
</div>
<div class="w-50 text-md-right">
<a href="#">Forgot Password</a>
</div>
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

<script src="../styles/bootstrap.min.js"></script>
</body>
</html>
