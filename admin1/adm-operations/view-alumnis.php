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

<?php 
	$limit = isset($_POST["limit-records"]) ? $_POST["limit-records"] : 10;
	$page = isset($_GET['page']) ? $_GET['page'] : 1;
	$start = ($page - 1) * $limit;
	$result = $conn->query("SELECT * FROM members ORDER BY id DESC LIMIT $start, $limit ");
	$members = $result->fetch_all(MYSQLI_ASSOC);

	$result1 = $conn->query("SELECT count(id) AS id FROM members");
	$custCount = $result1->fetch_all(MYSQLI_ASSOC);
	$total = $custCount[0]['id'];
	$pages = ceil( $total / $limit );

	$Previous = $page - 1;
	$Next = $page + 1;

 ?>



<html>
    <head>
        <title>View Alumnis</title>
        <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="../../styles/bootstrap.min.css">
        <link rel="icon" href="https://peteramos.42web.io/img/gallery/PP.png">
        <link rel="stylesheet" href="../../styles/footer.css">

        <style>
        .pagination li{
            margin-left: 10px;  
        }
        .actionbtn{
            max-height: 37.14px;
        }
        
        .search-submit button{
            float: right;
            position: relative;
            margin: -2.35em 2em 0em 0em;
        }
        /*Only the search field is form control*/
        .form-control{
            max-width: 70% !important;
            margin-left: 2em;
        }
         </style>

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
        <h2>All Registered Alumnis</h2>
        </div>


        <div class="col-md-6">

<?php
//DELETE USER CODE
    if (isset($_POST['del_comp'])){
        $cid = $_POST['cid_name'];
                               
                                    
        $drom = mysqli_query($conn, "DELETE FROM `members` WHERE id = '$cid' "
        );
                echo ' <div class="alert alert-success alert-dismissible fade show" role="alert"">
                <strong>Success!</strong> User' .$cid .' deleted successfully.
                <button type="button" class="btn-close"
                data-bs-dismiss="alert"
                aria-label="Close"></button>
                <a href="view-alumnis.php?page=' . $page .' ">
                <button type="button" class="btn-primary"
                >Refresh Page</button></a>
            </div> ';
        
           
    }

 ?>

 
<?php
//SEARCH REDIRECT CODE
	if (isset($_POST['search_btn'])){
        $dfield = $_POST['search-field'];


        if ($dfield === "" || !ctype_alnum($dfield) || strlen($dfield) < 3) {
            echo ' <div class="alert alert-danger alert-dismissible fade show" role="alert"">
            <strong>Invalid!</strong> Invalid search made.
            <button type="button" class="btn-close"
            data-bs-dismiss="alert"
            aria-label="Close"></button>
            </div> ';
        }
        else {
            header('Location: search.php?qr=' . $dfield);
        }



        
    }
 ?>



            <form class="signin-form" method="POST" autocomplete="off">

                <div class="form-group search-submit">
                <input  type="text" class="form-control" maxlength="45" minlength="3" name="search-field" required autocomplete="off">

                <button type="submit" name="search_btn" class=" btn btn-warning rounded submit px-3">Search</button>
                </div>
            </form>


        </div>


        </div>  <!-- Close the row -->











            <div class="container">
                <!-- <h1 class="text-center">www.peteramos.42web.io</h1> -->
                    


                    <div style="/* height: 600px; */ overflow-y: auto;">
                        <table id="" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Department</th>
                                    <th>Number</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach($members as $customer) :  ?>
                                    <tr>
                                        <td><?php $cid= $customer['id']; echo $customer['id']; ?></td>
                                        <td><?php echo $customer['name']; ?></td>
                                        <td><?php echo $customer['email']; ?></td>
                                        <td><?php echo $customer['department']; ?></td>
                                        <td><?php echo $customer['phone_number']; ?></td>
                                        <td>
                                        <div class="row" style="max-width:140px;">
                                            <div class="col-lg-6">
                                                <a href="  <?php echo 'user-view.php?id='.$cid ;  ?>   ">
                                                     <button class="btn btn-primary actionbtn"> View </button>
                                                </a>

                                        </div>
                                        <div class="col-lg-6 d-none d-lg-block">
                                                                                        <!-- Button trigger modal -->
                                                <button type="button" class="btn btn-danger actionbtn" data-toggle="modal" data-target="#exampleModal<?php echo $cid;  ?>">
                                                Delete
                                                </button>

                                                
                                </div>
                                </div>

                                        </td>
                                        
                                    </tr>
                                    <!-- Modal -->
                                    <div class="modal fade" id="exampleModal<?php echo $cid;  ?>"  tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Confirm Alumni Delete</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        Are you sure you want to delete this Alumni?
                                                        <p style="color:brown;">User:<span style="color:grey;"> <?php echo $customer['email']; ?> </span></p>
                                                        <p><small>Click on <b>Delete completely</b> to delete.</small></p>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                        <form method="post">
                                                        <input type="hidden" name="cid_name" value="<?php echo $cid; ?>" />
                                                        <button type="submit" class="btn btn-primary" name="del_comp">Delete completely</button>
                                                        </form>
                                                    </div>
                                                    </div>
                                                </div>
                                                </div>
                                        
                                <?php endforeach; ?>
                            </tbody>
                        </table>

                        
                    </div>


                    <div class="row" style="margin-top: 20px;">
                        <div class="col-md-block">
                            <nav aria-label="Page navigation">
                                <ul class="pagination" style="float:right;">
                                <li  class="  <?php if($page <= 1){ echo'd-none'; }  ?>  ">
                                <a href="?page=<?= $Previous; ?>" aria-label="Previous">
                                    <span aria-hidden="true">&laquo; Previous Page</span>
                                </a>
                                </li>
                                <?php for($i = 1; $i<= $pages; $i++) : ?>
                                    <a href="?page=<?= $i; ?>">  <li class="btn btn-secondary ">  <?= $i; ?>  </li>  </a> 
                                <?php endfor; ?>
                                <li class="  <?php if($page >= $pages){ echo'd-none'; }  ?>  ">
                                <a href="?page=<?= $Next; ?>" aria-label="Next">
                                    <span aria-hidden="true"> Next Page &raquo;</span>
                                </a>
                                </li>
                            </ul>
                            </nav>
                        </div>
                    </div>



















</div>   <!--Container-->


<?php
        /*  include ('../includes/admin_footer.php'); */
    ?>


<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

    <script src="../../styles/bootstrap.min.js"></script>
</body>
</html>
