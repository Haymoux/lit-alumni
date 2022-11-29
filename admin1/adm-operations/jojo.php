<?php 
	include '../../includes/db-conn.php';
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
<!DOCTYPE html>
<html>
<head>
	<title>Learn Web Coding > Pagination in PHP and MySQL </title>
	<link rel="stylesheet" href="../../styles/bootstrap.min.css">

    <style>
        .pagination li{
            margin-left: 10px;  
        }
        .actionbtn{
            max-height: 37.14px;
        }
    </style>
</head>
<body>
	<div class="container">
		<!-- <h1 class="text-center">www.peteramos.42web.io</h1> -->
		


		<div style="height: 600px; overflow-y: auto;">
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
                            <td><?php echo $customer['id']; ?></td>
		        			<td><?php echo $customer['name']; ?></td>
		        			<td><?php echo $customer['email']; ?></td>
		        			<td><?php echo $customer['department']; ?></td>
		        			<td><?php echo $customer['phone_number']; ?></td>
                            <td>
                            <div class="row" style="max-width:140px;">
                                <div class="col-lg-6">
		        			 <button class="btn btn-primary actionbtn"> View </button>
                            </div>
                            <div class="col-lg-6 d-none d-lg-block">
															<!-- Button trigger modal -->
								<button type="button" class="btn btn-danger actionbtn" data-toggle="modal" data-target="#exampleModal">
								Delete
								</button>

								<!-- Modal -->
								<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
										<button type="button" class="btn btn-primary">Delete completely</button>
									</div>
									</div>
								</div>
								</div>
							
                    </div>
                    </div>

                            </td>
                               
		        		</tr>
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



<div style="position: fixed; bottom: 10px; right: 10px; color: green;">
        <strong>
            Learn Web Coding
        </strong>
</div>



<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

</body>
</html>