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
	<title>BNH Admin: Article Add/Edit</title>
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
						<h3 class="formHeader gFont1">Article Add/Edit</h3>
					</div>
				</div>
				<!--Article Add/Edit Form-->
				<form action="">
					<div class="form-row justify-content-between">
						<div class="form-group col-sm-6 col-lg-4">
							<h5 class="formLabel gFont1">ID:</h5>
							<p class="formText gFont1">ID will only populate when editing an Article!</p>
						</div>
						<div class="form-group col-sm-6 col-lg-4">
							<h5 class="formLabel gFont1">User Name:</h5>
						</div>
					</div>
					<div class="form-row">
						<div class="form-group col-lg-8">
							<label for="articleHeadline" class="formLabel gFont1">Article Headline - Character Limit: <span id="articleHeadlineCount"></span></label>
							<input type="text" class="form-control" id="articleHeadline" placeholder="Article Headline">
						</div>
						<div class="form-group col-lg-4 align-self-end">
							<div class="custom-file">
								<input type="file" class="custom-file-input" id="articleIMG">
								<label class="custom-file-label" for="articleIMG">Upload Article Image</label>
							</div>
						</div>
					</div>
					<div class="form-row">
						<div class="form-group col">
							<label for="articleContent" class="formLabel gFont1">Article Content</label>
							<textarea name="articleContent"></textarea>
							<script>
								CKEDITOR.replace('articleContent');
							</script>
						</div>
					</div>
					<div class="form-row">
						<div class="form-group col">
							<label for="articleSummary" class="formLabel gFont1">Article Summary (One Sentence Summary of Article Content) - Character Limit: <span id="articleSummaryCount"></span></label>
							<input type="text" class="form-control" id="articleSummary" placeholder="Article Summary">
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