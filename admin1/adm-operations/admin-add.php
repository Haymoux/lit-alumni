<?php
    include ('../../includes/db-conn.php');
    session_start();


    if (isset($_SESSION['adm_logged_in'])){
       
    }
    else{
        header ("location: ../index.php");
        exit;
    }

//This code helps to retain values after errors
    $first_name = '';
    $last_name = '';
    $adm_email = '';
    $fixed_admin_pass = "New_admin_default";    //Global variable for fixed admin password

    
?>





<html>
    <head>
        <title>Add New Admin</title>
        <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="../../styles/bootstrap.min.css">
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
        <h2>Add New Admin</h2>
        </div>


        <div class="col-md-6">

                                   

<!-- THE PROCESSOR IS HERE -->



                                                <?php
                                                //Admin Add New Admin
                                                    if (isset($_POST['submit-edit'])){
                                                        $first_name = $_POST['first-name'];
                                                        $last_name = $_POST['last-name'];
                                                        $adm_email = $_POST['adm-email'];

                                                          //Check if user exists already
                                                          $mailcheck = mysqli_query ($conn, "SELECT * FROM admins WHERE email = '$adm_email'; ");
                                                          $mailcheck_row = mysqli_num_rows($mailcheck);


                                                        if ( empty($first_name) || empty($last_name)  || empty($adm_email)  /*|| empty($sch_set_n)  || empty($addrs)*/  ){
                                                            
                                                            echo ' <div class="alert alert-danger alert-dismissible fade show" role="alert"">
                                                            <strong>Invalid!</strong> Please fill in all required fields.
                                                            <button type="button" class="btn-close"
                                                            data-bs-dismiss="alert"
                                                            aria-label="Close"></button>
                                                            </div> ';
                                            }



                                            else if ( strlen($first_name)>44 || strlen($last_name)>44  || strlen($adm_email)>60  /*|| strlen($sch_set_n)>10  || strlen($addrs)>490*/  ){
                                                            
                                                echo ' <div class="alert alert-danger alert-dismissible fade show" role="alert"">
                                                <strong>Invalid!</strong> Do not exceed input Limit.
                                                <button type="button" class="btn-close"
                                                data-bs-dismiss="alert"
                                                aria-label="Close"></button>
                                                </div> ';
                                    }
                                    else if ( $mailcheck_row > 0  ){
                                                            
                                        echo ' <div class="alert alert-danger alert-dismissible fade show" role="alert"">
                                        <strong>Invalid!</strong> Admin with email already exist.
                                        <button type="button" class="btn-close"
                                        data-bs-dismiss="alert"
                                        aria-label="Close"></button>
                                        </div> ';



                                      }


                                                        else{

                                                            $sql_insertion = "INSERT INTO admins (id, email, first_name, last_name, password) VALUES ( '', '$adm_email', '$first_name', '$last_name', '$fixed_admin_pass' )  ";

                                                            $usethis = mysqli_query( $conn, $sql_insertion );

                                                            


                                                            echo ' <div class="alert alert-success alert-dismissible fade show" role="alert"">
                                                            <strong>Success!</strong> New Admin Added Sucessfully.
                                                            <button type="button" class="btn-close"
                                                            data-bs-dismiss="alert"
                                                            aria-label="Close"></button>
                                                            </div> ';

                                                            //Revert the inputs back to empty after success
                                                            $first_name = '';
                                                            $last_name = '';
                                                            $adm_email = '';
                                                            
                                                            }
                                                            



                                                    }

                                                ?>



    </div>





    <form method="POST" autocomplete="off">                                         
        <div class="row" id="main">
        <div class="col-md-12">
            <form role="form">
                <hr class="col-md-6 col-lg-4">

                <!-- <div class="form-group">
                    <label>Full Name</label>
                    <input maxlength="59" type="text" name="dname" class="form-control input-lg" value="" >
                </div>
                <br /> -->


                
                    
                    <div class="row">
                    <div class="col-xs-12 col-sm-6 col-md-6">
                        <div class="form-group">
                        <label>First Name</label>
                            <input type="text" name="first-name" value="<?php echo $first_name;  ?>" class="form-control input-lg" maxlength="44" autocomplete="off" required>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-6 col-md-6">
                        <div class="form-group">
                            <label>Last Name</label>
                            <!-- Meaning... from, to? -->
                            <input type="text" name="last-name" value="<?php echo $last_name;  ?>" class="form-control input-lg" maxlength="44" autocomplete="off" required>
                        </div>
                    </div>
                    
                    <!-- <div class="form-group">
                    <br /> 
                    <label>Address</label>
                    <textarea type="text" name="new-address" class="form-control input-lg" maxlength="488"></textarea>
                </div> -->


                </div>
                <br />

                <div class="row">
                    <!-- <div class="col-xs-12 col-sm-6 col-md-6">
                        <div class="form-group">
                        <label>Phone Number</label>
                            <input type="text" name="user-ph-num" value="" class="form-control input-lg" maxlength="13">
                        </div>
                    </div> -->
                    <div class="col-xs-12 col-sm-6 col-md-12">
                        <div class="form-group">
                            <label>Email</label>
                            <input name="adm-email" value="<?php echo $adm_email;  ?>" class="form-control input-lg" autocomplete="off" required maxlength="60" type="email">
                        </div>
                    </div>
                    </div>
                 <br>

                 <div class="row">
                    <div class="col-xs-12 col-sm-6 col-md-12">
                        <div class="form-group">
                            <label style="color:brown;">Password</label>
                            <input  value="<?php echo $fixed_admin_pass;  ?>" class="form-control input-lg" readonly>
                        </div>
                    </div>
                    </div>
                 <br>

                    <center>
                    <button type="submit" name="submit-edit" class="btn btn-success btn-block btn-lg" style="width:30%; min-width:200px;">Save Info Update</button>
                     </center>

            </form>

         </div>       
    </div>



  




<script src="../../styles/bootstrap.min.js"></script>
</body>
</html>
