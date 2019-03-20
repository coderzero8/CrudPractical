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
		<h1>Insert</h1>
	</div>
    <div class="row">
	
			<form id="form">
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
	<div class="footer">
		<h6>Jerick C. Mangalus</h6>
	</div>
	<script
  src="http://code.jquery.com/jquery-3.3.1.js"
  integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60="
  crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" ></script>    
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
	<script>
    $("#form").validate({
        rules: {
            "name": {
                required: true,
                minlength: 5
            },
            "email": {
                required: true,
                email: true
            }
        },
        messages: {
            "name": {
                required: "Please, enter a name"
            },
            "email": {
                required: "Please, enter an email",
                email: "Email is invalid"
            }
        },
        submitHandler: function (form) { // for demo
            // alert('valid form submitted'); // for demo
						// return false; // for demo
						$.ajax({
							type: "POST",
							url: "http://localhost/CIPrac/Main/insert_add",
							data: {
									name:$("#name").val(),
									email:$("#email").val(),
									password:$("#password").val(),
									status:$("#select").val(),
							},
							error: function (xhr, textStatus, errorThrown) {
									/*console.log('retrieve request failed');*/
									
							}
							}).done(function (response) {
								alert('done')
							}).fail(function (response) {
				
							});	
        }
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