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
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="../styles/bootstrap.min.css">
    
    </head>
    <?php
        include ('../includes/header.php');
    ?>
    <body>
        <div class="container">
            <div class="row">

            <div class="col-md-6 col-lg-12"> 
                            <br />
                            <br /> 
                            <a href="edit-profile.php">                      
                            <button style="float:right;" class="btn btn-warning btn-block"><span class="fa fa-user" ></span> Edit your Profile </button>
                            </a>
                        </div>




                <div class="col-md-6 col-lg-12">
                            <br />
                            <br />
                            <br />
                            <h2>
                            <?php
                                echo $_SESSION['name'];
                            ?>
                            </h2>
                            
                            <hr class="col-lg-6">
                            <p style="color:brown; margin-left: 35px;"><small><b>Note: </b>Kindly edit your Profile if you see any error here...</small></p>
                        
                            <p><strong>Email: </strong> <?php echo $_SESSION['user_email'];?> </p>
                            <p><strong>Phone Number: </strong> <?php echo $_SESSION['number'];?> </p>
                            <p><strong>Department: </strong> <?php echo $_SESSION['department'];?> </p>
                            <p><strong>Set: </strong> <?php echo $_SESSION['sch_set'];?> </p>
                            <p><strong>Address: </strong> <?php echo $_SESSION['address'];?> </p>



                            <!-- <p><strong>Year of Graduation: </strong>
                                <span class="tags">html5</span> 
                                <span class="tags">css3</span>
                                <span class="tags">jquery</span>
                                <span class="tags">bootstrap3</span>
                            </p> -->
                  </div>   
                            
                                  
                                     
                
            </div>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script
    </body>
</html>


