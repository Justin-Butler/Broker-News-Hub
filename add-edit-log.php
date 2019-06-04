<?php 
require 'config/config.php';
 ?>

<html lang="en">
<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta http-equiv="X-UA-Compatible" content="IE=edge"/>
	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<!--Google Font Link-->
	<link href="https://fonts.googleapis.com/css?family=Mukta+Mahee:400,700" rel="stylesheet">
	<!--Local Sheet Link-->
	<link rel="stylesheet" type="text/css" href="styles.css">
	<script src="https://cdn.ckeditor.com/4.11.3/standard/ckeditor.js"></script>
	<title>BNH Admin: Update Log Add/Edit</title>
</head>
<body>
	<!-- Body Container -->
	<main class="container-fluid">
		<?php require 'includes/bnhHeader.php';?>
		<!--Primary Content-->
		<div class="row justify-content-center mb-3">
			<div class="col-lg-10 col-xl-7 align-self-center mx-1" id="formStyle">
				<div class="row">
					<div class="col">
						<h3 class="formHeader gFont1">Update Log Add/Edit</h3>
					</div>
				</div>
				<!--Article Add/Edit Form-->
				<form action="">
					<div class="form-row justify-content-between">
						<div class="form-group col-sm-6 col-lg-4">
							<h5 class="formLabel gFont1">Previous Build Number:</h5>
						</div>
						<div class="form-group col-sm-6 col-lg-4">
							<h5 class="formLabel gFont1">User Name:</h5>
						</div>
					</div>
					<div class="form-row">
						<div class="form-group col-lg-4">
							<label for="updateLogBuild" class="formLabel gFont1">Update Log Build</label>
							<input type="text" class="form-control" id="updateLogBuild" placeholder="Build Number">
						</div>
					</div>
					<div class="form-row">
						<div class="form-group col">
							<label for="updateLogBuildNotes" class="formLabel gFont1">Update Log Build Details</label>
							<textarea name="updateLogBuildNotes"></textarea>
							<script>
								CKEDITOR.replace('updateLogBuildNotes');
							</script>
						</div>
					</div>
					<div class="form-row justify-content-center align-items-center">
						<div class="col-auto">
							<button class="btn btn-primary" type="submit" name="submitArticleBtn">Submit</button>
						</div>
						<div class="col-auto">
							<button class="btn btn-danger" type="submit" name="cancelBtn">Cancel</button>
						</div>
					</div>
				</form>
			</div>
		</div>
		<!--Footer Section-->
		<?php require 'includes/bnhFooter.php';?>
	</main>

	<!-- Optional JavaScript -->

	<!-- jQuery first, then Popper.js, then Bootstrap JS -->
	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

</body>
</html>