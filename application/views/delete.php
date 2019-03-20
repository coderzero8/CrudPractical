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
			<h1>Delete</h1>
		</div>
    <div class="row">
			<form id="form">
					<div class="form-group">
						<label for="Userid">Userid</label>
						<input type="text" class="form-control" id="userid" aria-describedby="emailHelp" placeholder="Enter User Id">					
					</div>					
					<button type="submit" class="btn btn-primary">Submit</button>
				</form>	
		</div>
 </div>
 <div class="footer">
		<h6>Jerick C. Mangalus</h6>
	</div>
	<script src="http://code.jquery.com/jquery-3.3.1.js" integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60="  crossorigin="anonymous"></script>
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
									url: "http://localhost/CIPrac/Main/insert_delete",
									data: {
											userid: $("#userid").val(),				
									},
									error: function (xhr, textStatus, errorThrown) {
									}
									}).done(function (response) {

										alert('done')
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