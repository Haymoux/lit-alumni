<?php
    //THE VERIFICATION CODE STARTS AT LINE 46
    include ('../../includes/db-conn.php');
   session_start();

 //    if (isset($_SESSION['change-passw-lvl'])){
       
 //   }
 //   else{
 //      header ("location: ../signin.php");
 //       exit;
 //   }
 
?>

<!doctype html>
<html lang="en">
<head>
<title>Change Password</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="../../styles/bootstrap.min.css">
<link rel="stylesheet" href="../../styles/change-pass.css">
<body>

<section class="ftco-section">
<div class="container">
<div class="row justify-content-center">
<div class="col-md-6 text-center mb-5">
<h2 class="heading-section">Welcome Back</h2>
</div>
</div>
<div class="row justify-content-center">
<div class="col-md-7 col-lg-5">
<div class="wrap">
<!--<div class="img" style="background-image:url(https://source.unsplash.com/random/300x200)"></div>-->
<div class="login-wrap p-4 p-md-5">
<div class="d-flex">
<div class="w-100">
<h3 class="mb-4">Choose New Password</h3>



<!-- THIS IS THE VERIFICATION -->
<!-- THIS IS THE VERIFICATION -->
<!-- THIS IS THE VERIFICATION -->

<?php

    if (isset($_POST['submit'])){
        $password = $_POST['passwo1'];
        $c_password = $_POST['passwo2'];
        $changed_placeholder = "verified";
        $id = $_SESSION['u_email'];      //Using email in place of id


        if ( empty($password) || empty($c_password)  || $c_password === ""  || $password === "" ){
            header('location: change-pass.php?error=empty-fields');
            echo ' <div class="alert alert-danger alert-dismissible fade show" role="alert"">
                                                            <strong>Invalid!</strong> Please, fill in the passwords.
                                                            <button type="button" class="btn-close"
                                                            data-bs-dismiss="alert"
                                                            aria-label="Close"></button>
                                                            </div> ';
        }

        else if ($password !== $c_password){    
            echo ' <div class="alert alert-danger alert-dismissible fade show" role="alert"">
                                                            <strong>Invalid!</strong> Passwords do not match.
                                                            <button type="button" class="btn-close"
                                                            data-bs-dismiss="alert"
                                                            aria-label="Close"></button>
                                                            </div> ';
        }

        else if ($c_password == 'default1'){    
            echo ' <div class="alert alert-danger alert-dismissible fade show" role="alert"">
                                                            <strong>Invalid!</strong> Use a secure password.
                                                            <button type="button" class="btn-close"
                                                            data-bs-dismiss="alert"
                                                            aria-label="Close"></button>
                                                            </div> ';
        }


        else{
            $dropp = mysqli_query($conn, "UPDATE members
            SET password='$password' WHERE email= '$id' "
            );
            unset($_SESSION['change-passw-lvl']); //unset the all the verification status for security reasons
            unset($_SESSION['exp_code']);
            unset($_SESSION['u_email']);
            header("location: ../loading.html");
            exit();
            }



    }

?>

<!-- THIS IS THE END OF VERIFICATION -->
<!-- THIS IS THE END OF VERIFICATION -->
<!-- THIS IS THE END OFVERIFICATION -->



</div>

</div>
<form class="signin-form" method="POST" autocomplete="off">
<div class="form-group mt-3">
<input type="text" class="form-control" placeholder="New Password"required minlength="8" maxlength="25" name="passwo1">
<label class="form-control-placeholder"></label>
</div>

<div class="form-group">
<input  type="password" class="form-control" placeholder="Confirm Password" minlength="8" maxlength="25" name="passwo2" required autocomplete="off">
<label class="form-control-placeholder"></label>
<span toggle="#password-field"></span>
</div>

<div class="form-group">
<button type="submit" name="submit" class="form-control btn btn-primary rounded submit px-3">Proceed</button>
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
