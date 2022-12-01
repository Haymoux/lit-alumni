<?php
// EDIT THIS FILE TO CHANGE DEFAULT FIXED PASSWORD

    include ('../../includes/db-conn.php');
    session_start();


    if (isset($_SESSION['adm_logged_in'])){
       
    }
    else{
        header ("location: ../index.php");
        exit;
    }

//This code helps to retain values after errors
    $full_name = '';
    $p_num = '';
    $new_email = '';
    $dept = '';
    $sch_set_n = '';
    $addrs = '';

    
?>





<html>
    <head>
        <title>Add New User</title>
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
        <h2>Add New Alumni.</h2>
        </div>


        <div class="col-md-6">

                                   

<!-- THE PROCESSOR IS HERE -->



                                                <?php
                                                //Profile Update Profile
                                                    if (isset($_POST['submit-edit'])){
                                                        $full_name = $_POST['new_dname'];
                                                        $p_num = $_POST['new_user-ph-num'];
                                                        $new_email = $_POST['new_user-email'];
                                                        $dept = $_POST['new_user-dept'];
                                                        $sch_set_n = $_POST['new_user-set'];
                                                        $addrs = $_POST['new_new-address'];

                                                        //Check if user exists already
                                                        $mailcheck = mysqli_query ($conn, "SELECT * FROM members WHERE email = '$new_email'; ");
                                                        $mailcheck_row = mysqli_num_rows($mailcheck);


                                                        if ( empty($full_name) || empty($p_num) || empty($new_email) || empty($dept)  || empty($sch_set_n)  || empty($addrs)  ){
                                                            
                                                                        echo ' <div class="alert alert-danger alert-dismissible fade show" role="alert"">
                                                                        <strong>Invalid!</strong> Please fill in all required fields.
                                                                        <button type="button" class="btn-close"
                                                                        data-bs-dismiss="alert"
                                                                        aria-label="Close"></button>
                                                                        </div> ';
                                                        }



                                                        else if ( strlen($full_name)>60 || strlen($p_num)>14  || strlen($new_email)>60  || strlen($dept)>44  || strlen($sch_set_n)>10  || strlen($addrs)>490  ){
                                                            
                                                            echo ' <div class="alert alert-danger alert-dismissible fade show" role="alert"">
                                                            <strong>Invalid!</strong> Do not exceed input Limit.
                                                            <button type="button" class="btn-close"
                                                            data-bs-dismiss="alert"
                                                            aria-label="Close"></button>
                                                            </div> ';



                                                         }

                                                else if ( $mailcheck_row > 0  ){
                                                            
                                                    echo ' <div class="alert alert-danger alert-dismissible fade show" role="alert"">
                                                    <strong>Invalid!</strong> User with email already exist.
                                                    <button type="button" class="btn-close"
                                                    data-bs-dismiss="alert"
                                                    aria-label="Close"></button>
                                                    </div> ';



                                                  }




                                                        else{

                                                            $sql_insertion = "INSERT INTO members (id, name, address, email, phone_number, department, sch_set, password,  fixed_password) VALUES ( '', '$full_name', '$addrs', '$new_email', '$p_num', '$dept', '$sch_set_n', 'nill', 'default1' )  ";

                                                            $usethis = mysqli_query( $conn, $sql_insertion );

                                                            


                                                            echo ' <div class="alert alert-success alert-dismissible fade show" role="alert"">
                                                            <strong>Success!</strong> New Alumni Added Sucessfully.
                                                            <button type="button" class="btn-close"
                                                            data-bs-dismiss="alert"
                                                            aria-label="Close"></button>
                                                            </div> ';

                                                            //Revert the inputs back to empty after success
                                                            $full_name = '';
                                                            $p_num = '';
                                                            $new_email = '';
                                                            $dept = '';
                                                            $sch_set_n = '';
                                                            $addrs = '';
                                                            
                                                            }
                                                            



                                                    }

                                                ?>



    </div>





           <form method="POST">                                         
        <div class="row" id="main">
        <div class="col-md-12">
            <form role="form">
                <hr class="col-md-6 col-lg-4">

                <div class="form-group">
                    <label>Full Name</label>
                    <input maxlength="59" type="text" name="new_dname" class="form-control input-lg" value="<?php echo $full_name;  ?>" >
                </div>
                <br />


                <div class="row">
                    <div class="col-xs-12 col-sm-6 col-md-6">
                        <div class="form-group">
                        <label>Phone Number</label>
                            <input type="text" name="new_user-ph-num" value="<?php echo $p_num;  ?>" class="form-control input-lg" maxlength="13">
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-6 col-md-6">
                        <div class="form-group">
                            <label>Email</label>
                            <input value="<?php echo $new_email;  ?>" type="email" class="form-control input-lg" name="new_user-email" maxlength="60">
                        </div>
                    </div>
                    </div>
                    <br />
                    <div class="row">
                    <div class="col-xs-12 col-sm-6 col-md-6">
                        <div class="form-group">
                        <label>Department</label>
                            <input type="text" name="new_user-dept" value="<?php echo $dept;  ?>" class="form-control input-lg" maxlength="44">
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-6 col-md-6">
                        <div class="form-group">
                            <label>Set</label>
                            <!-- Meaning... from, to? -->
                            <input type="text" name="new_user-set" value="<?php echo $sch_set_n;  ?>" class="form-control input-lg" maxlength="10">
                        </div>
                    </div>
                    
                    <div class="form-group">
                    <br /> 
                    <label>Address</label>
                    <textarea type="text" name="new_new-address" class="form-control input-lg" maxlength="488"><?php echo $addrs;  ?></textarea>
                </div>


                </div>
                 <br>

                    <center>
                    <button type="submit" name="submit-edit" class="btn btn-success btn-block btn-lg" style="width:30%; min-width:200px;">Add New Alumni</button>
                     </center>

            </form>

         </div>       
    </div>



  


    <?php
        /*  include ('../includes/admin_footer.php'); */
    ?>

<script src="../../styles/bootstrap.min.js"></script>
</body>
</html>
