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
                    <a class="nav-link mx-2 active" aria-current="page" href="../index.php">Home</a>
                </li>
                
                <li class="nav-item">
                    <a class="nav-link mx-2" href="index.php">Dashboard</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link mx-2" href="../includes/logout.php">Log Out <i class="fa fa-sign-out" aria-hidden="true"></i></a>
                </li>
      ';}
      else{
        echo '
                    <li class="nav-item">
                    <a class="nav-link mx-2 active" aria-current="page" href="../index.php">Home</a>
                </li>
                
                    <li class="nav-item">
                    <a class="nav-link mx-2" href="../pages/signin.php">Sign In</a>
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