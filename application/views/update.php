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
            <a class="nav-link" href="http://localhost/CIPrac/Main/Insert">Insert</a>
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
  <div class="container">
		<div class="row">
				<h1>Update</h1>
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
	</tr>	

	<?php if($_SESSION){
		foreach($_SESSION['ses'] as $result){
		if($result){
	?> 			
			<tr>
				<td> <?php echo $result['id']; ?> </td>
				<td> <?php echo $result['name']; ?> </td>
				<td> <?php echo $result['email']; ?> </td>
				<td> <?php echo $result['status']; ?> </td>
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
	<div class="row">
				<form id="form">
					<input type="hidden" id="updateuserid" name="updateuserid" value="">
					<div class="form-group">
						<label for="Userid">Userid</label>
						<input type="text" class="form-control" id="userid" aria-describedby="emailHelp" placeholder="Enter User Id">					
					</div>					
					<button type="submit" class="btn btn-primary">Edit</button>
				</form>	
				<br/>
				<form id="form2">
				<div class="form-group">
					<label for="exampleInputEmail1">Name</label>
					<input type="text" class="form-control" id="name" aria-describedby="emailHelp" placeholder="Name">					
				</div>
				<div class="form-group">
					<label for="exampleInputEmail1">Email address</label>
					<input type="email" class="form-control" id="email" aria-describedby="emailHelp" placeholder="Enter email">					
				</div>
				<div class="form-group">
					<label for="exampleInputPassword1">Password</label>
					<input type="password" class="form-control" id="password" placeholder="Password">
				</div>
				<div class="form-group">
					<label for="exampleFormControlSelect1">Status</label>
					<select class="form-control" id="select">
						<option value="1">Active</option>
						<option value="2">Inactive</option>
						<option value="3">Deleted</option>						
					</select>
  			</div>
				<button type="submit" class="btn btn-primary">Submit</button>
			</form>
		</div>
	</div>
 </div>
 <div class="footer">
		<h6>Jerick C. Mangalus</h6>
	</div>
	<script
  src="http://code.jquery.com/jquery-3.3.1.js"
  integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60="
  crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>    
		<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
	<script>
				$(document).ready( function () {


					$("#form").validate({
						rules: {
								"userid": {								
										minlength: 1
								},						
						},
						messages: {
								"userid": {
										required: "Please, enter a userid"
								},							
						},
						submitHandler: function (form) { 					
								$.ajax({
									type: "POST",
									url: "http://localhost/CIPrac/Main/insert_load",
									data: {
											userid: $("#userid").val(),				
									},
									error: function (xhr, textStatus, errorThrown) {
									}
									}).done(function (response) {
									var obj	=	JSON.parse(response);
											$("#name").val(obj.name);											
											$("#email").val(obj.email)
											$("#password").val(obj.password)
											$("#select").val(obj.status)
											$("#updateuserid").val(obj.sessionindex)
											$("#updateuserid").val()																			
											alert('load done');
									}).fail(function (response) {
						
									});	
						}
					});

					$("#form2").validate({
						rules: {
								"userid": {								
										minlength: 1
								},						
						},
						messages: {
								"userid": {
										required: "Please, enter a userid"
								},							
						},
						submitHandler: function (form) { 					
								$.ajax({
									type: "POST",
									url: "http://localhost/CIPrac/Main/insert_update",
									data: {
											ses_index: $("#updateuserid").val(),		
											userid: $("#userid").val(),		
											name:$("#name").val(),
											email:$("#email").val(),
											password:$("#password").val(),
											status:$("#select").val(),		
									},
									error: function (xhr, textStatus, errorThrown) {
									}
									}).done(function (response) {
											alert('load done');
											window.reload();
									}).fail(function (response) {
						
									});	
						}
					});
				})

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