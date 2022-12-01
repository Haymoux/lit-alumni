<?php

    include ('../includes/db-conn.php');
    session_start();


    if (isset($_SESSION['adm_logged_in'])){
       
    }
    else{
        header ("location: index.php");
        exit;
    }
    
?>



<html>
    <head>
        <title>Admin Dashboard</title>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="../styles/bootstrap.min.css">
        <link rel="icon" href="https://peteramos.42web.io/img/gallery/PP.png">
        <link rel="stylesheet" href="../styles/footer.css">
    
    </head>
   






    <header>
    <nav class="navbar navbar-expand-lg navbar-dark bg-success p-3">
<div class="container-fluid">
  <a class="navbar-brand" href="#">Welcome Admin</a>
  <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
 
  <div class=" collapse navbar-collapse" id="navbarNavDropdown">
    <ul class="navbar-nav ms-auto ">
    
                <li class="nav-item">
                    <a class="nav-link mx-2 active" aria-current="page" href="dashboard.php">Admin Home</a>
                </li>
                
                <li class="nav-item">
                    <a class="nav-link mx-2" href="adm-operations/admin-add.php">Add New Admin</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link mx-2" href="adm-operations/adm-logout.php">Log Out <i class="fa fa-sign-out" aria-hidden="true"></i></a>
                </li>
    </ul>
  </div>
</div>
</nav>
    </header>


    <body>
        <div class="container">
            <div class="row">

            <div class="col-md-6 col-lg-12"> 
                            <br />
                            <br /> 
                            <a href="adm-operations/admin-edit-profile.php">                      
                            <button style="float:left; right:40px;" class="btn btn-warning btn-block"><span class="fa fa-user" ></span> Edit your Profile </button>
                            </a>
                            <a href="adm-operations/new-user.php"> 
                            <button style="float:right;" class="btn btn-warning btn-block"><span class="fa fa-plus" ></span> Add New Alumni </button>
                            </a>
                        </div>




                <div class="col-md-6 col-lg-12">
                            <br />
                            <br />
                            <br />
                            <small style="color:brown; margin-left:10px;">Signed in as</small>
                            <h2>
                            <?php
                                echo $_SESSION['adm_first_name'] . ' ' . $_SESSION['adm_last_name'];
                            ?>
                            </h2>
                            
                            <hr class="col-lg-6">
                            <p><strong>Email: </strong> <?php echo $_SESSION['adm_user_email']; ?> </p>
                            <!-- <p><strong>Phone Number: </strong> 08032656432 </p>
                            <p><strong>Department: </strong> Radiology </p> -->



                            <!-- <p><strong>Year of Graduation: </strong>
                                <span class="tags">html5</span> 
                                <span class="tags">css3</span>
                                <span class="tags">jquery</span>
                                <span class="tags">bootstrap3</span>
                            </p> -->
                  </div>   
                 </div>

                <br />
                <br />
                 <div class="row">

                    <div class="col-lg-12">
                        <center>
                         <a href="adm-operations/view-alumnis.php">
                         <button class="btn btn-primary" style="height:50px; min-width:400px;">See all Alumnis</button>
                         </a>
                       </center>
                    </div>
                    <br /> <br /> <br />
                    <div class="col-lg-12">
                        <center>
                         <a href="adm-operations/view-admins.php">
                         <button class="btn btn-secondary" style="height:50px; min-width:400px;">See all Admins</button>
                         </a>
                       </center>
                    </div>

                </div>


        </div>




        <script src="../styles/bootstrap.min.js"></script>
    </body>

    <footer>
    <div class="footer-h3">


    <ul class="footer-icons">
        
        <li><a href="https://github.com/haymoux"><i class="fa fa-github" aria-hidden="true"></i></a></li>
        <li><a href="https://linkedin.com/in/peter-amos1" target="_blank"><i class="fa fa-linkedin  animate__animated  animate__bounce" id="linkr" aria-hidden="true"></i></a></li>
        <li><a href="https://peteramos.42web.io"><i class="fa fa-link" aria-hidden="true"></i></a></li>
    </ul>

    </div>
</footer>
</html>





