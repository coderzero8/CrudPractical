<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Practical</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.5.6/css/buttons.dataTables.min.css" >
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark static-top">
    <div class="container">
      <a class="navbar-brand" href="#">Practical</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item active">
            <a class="nav-link" href="http://localhost/CIPrac/Main">Home
              <span class="sr-only">(current)</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="http://localhost/CIPrac/Main/insert">Insert</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="http://localhost/CIPrac/Main/Update">Update</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="http://localhost/CIPrac/Main/Delete">Delete</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  <div class="container ">
    <div class="row">
  		<h1>View</h1>
	</div>
    <div class="row">

		<table id="myTable">
			<tr>
				<th>	
					Id
				</th>

				<th>	
					Name
				</th>

				<th>	
					Email
				</th>
				<th>	
					Status
				</th>

				<th>	
					Created
				</th>

				<th>	
					Updated
				</th>
			</tr>	

			<?php if($_SESSION){
				foreach($_SESSION['ses'] as $result){
				if($result){
			?> 			
					<tr>
						<td> <?php echo $result['id']; ?> </td>
						<td> <?php echo $result['name']; ?> </td>
						<td> <?php echo $result['email']; ?> </td>
						<td> <?php switch($result['status']){
								case 1: echo "Active"; break;
								case 2: echo "Inactive"; break;
								case 3: echo "Deleted"; break;
								}
							 ?> 
						</td>
						<td> <?php echo $result['created']; ?> </td>
						<td> <?php echo $result['updated']; ?> </td>
					</tr>

			<?php }	else{ ?>

					<tr>
						<td colspan="4"> No data </td>				
					</tr>
			<?php 
					}
				}	
			}else{ ?>
					<tr >
						<td colspan="4"> No data </td>				
					</tr>
			<?php
				}	
			?> 
		</table>
	</div>
 </div>
	<div class="footer">
		<h6>Jerick C. Mangalus</h6>
	</div>
	<script src="http://code.jquery.com/jquery-3.3.1.js" integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60="  crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>    
	<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js" ></script>
	<script>
		$(document).ready( function () {
			$('#myTable').DataTable();
		});
	</script>
	<style>
		.footer {
			position: fixed;
			left: 0;
			bottom: 0;
			width: 100%;
			background-color: blue;
			color: white;
			text-align: center;
		}
	</style>
</body>
</html>