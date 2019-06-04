<?php

if(isset($_SESSION['username']) && (time() - $_SESSION['last_activity']) < 3600) {
	$userLoggedIn = $_SESSION['nameOfUser'];
	$lifetime = 3600;
	$_SESSION['last_activity'] = time();
	setcookie(session_name(), session_id(), time()+$lifetime);
}
else {
	header("Location: logout.php");
}

echo '<!-- User Log In Data Nav -->
		<div class="row justify-content-end">
			<ul class="nav mr-md-5">
				<li class="nav-item dropdown">
					<a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						' . $userLoggedIn . '
					</a>
					<div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
						<a class="dropdown-item" href="logout.php">Log Out</a>
					</div>
				</li>
			</ul>
		</div>
		<!-- Primary Nav Bar -->
		<div class="row mb-3 justify-content-center">
			<div class="col-12" id="navBackground">
				<div class="row justify-content-center">
					<div class="col-lg-auto">
						<nav class="navbar navbar-expand-lg navbar-light bg-light">
							<a class="navbar-brand">BNH Admin</a>
							<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
								<span class="navbar-toggler-icon"></span>
							</button>
							<div class="collapse navbar-collapse" id="navbarNavDropdown">
								<ul class="navbar-nav">
									<li class="nav-item">
										<a class="nav-link" href="index.php">Home</a>
									</li>
									<li class="nav-item dropdown">
										<a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
											Update Log
										</a>
										<div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
											<a class="dropdown-item" href="update-logs.php">View/Edit Update Log</a>
											<a class="dropdown-item" href="add-edit-log.php">Add Update Log</a>
										</div>
									</li>
									<li class="nav-item dropdown">
										<a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
											News Articles
										</a>
										<div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
											<a class="dropdown-item" href="view-edit-article.php">View/Edit Articles</a>
											<a class="dropdown-item" href="pending-articles.php">Pending Articles</a>
											<a class="dropdown-item" href="add-edit-article.php">Draft Article</a>
										</div>
									</li>
									<li class="nav-item dropdown">
										<a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
											User Admin
										</a>
										<div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
											<a class="dropdown-item" href="manage_users.php">Manage Users</a>
											<a class="dropdown-item" href="#">Add a New User</a>
										</div>
									</li>
									<li class="nav-item">
										<a class="nav-link" href="#">Help</a>
									</li>
								</ul>
							</div>
						</nav>
					</div>
				</div>
			</div>
		</div>';
?>