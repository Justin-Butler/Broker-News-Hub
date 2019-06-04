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
	<title>BNH Admin: Manage Users</title>
</head>
<body>
	<!-- Body Container -->
	<main class="container-fluid">
		<?php require 'includes/bnhHeader.php';?>
		<!--Manage User Table Section-->
		<section class="row mb-3 justify-content-center">
			<div class="col">
				<div class="row justify-content-center">
					<div class="col-md-8" id="articleViewEdit">
						<div class="row">
							<div class="col">
								<h3 class="text-center">Article View/Edit</h3>
							</div>
						</div>
						<div class="row">
							<div class="col">
								<table class="table gFont1 text-center">
									<caption>List of Articles</caption>
									<thead>
										<tr>
											<th scope="col">ID</th>
											<th scope="col">Submitted Date</th>
											<th scope="col">Last Update</th>
											<th scope="col">Approval Date</th>
											<th scope="col">Article Name</th>
											<th colspan="3">Actions</th>
										</tr>
									</thead>
									<tbody>
										<!---->
										<tr>
											<td class="articleData">1</td>
											<td class="articleData">03/05/2019 5:00 P.M.</td>
											<td class="articleData">03/05/2019 5:00 P.M.</td>
											<td class="articleData"></td>
											<td class="articleData"><a href="#">Upcomming Changes in 2020</a></td>
											<td class="articleData">
												<a href="#">Edit</a>
											</td>
											<td class="articleData">
												<a href="#">History</a>  
											</td>
											<td class="articleData">
												<a href="#">Delete</a>
											</td>
										</tr>
										<tr>
											<td class="articleData">2</td>
											<td class="articleData">03/05/2019 5:00 P.M.</td>
											<td class="articleData">03/05/2019 5:00 P.M.</td>
											<td class="articleData"></td>
											<td class="articleData"><a href="#">Upcomming Changes in 2020</a></td>
											<td class="articleData">
												<a href="#">Edit</a>
											</td>
											<td class="articleData">
												<a href="#">History</a>  
											</td>
											<td class="articleData">
												<a href="#">Delete</a>
											</td>
										</tr>
										<!---->
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