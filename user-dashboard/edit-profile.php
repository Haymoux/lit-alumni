<?php

    include ('../includes/db-conn.php');
    session_start();


    if (isset($_SESSION['logged_in'])){
       
    }
    else{
        header ("location: ../pages/signin.php");
        exit;
    }
    
?>




<html>
    <head>
        <title>User Profile</title>
        <link rel="icon" href="https://peteramos.42web.io/img/gallery/PP.png">
        <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="../styles/bootstrap.min.css">
        <link rel="stylesheet" href="../styles/footer.css">
        <link rel="stylesheet" href="edit-profile.css">
    </head>
    <?php
        include ('../includes/header.php');
    ?>
    <body>



<div class="container">
    <br>
    <br>

    <div class="row">
        <div class="col-md-6">
        <h2>Edit your profile.</h2>
        </div>


        <div class="col-md-6">

                                    <?php
                            //This is for password change
                                if (isset($_POST['pas_submit'])){
                                    $password = $_POST['passwo_new'];
                                    $c_password = $_POST['passwo_new2'];
                                    $id = $_SESSION['user_id'];


                                    if ( empty($password) || empty($c_password) ){
                                        
                                        echo '<div class"danger">Please fill in all required fields</div>';
                                        exit();
                                    }

                                    else if ($password !== $c_password){    
                                        echo ' <div class="alert alert-danger alert-dismissible fade show" role="alert"">
                                                <strong>Invalid!</strong> Passwords do not match. Try again.
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
                                        SET password='$password' WHERE id= '$id' "
                                        );
                                                echo ' <div class="alert alert-success alert-dismissible fade show" role="alert"">
                                                <strong>Success!</strong> Password Changed Successfully.
                                                <button type="button" class="btn-close"
                                                data-bs-dismiss="alert"
                                                aria-label="Close"></button>
                                            </div> ';
                                        }

                                }

                            ?>

<!-- BOTH PROCESSORS ARE HERE -->



                                                <?php
                                                //Profile Update Profile
                                                    if (isset($_POST['submit-edit'])){
                                                        $full_name = $_POST['dname'];
                                                        $p_num = $_POST['user-ph-num'];
                                                        $dept = $_POST['user-dept'];
                                                        $sch_set_n = $_POST['user-set'];
                                                        $addrs = $_POST['new-address'];

                                                        $id = $_SESSION['user_id'];   //makes it easier to quickly access the database


                                                        if ( empty($full_name) || empty($p_num)  || empty($dept)  || empty($sch_set_n)  || empty($addrs)  ){
                                                            
                                                                        echo ' <div class="alert alert-danger alert-dismissible fade show" role="alert"">
                                                                        <strong>Invalid!</strong> Please fill in all required fields.
                                                                        <button type="button" class="btn-close"
                                                                        data-bs-dismiss="alert"
                                                                        aria-label="Close"></button>
                                                                        </div> ';
                                                        }



                                                        else if ( strlen($full_name)>60 || strlen($p_num)>14  || strlen($dept)>44  || strlen($sch_set_n)>10  || strlen($addrs)>490  ){
                                                            
                                                            echo ' <div class="alert alert-danger alert-dismissible fade show" role="alert"">
                                                            <strong>Invalid!</strong> Do not exceed input Limit.
                                                            <button type="button" class="btn-close"
                                                            data-bs-dismiss="alert"
                                                            aria-label="Close"></button>
                                                            </div> ';
                                                }



                                                        else{
                                                            $usethis = mysqli_query($conn, "UPDATE members
                                                            SET name='$full_name', phone_number='$p_num', department='$dept',
                                                                sch_set='$sch_set_n',
                                                                address='$addrs' WHERE id= '$id' "
                                                            );


                                                            $_SESSION['name'] = $full_name;
                                                            $_SESSION['number'] = $p_num;
                                                            $_SESSION['department'] = $dept;
                                                            $_SESSION['sch_set'] = $sch_set_n;
                                                            $_SESSION['address'] = $addrs;



                                                            
                                                            echo ' <div class="alert alert-success alert-dismissible fade show" role="alert"">
                                                            <strong>Success!</strong> Profile Details Updated Sucessfully.
                                                            <button type="button" class="btn-close"
                                                            data-bs-dismiss="alert"
                                                            aria-label="Close"></button>
                                                            </div> ';
                                                            
                                                            }
                                                            



                                                    }

                                                ?>




        <div class="accordion" id="accordionExample">

  <div class="accordion-item">
    <h2 class="accordion-header" id="headingTwo">
      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
        <span style="color:red;">Change Password Instead?</span>
      </button>
    </h2>
    <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
      <div class="accordion-body">


                    <form class="signin-form" method="POST" autocomplete="off">
                     
                        <div class="form-group">
                        <input  type="password" class="form-control" placeholder="New Password" minlength="8" maxlength="25" name="passwo_new" required autocomplete="off">
                       
                    
                        </div>
                        <br />

                        <div class="form-group">
                        <input  type="password" class="form-control" placeholder="Confirm New Password" minlength="8" maxlength="25" name="passwo_new2" required autocomplete="off">
                      
                        </div>
                        <br />

                        <div class="form-group">
                        <button type="submit" name="pas_submit" class="form-control btn btn-primary rounded submit px-3">Update Password</button>
                        </div>
                   </form>
<div id="test">
</div>
        
     </div>
    </div>
  </div>
  
        </div>
    </div>





           <form method="POST">                                         
        <div class="row" id="main">
        <div class="col-md-12">
            <form role="form">
                <hr class="col-md-6 col-lg-4">

                <div class="form-group">
                    <label>Full Name</label>
                    <input maxlength="59" type="text" name="dname" class="form-control input-lg" value="<?php echo $_SESSION['name'];  ?>" required>
                </div>
                <br />


                <div class="row">
                    <div class="col-xs-12 col-sm-6 col-md-6">
                        <div class="form-group">
                        <label>Phone Number</label>
                            <input type="text" name="user-ph-num" value="<?php echo $_SESSION['number'];  ?>" class="form-control input-lg" maxlength="13" required>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-6 col-md-6">
                        <div class="form-group">
                            <label>Email</label>
                            <input value="<?php echo $_SESSION['user_email'];  ?>" class="form-control input-lg" readonly required>
                        </div>
                    </div>
                    </div>
                    <br />
                    <div class="row">
                    <div class="col-xs-12 col-sm-6 col-md-6">
                        <div class="form-group">
                        <label>Department</label>
                            <input type="text" name="user-dept" value="<?php echo $_SESSION['department'];  ?>" class="form-control input-lg" maxlength="44" required>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-6 col-md-6">
                        <div class="form-group">
                            <label>Set</label>
                            <!-- Meaning... from, to? -->
                            <input type="text" name="user-set" value="<?php echo $_SESSION['sch_set'];  ?>" class="form-control input-lg" maxlength="10" required>
                        </div>
                    </div>
                    
                    <div class="form-group">
                    <br /> 
                    <label>Address</label>
                    <textarea type="text" name="new-address" class="form-control input-lg" maxlength="488"><?php echo $_SESSION['address'];  ?></textarea>
                </div>


                </div>
                 <br>

                    <center>
                    <button type="submit" name="submit-edit" class="btn btn-success btn-block btn-lg" style="width:30%; min-width:200px;">Save Info Update</button>
                     </center>

            </form>

         </div>       
    </div>



  



<script src="../styles/bootstrap.min.js"></script>
</body>

<?php
        include ('../includes/footer.php');
    ?>

</html>
