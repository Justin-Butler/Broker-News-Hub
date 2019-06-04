<?php 
require 'config/config.php';
include 'includes/form_handlers/manage_users_handler.php';

$manage_users = new Manage_users();

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
	<title>BNH Admin: Manage Users</title>
</head>
<body>
	<!-- Body Container -->
	<main class="container-fluid">
		<?php include 'includes/bnhHeader.php';?>
		<!--Manage User Table Section-->
		<section class="row mb-3 justify-content-center">
			<div class="col">
				<div class="row justify-content-center">
					<div class="col-auto" id="userTable">
						<h3 id="userTableHeader" class="gFont1">Manage User Access</h3>
						<form method="POST" action="manage_users.php">
							<table class="table gFont1">
								<thead>
									<tr>
										<th scope="col">Employee ID</th>
										<th scope="col">Last Name</th>
										<th scope="col">First Name</th>
										<th scope="col">Access Privileges</th>
										<th scope="col">History</th>
									</tr>
								</thead>
								<tbody>
									<?php 
									$result = $manage_users->display_users($con);
									echo $result;

									//If Submit button is clicked...
									if(isset($_POST['userUpdateSubmit'])) {
										$arrLength = count($_POST['id']);
										//Loop through each row of table.
										for($x=0; $x<$arrLength; $x++) {
											$currentId = $_POST['id'][$x];
											$req_access_update = $_POST['userRank'][$x];

											$update = $manage_users->update_user_access($currentId, $req_access_update);
										}
										//Reload Page
										header("Location: manage_users.php");
									}
									?>
								</div>
							</form>
						</div>
					</div>
				</div>
			</section>
			<!--Footer Section-->
			<?php include 'includes/bnhFooter.php';?>
		</main>

		<!-- Optional JavaScript -->

		<!-- jQuery first, then Popper.js, then Bootstrap JS -->
		<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

	</body>
	</html>