<?php 
require 'config/config.php';
include 'includes/form_handlers/user_history_handler.php';

$history = new History();

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
	<title>BNH Admin: User History</title>
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
						<div class="row justify-content-center">
							<div class="col">
								<h3 id="userTableHeader" class="gFont1">User History</h3>
							</div>
						</div>
						<div class="row justify-content-around">
							<div class="col-sm-6">
								<h4 class="gFont1 text-center">Employee Name: <?php echo $history->get_employee_name($con, $_GET['employee_id']); ?></h4>
							</div>
							<div class="col-sm-6">
								<h4 class="gFont1 text-center">Employee ID: <?php echo $history->check_employee_id(); ?></h4>
							</div>
						</div>

						<table class="table table-bordered table-striped gFont1">
							<thead>
								<tr>
									<th scope="col">Date</th>
									<th scope="col">Prior Access Level</th>
									<th scope="col">Updated Access Level</th>
									<th scope="col">Updated By</th>
									<th scope="col">Notes</th>
								</tr>
							</thead>
							<tbody>
								<?php


								if(isset($_GET['offset'])) {
									echo $history->display_history($_GET['offset']);
								}
								else {
									echo $history->display_history(0);
								}

								
								?>
							</tbody>
						</table>
						<div class="row justify-content-end">
							<div class="col-sm-4">
								<?php echo $history->page_break(); ?>
							</div>
						</div>
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