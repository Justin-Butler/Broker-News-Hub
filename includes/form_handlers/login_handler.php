<?php 

	if(isset($_POST['logIn_btn'])) {
		
		$username = $_POST['username'];
		$password = md5($_POST['password']);

		//Check if the input username is an Email Address
		if(strpos($username, "@") == false) {
			$check_database_query = mysqli_query($con, "SELECT * FROM users WHERE employee_id='$username' AND password='$password'");
		}
		//If username is Employee ID
		else {
			$username = filter_var($username, FILTER_SANITIZE_EMAIL); //SANITIZE EMAIL
			$check_database_query = mysqli_query($con, "SELECT * FROM users WHERE email='$username' AND password='$password'");
		}

		$check_login_row = mysqli_num_rows($check_database_query);

		if($check_login_row == 1) {
			$row = mysqli_fetch_array($check_database_query);
			$username = $row['employee_id'];
			$name_of_user = ucfirst($row['first_name']) . ' ' . ucfirst($row['last_name']);

			ini_set('session.gc_maxlifetime', 3600);
			$_SESSION['nameOfUser'] = $name_of_user;
			$_SESSION['username'] = $username;
			$_SESSION['last_activity'] = time();

			header("Location: index.php");
			exit();
		}
	}
?>