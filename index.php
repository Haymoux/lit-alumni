<?php
    session_start();
    ?>
<!doctype html>
<html lang="en">
    <head>
        <title>Alumni LIT</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="icon" href="https://peteramos.42web.io/img/gallery/PP.png">
        <link rel="stylesheet" href="styles/bootstrap.min.css">
        <link rel="stylesheet" href="styles/home-hero.css">
        <link rel="stylesheet" href="styles/footer.css"> <!-- body background is here -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">


    </head>
    <header>
    <nav class="navbar navbar-expand-lg navbar-dark bg-success p-3">
<div class="container-fluid">
  <a class="navbar-brand" href="#">LIT Alumni</a>
  <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
 
  <div class=" collapse navbar-collapse" id="navbarNavDropdown">
    <ul class="navbar-nav ms-auto ">
    <?php
        if (isset($_SESSION['logged_in'])){
         echo '
                <li class="nav-item">
                    <a class="nav-link mx-2 active" aria-current="page" href="#">Home</a>
                </li>
                
                <li class="nav-item">
                    <a class="nav-link mx-2" href="user-dashboard/index.php">Dashboard</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link mx-2" href="includes/logout.php">Log Out <i class="fa fa-sign-out" aria-hidden="true"></i></a>
                </li>
      ';}
      else{
        echo '
                    <li class="nav-item">
                    <a class="nav-link mx-2 active" aria-current="page" href="index.php">Home</a>
                </li>
                
                    <li class="nav-item">
                    <a class="nav-link mx-2" href="pages/signin.php">Sign In</a>
                </li>
        
        ';
      }
      ?>
      <!-- <li class="nav-item dropdown">
        <a class="nav-link mx-2 dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
          Company
        </a>
        <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
          <li><a class="dropdown-item" href="#">Blog</a></li>
          <li><a class="dropdown-item" href="#">About Us</a></li>
          <li><a class="dropdown-item" href="#">Contact us</a></li>
        </ul>
      </li> -->
    </ul>
  </div>
</div>
</nav>
    </header>

    <body>
        
    


    <div class="hero-part">
          <div class="container">
      
            <div class="row">
              <div class="col-md-6">

              	<h1 class="animate__animated  animate__fadeIn">Lakeside Institute of Technology</h1>
              	<h3 class="animate__animated  animate__fadeIn"> Alumni Portal</h3>
	      	<p>
			<a href="pages/signin.php"><button class="btn btn-tertiary    animate__animated animate__fadeIn">Enter Portal Now</button></a>
	      	</p> <br />
              </div> 

              <div class="col-md-6 ">
              <img id="hero-img" class="d-none d-lg-block       animate__animated  animate__fadeIn"src="img/note-st.png" alt="picture-illutration">
              </div> 

            </div>
          
          </div>
            </div>







        <footer>
    <div class="footer-h3">


    <ul class="footer-icons">
        
        <li><a href="https://github.com/haymoux"><i class="fa fa-github" aria-hidden="true"></i></a></li>
        <li><a href="https://linkedin.com/in/peter-amos1" target="_blank"><i class="fa fa-linkedin  animate__animated  animate__bounce" id="linkr" aria-hidden="true"></i></a></li>
        <li><a href="https://peteramos.42web.io"><i class="fa fa-link" aria-hidden="true"></i></a></li>
    </ul>

    </div>
</footer>








        <script src="../styles/bootstrap.min.js"></script>
    </body>
</html>
