<?php

    include ('../../includes/db-conn.php');
    session_start();


    if (isset($_SESSION['adm_logged_in'])){
       
    }
    else{
        header ("location: ../index.php");
        exit;
    }
    
?>




<html>
    <head>
        <title>User view</title>
        <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="../../styles/bootstrap.min.css">
        <link rel="icon" href="https://peteramos.42web.io/img/gallery/PP.png">
        <link rel="stylesheet" href="../../styles/footer.css">
    </head>
    <?php
        include ('../includes/admin_header.php');
    ?>
    <body>






    
<div class="container">
    <br>
    <br>

    <div class="row">
        <div class="col-md-6">
        <h2>Edit user's profile.</h2>
        </div>


        <div class="col-md-6">

                                    <?php
                                    $idd =  $_GET['id'];

                                    $nquery = mysqli_query($conn, "SELECT * FROM members WHERE id = '$idd' ");

                                    $nquery_array = mysqli_fetch_array($nquery);
                                    






























                            //This is for password reset
                                if (isset($_POST['pas_submit'])){
                               
                                    
                                        $dropp = mysqli_query($conn, "UPDATE members
                                        SET fixed_password='default1' WHERE id= '$idd' "
                                        );
                                                echo ' <div class="alert alert-success alert-dismissible fade show" role="alert"">
                                                <strong>Success!</strong> Password Reset Successful.
                                                <button type="button" class="btn-close"
                                                data-bs-dismiss="alert"
                                                aria-label="Close"></button>
                                            </div> ';
                                        

                                }

                            ?>

<!-- THREE PROCESSORS ARE HERE -->



                                                <?php
                                                //Profile Update Profile
                                                    if (isset($_POST['submit-edit'])){
                                                        $full_name = $_POST['dname'];
                                                        $p_num = $_POST['user-ph-num'];
                                                        $ddmail = $_POST['dmail'];
                                                        $dept = $_POST['user-dept'];
                                                        $sch_set_n = $_POST['user-set'];
                                                        $addrs = $_POST['new-address'];

                                                        //To prevent Duplicate Email Addresses
                                                        $nquerymail = mysqli_query($conn, "SELECT * FROM members WHERE email = '$ddmail' ");
                                                        $nquerymail_row = mysqli_num_rows ($nquerymail);
                                                        
                                                        


                                                        if ( empty($full_name) || empty($p_num)  || empty($ddmail)  || empty($dept)  || empty($sch_set_n)  || empty($addrs)  ){
                                                            
                                                                        echo ' <div class="alert alert-danger alert-dismissible fade show" role="alert"">
                                                                        <strong>Invalid!</strong> Please fill in all required fields.
                                                                        <button type="button" class="btn-close"
                                                                        data-bs-dismiss="alert"
                                                                        aria-label="Close"></button>
                                                                        </div> ';
                                                        }



                                                        else if ( strlen($full_name)>60 || strlen($p_num)>14  || strlen($ddmail)>54  || strlen($dept)>44  || strlen($sch_set_n)>10  || strlen($addrs)>490  ){
                                                            
                                                            echo ' <div class="alert alert-danger alert-dismissible fade show" role="alert"">
                                                            <strong>Invalid!</strong> Do not exceed input Limit.
                                                            <button type="button" class="btn-close"
                                                            data-bs-dismiss="alert"
                                                            aria-label="Close"></button>
                                                            </div> ';
                                                }


                                                        else if ( $nquerymail_row >1  ){
                                                                    
                                                            echo ' <div class="alert alert-danger alert-dismissible fade show" role="alert"">
                                                            <strong>Invalid!</strong> A user with this email address already exists.
                                                            <button type="button" class="btn-close"
                                                            data-bs-dismiss="alert"
                                                            aria-label="Close"></button>
                                                            </div> ';
                                                }



                                                        else{
                                                            $usethis = mysqli_query($conn, "UPDATE members
                                                            SET name='$full_name', phone_number='$p_num', email='$ddmail', department='$dept',
                                                                sch_set='$sch_set_n',
                                                                address='$addrs' WHERE id= '$idd' "
                                                            );



                                                            
                                                            echo ' <div class="alert alert-success alert-dismissible fade show" role="alert"">
                                                            <strong>Success!</strong> Profile Details Updated Sucessfully.
                                                            <button type="button" class="btn-close"
                                                            data-bs-dismiss="alert"
                                                            aria-label="Close"></button>
                                                            </div> ';
                                                            
                                                            }
                                                            



                                                    }

                                                ?>

<?php
//DELETE USER CODE
    if (isset($_POST['del_submit'])){
        /* $did = $_POST['did_name']; */
                               
                                    
        $drom = mysqli_query($conn, "DELETE FROM `members` WHERE id = '$idd' "
        );
                echo ' <div class="alert alert-success alert-dismissible fade show" role="alert"">
                <strong>Success!</strong> User' .$idd .' deleted successfully.
                <button type="button" class="btn-close"
                data-bs-dismiss="alert"
                aria-label="Close"></button>
                <a href="view-alumnis.php ">
                <button type="button" class="btn-primary"
                >Go Back</button></a>
            </div> ';
        
           
    }

 ?>


                                            <button class="btn btn-danger" style="float:right;"  data-toggle="modal" data-target="#exampleModal">Reset User's Password</button>
                                            <button class="btn btn-danger" style="float:right; margin-right:2em;"  data-toggle="modal" data-target="#deleteModal">Delete User</button>

                                            
                                            <form method="post">
                                            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Confirm Reset Password</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    Are you sure you want to reset this User's password?
                                                    <p><small>Click on <b>Reset Now</b> to reset.</small></p>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                    <button type="submit" class="btn btn-primary" name="pas_submit">Reset Now</button>
                                                </div>
                                                </div>
                                            </div>
                                            </form>





                                            </div>



                                            

    </div>





           <form method="POST">                                         
        <div class="row" id="main">
        <div class="col-md-12">
            <form role="form">
                <hr class="col-md-6 col-lg-4">

                <div class="form-group">
                    <label>Full Name</label>
                    <input maxlength="59" type="text" name="dname" class="form-control input-lg" value="<?php echo $nquery_array['name'];  ?>" required>
                </div>
                <br />


                <div class="row">
                    <div class="col-xs-12 col-sm-6 col-md-6">
                        <div class="form-group">
                        <label>Phone Number</label>
                            <input type="text" name="user-ph-num" value="<?php echo $nquery_array['phone_number'];  ?>" class="form-control input-lg" maxlength="13" required>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-6 col-md-6">
                        <div class="form-group">
                            <label>Email</label>
                            <input value="<?php echo $nquery_array['email'];  ?>" class="form-control input-lg" required type="email" maxlength="55" name="dmail">
                        </div>
                    </div>
                    </div>
                    <br />
                    <div class="row">
                    <div class="col-xs-12 col-sm-6 col-md-6">
                        <div class="form-group">
                        <label>Department</label>
                            <input type="text" name="user-dept" value="<?php echo $nquery_array['department'];  ?>" class="form-control input-lg" maxlength="44" required>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-6 col-md-6">
                        <div class="form-group">
                            <label>Set</label>
                            <!-- Meaning... from, to? -->
                            <input type="text" name="user-set" value="<?php echo $nquery_array['sch_set'];  ?>" class="form-control input-lg" maxlength="10" required>
                        </div>
                    </div>
                    
                    <div class="form-group">
                    <br /> 
                    <label>Address</label>
                    <textarea type="text" name="new-address" class="form-control input-lg" maxlength="488"><?php echo $nquery_array['address'];  ?></textarea>
                </div>


                </div>
                 <br>

                    <center>
                    <button type="submit" name="submit-edit" class="btn btn-success btn-block btn-lg" style="width:30%; min-width:200px;">Save Info Update</button>
                     </center>

            </form>
            

            <form method="post">
<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
<div class="modal-dialog" role="document">
    <div class="modal-content">
    <div class="modal-header">
        <h5 class="modal-title" id="deleteModalLabel">Confirm Alumni Delete</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <div class="modal-body">
        Are you sure you want to delete this User?
        <p><small>Click on <b>Delete Now</b> to delete.</small></p>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <!-- <input type="hidden" name="did_name" value="<?//php echo $id; ?>" /> -->
        <button type="submit" class="btn btn-primary" name="del_submit">Delete Now</button>
    </div>
    </div>
</div>
</form>
         </div>       
    </div>


    <?php
        /*  include ('../includes/admin_footer.php'); */
    ?>
    
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

    <script src="../../styles/bootstrap.min.js"></script>
</body>
</html>
