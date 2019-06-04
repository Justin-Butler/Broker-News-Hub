<?php

class Manage_users {

	private $con;

	public function display_users($con) {
		//Access Level of requesting user
		$this->con = $con;
		$user_access = $this->check_user_access();

		$query = "SELECT * FROM users WHERE NOT deactivated='1' ORDER BY access_level DESC";
		$check_database = mysqli_query($this->con, $query);
		$check_rows = mysqli_num_rows($check_database);

		$result = '';

		if($check_rows >= 1) {
			while ($row = mysqli_fetch_assoc($check_database)) {
				//Retrieve Values from Table Row
				$id = $row['id'];
				$last_name = $row['last_name'];
				$first_name = $row['first_name'];
				$employee_id = $row['employee_id'];
				$access_level = $row['access_level'];

				$result .= $this->display_users_access($user_access, $access_level, $id, $employee_id, $last_name, $first_name);	
			}
			//Check Access and if the requesting user is not an Admin the submit button will be disabled
			if($user_access > 2) {
				$result .= '</tbody>
				</table>
				<div class="form-row justify-content-center">
				<div class="col-auto">
				<button type="submit" name="userUpdateSubmit" class="btn btn-primary">Submit Changes</button>
				</div>';
			}
			else {
				$result .= '</tbody>
				</table>
				<div class="form-row justify-content-center">
				<div class="col-auto">
				<button type="submit" name="userUpdateSubmit" class="btn btn-primary" disabled>Submit Changes</button>
				</div>';
			}

			return $result;
		}
	}

	public function update_user_access($id, $req_access) {
		//Pull Current Access Level and Loss Date from database
		$query1 = "SELECT access_level, loss_date FROM users WHERE id='$id'";
		$check_database1 = mysqli_query($this->con, $query1);
		$currentRow = mysqli_fetch_assoc($check_database1);


		//Check if Submitted Access level is not the same as the current level. If it is the same Return Null.
		if($req_access !== $currentRow['access_level']) {
			//Pull Employee ID of posted ID for dataase update
			$employee_id = $this->check_employee_id($id);
			$nameOfUser = $this->get_nameOfUser($_SESSION['username']);
			$curr_access = $currentRow['access_level'];
			//Pull Data from Database to update user_history
			


			//Check if the submitted access change is 0 (No Access)
			if($req_access == 0) {
				//Update user access to 0
				$date = date("Y-m-d");
				$query2 = "UPDATE users SET access_level='$req_access', loss_date='$date' WHERE id='$id'";
				$update_database = mysqli_query($this->con, $query2);
				//Document User History
				$query2 = "INSERT INTO user_history (employee_id, access_prior, access_after, updated_by, note) VALUES ('$employee_id','$curr_access', '$req_access', '$nameOfUser', 'Access has been removed from this user.')";
				$insert_database = mysqli_query($this->con, $query2);
			}
			//If Submitted access level is above 0.
			else {
				//Update User Access on the table
				$query2 = "UPDATE users SET access_level='$req_access' WHERE id='$id'";
				$update_database = mysqli_query($this->con, $query2);
				//Document User History
				$query2 = "INSERT INTO user_history (employee_id, access_prior, access_after, updated_by, note) VALUES ('$employee_id','$curr_access', '$req_access', '$nameOfUser', 'Access Level has been changed.')";
				$insert_database = mysqli_query($this->con, $query2);
			}	
		}
		//Check if the Current Access Level is equal to 0
		else if($currentRow['access_level'] == 0) {
			$startDate = new DateTime($currentRow['loss_date']);
			$currentDate = date("Y/m/d");
			$endDate = new DateTime($currentDate);
			$diff = $startDate->diff($endDate);
			//Deactivate User if they have had no access to the system for 180 days (6 Months)
			if($diff->d >= 180) {
				$this->deactivate_user($id);
			}
		}
	}
	/* 
	Function is designed to access the database and check the access level of the user accessing the page.
	The form will display differently depending on the access level to prevent unauthorized users from making changes only an admin should be able to.
	*/
	private function display_users_access($user_level, $row_access_level, $id, $employee_id, $last_name, $first_name){

		$data = '<tr>
					<td class="userData">' . $employee_id . '</td>
					<td class="userData">' . ucfirst($last_name) .'</td>
					<td class="userData">' . ucfirst($first_name) .'</td>
					<td class="userData">';

		switch ($user_level) {
			//If Admin Level
			case 3: {
				switch ($row_access_level) {
					case 1:
					$data .= '
					<input type="hidden" name="id[]" value="' . $id . '">
					<select class="form-control" name="userRank[]">
					<option value="0">No Access</option>
					<option value="1" selected>General User</option>
					<option value="2">Manager</option>
					<option value="3">Admin</option>
					</select>';
					break;
					case 2:
					$data .= '
					<input type="hidden" name="id[]" value="' . $id . '">
					<select class="form-control" name="userRank[]">
					<option value="0">No Access</option>
					<option value="1">General User</option>
					<option value="2" selected>Manager</option>
					<option value="3">Admin</option>
					</select>';
					break;

					case 3:
					$data .= '
					<input type="hidden" name="id[]" value="' . $id . '">
					<select class="form-control" name="userRank[]">
					<option value="0">No Access</option>
					<option value="1">General User</option>
					<option value="2">Manager</option>
					<option value="3" selected>Admin</option>
					</select>';
					break;

					case 4:
					$data .= '
					<input type="hidden" name="id[]" value="' . $id . '" disabled>
					<select class="form-control" name="userRank[]" disabled>
					<option value="0">No Access</option>
					<option value="1">General User</option>
					<option value="2">Manager</option>
					<option value="3">Admin</option>
					<option value="4" selected>Web Admin</option>
					</select>';

					break;

					default:
					$data .= '
					<input type="hidden" name="id[]" value="' . $id . '">
					<select class="form-control" name="userRank[]">
					<option value="0" selected>No Access</option>
					<option value="1">General User</option>
					<option value="2">Manager</option>
					<option value="3">Admin</option>
					</select>';
					break;
				}
				break;
			}
			//If Web Admin Level
			case 4: {
				switch ($row_access_level) {
					case 1:
					$data .= '
					<input type="hidden" name="id[]" value="' . $id . '">
					<select class="form-control" name="userRank[]">
					<option value="0">No Access</option>
					<option value="1" selected>General User</option>
					<option value="2">Manager</option>
					<option value="3">Admin</option>
					</select>';
					break;
					case 2:
					$data .= '
					<input type="hidden" name="id[]" value="' . $id . '">
					<select class="form-control" name="userRank[]">
					<option value="0">No Access</option>
					<option value="1">General User</option>
					<option value="2" selected>Manager</option>
					<option value="3">Admin</option>
					</select>';
					break;

					case 3:
					$data .= '
					<input type="hidden" name="id[]" value="' . $id . '">
					<select class="form-control" name="userRank[]">
					<option value="0">No Access</option>
					<option value="1">General User</option>
					<option value="2">Manager</option>
					<option value="3" selected>Admin</option>
					</select>';

					break;

					case 4:
					$data .= '
					<input type="hidden" name="id[]" value="' . $id . '" disabled>
					<select class="form-control" name="userRank[]" disabled>
					<option value="0">No Access</option>
					<option value="1">General User</option>
					<option value="2">Manager</option>
					<option value="3">Admin</option>
					<option value="4" selected>Web Admin</option>
					</select>';
					break;
					
					default:
					$data .= '
					<input type="hidden" name="id[]" value="' . $id . '">
					<select class="form-control" name="userRank[]">
					<option value="0" selected>No Access</option>
					<option value="1">General User</option>
					<option value="2">Manager</option>
					<option value="3">Admin</option>
					</select>';
					break;
				}
				break;
			}
			//If General Access or Manager (They wont have access to add users or update privledges)
			default:
			switch ($row_access_level) {
				case 1:
				$data .= '
				<input type="hidden" name="id[]" value="' . $id . '" disabled>
				<select class="form-control" name="userRank[]" disabled>
				<option value="0">No Access</option>
				<option value="1" selected>General User</option>
				<option value="2">Manager</option>
				<option value="3">Admin</option>
				</select>';
				break;

				case 2:
				$data .= '
				<input type="hidden" name="id[]" value="' . $id . '" disabled>
				<select class="form-control" name="userRank[]" disabled>
				<option value="0">No Access</option>
				<option value="1">General User</option>
				<option value="2" selected>Manager</option>
				<option value="3">Admin</option>
				</select>';

				break;

				case 3:
				$data .= '
				<input type="hidden" name="id[]" value="' . $id . '" disabled>
				<select class="form-control" name="userRank[]" disabled>
				<option value="0">No Access</option>
				<option value="1">General User</option>
				<option value="2">Manager</option>
				<option value="3" selected>Admin</option>
				</select>';

				break;

				case 4:
				$data .= '
				<input type="hidden" name="id[]" value="' . $id . '" disabled>
				<select class="form-control" name="userRank[]" disabled>
				<option value="0">No Access</option>
				<option value="1">General User</option>
				<option value="2">Manager</option>
				<option value="3">Admin</option>
				<option value="4" selected>Web Admin</option>
				</select>
				';

				break;

				default:
				$data .= '
				<input type="hidden" name="id[]" value="' . $id . '" disabled>
				<select class="form-control" name="userRank[]">
				<option value="0" selected>No Access</option>
				<option value="1">General User</option>
				<option value="2">Manager</option>
				<option value="3">Admin</option>
				</select>';
				break;
			}
			break;
		}
		$data .= '</td>
					<td class="userHistory">
					<a href="user_history.php?employee_id=' . $employee_id . '">History</a>
					</td>
					</tr>';

		return $data;
	}
	/*Function will check access level of user and return the numeric value. If the user is not authorized the Submit button will be disabled*/
	private function check_user_access() {
		//pull data from session
		$local_username = $_SESSION['username'];

		//SQL Query Definition
		$query = "SELECT access_level FROM users WHERE employee_id='$local_username'";
		//Query Database
		$database_check = mysqli_query($this->con, $query);
		//Check number of rows that match Query
		$check_rows = mysqli_num_rows($database_check);
		/*If only one row matches the query is valid otherwise no action should be taken as there is an issue with the database that will need to be reviewed by the admin.*/
		if($check_rows == 1) {
			$row = mysqli_fetch_assoc($database_check);
			return $row['access_level'];
		}
		//Log Out as a critical error, possible Session Poisoning
		else {
			Header("Location: logout.php");
		}
	}
	//Deactivate User so they will no longer be displayed in the manage users page is accessed. (Will only be called if user has no access for 180 days)
	private function deactivate_user($id) {
		//Update user table
		$query = "UPDATE users SET deactivated='1' WHERE id='$id'";
		$update_database = mysqli_query($this->con, $query);
		//Insert into User History for Documentation
		$employee_id = $this->check_employee_id($id);
		$query = "INSERT INTO user_history (employee_id, access_prior, access_after, updated_by, note) VALUES ('$employee_id','0', '0', 'System', 'Account Deactivated due to 180 days of No Access.')";
		$insert_database = mysqli_query($this->con, $query);
	}
	//Grabs Employee Id from database using the id of the row that will be updated in another function
	private function check_employee_id($id) {
		$query = "SELECT employee_id FROM users WHERE id='$id'";
		$check_database = mysqli_query($this->con, $query);
		$result = mysqli_fetch_assoc($check_database);

		return $result['employee_id']; 
	}
	//Pull First and Last name of user updating access for documentation. Protect Database from Session Poisoning
	private function get_nameOfUser($employee_id) {
		$query = "SELECT first_name, last_name FROM users WHERE employee_id='$employee_id'";
		$check_database = mysqli_query($this->con, $query);
		$check_num_rows = mysqli_num_rows($check_database);

		//If only one row then the query is valid.
		if($check_num_rows == 1) {
			$row = mysqli_fetch_assoc($check_database);

			return ucfirst($row['first_name']) . ' ' . ucfirst($row['last_name']);
		}
		//If it returns a different value there is an issue.
		else {
			//Header("Location: logout.php");
		}
	}
}

?>