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
	$result = $conn->query("SELECT * FROM admins ORDER BY id ASC LIMIT $start, $limit ");
	$admins = $result->fetch_all(MYSQLI_ASSOC);

	$result1 = $conn->query("SELECT count(id) AS id FROM admins");
	$custCount = $result1->fetch_all(MYSQLI_ASSOC);
	$total = $custCount[0]['id'];
	$pages = ceil( $total / $limit );

	$Previous = $page - 1;
	$Next = $page + 1;

 ?>


<html>
    <head>
        <title>View Admins</title>
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
        <h2>All Admins</h2>
        </div>
        <div class="col-md-6">


            
<?php
//DELETE Admin CODE
    if (isset($_POST['del_comp'])){
        $aId = $_POST['cid_name'];
                               
                                    
        $drom = mysqli_query($conn, "DELETE FROM `admins` WHERE id = '$aId' "
        );
                echo ' <div class="alert alert-success alert-dismissible fade show" role="alert"">
                <strong>Success!</strong> User' .$aId .' deleted successfully.
                <button type="button" class="btn-close"
                data-bs-dismiss="alert"
                aria-label="Close"></button>
                <a href="view-admins.php?page=' . $page .' ">
                <button type="button" class="btn-primary"
                >Refresh Page</button></a>
            </div> ';
        
           
    }

 ?>





        </div>
    </div>


<!-- BOTH PROCESSORS ARE HERE -->





<div style="overflow-y: auto;">
			<table id="" class="table table-striped table-bordered">
	        	<thead>
	                <tr>
                        <th>Id</th>
	                    <th>First Name</th>
	                    <th>Last Name</th>
	                    <th>Email</th>
	                    <!-- <th>Number</th> -->
                        <?php if($_SESSION['adm_user_role'] == 'super-admin'):  ?>
	                    <th>Actions</th> 
                        <?php endif; ?>
	              	</tr>
	          	</thead>
	        	<tbody>
	        		<?php foreach($admins as $customer) :  ?>
		        		<tr>
                            <td><?php echo $customer['id']; ?></td>
		        			<td><?php echo $customer['first_name']; ?></td>
		        			<td><?php echo $customer['last_name']; ?></td>
		        			<td><?php echo $customer['email']; ?></td>
		        			<!-- <td><?php // echo $customer['phone_number']; ?></td> -->

                            <?php 
                            //THIS CODE HIDES THE DELETE BUTTON....one liner
                            if ($_SESSION['adm_user_role'] == 'super-admin'): ?>
                                


							<td>
                                        <div class="row" style="max-width:140px;">
										<div class="col-lg-12 d-none d-lg-block">
                                                                                        <!-- Button trigger modal -->
                                                <button type="button" class="btn btn-danger actionbtn" data-toggle="modal" data-target="#exampleModal<?php echo $customer["id"];  ?>">
                                                Delete
                                                </button>

                                                
                                </div>
                                </div>

                                        </td>
                            
                                        <?php endif; ?>
                               
		        		</tr>
								<!-- Modal -->
								<div class="modal fade" id="exampleModal<?php echo $customer['id'];  ?>"  tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Confirm Admin Delete</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        Are you sure you want to delete this Admin?
                                                        <p style="color:brown;">Admin:<span style="color:grey;"> <?php echo $customer['email']; ?> </span></p>
                                                        <p><small>Click on <b>Delete completely</b> to delete.</small></p>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                        <form method="post">
                                                        <input type="hidden" name="cid_name" value="<?php echo $customer['id']; ?>" />
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



<?php
        /*  include ('../includes/admin_footer.php'); */
    ?>

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

    <script src="../../styles/bootstrap.min.js"></script>
</body>
</html>
