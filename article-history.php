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
	<title>BNH Admin: Article History</title>
</head>
<body>
	<!-- Body Container -->
	<main class="container-fluid">
		<?php require 'includes/bnhHeader.php';?>
		<!--Primary Content-->
		<section class="row justify-content-center mb-3">
			<div class="col-lg-10 col-xl-7 mx-1" id="indexStyle">
				<div class="row">
					<div class="col">
						<div class="row">
							<div class="col">
								<h3 class="text-center">Article History</h3>
							</div>
						</div>
						<div class="row">
							<div class="col-md-6">
								<p>Article Name: <span></span></p>
							</div>
							<div class="col-md-3">
								<p>Submitted Date: <span></span></p>
							</div>
							<div class="col-md-3">
								<p>Approval Date: <span></span></p>
							</div>
						</div>
						<div class="row">
							<div class="col">
								<table class="table table-bordered table-striped">
									<caption>List of System Update Log Details</caption>
									<thead>
										<th>Date</th>
										<th>Details</th>
										<th>Submitted By</th>
									</thead>
									<tbody>
										<tr>
											<td></td>
											<td>
												New System Created!
											</td>
											<td></td>
										</tr>
									</tbody>
								</table>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
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