<?php

class History {
	private $con;
	private $employee_id;
	private $exist;
	private $offset;

	public function get_employee_name($con, $employee_id) {
		$this->con = $con;
		$this->employee_id = $employee_id;

		$query = "SELECT first_name, last_name FROM users WHERE employee_id='$this->employee_id'";
		$check_database = mysqli_query($this->con, $query);
		$check_rows = mysqli_num_rows($check_database);

		if($check_rows == 1) {
			$this->exist = true;
			$row = mysqli_fetch_assoc($check_database);

			return ucfirst($row['first_name']) . ' ' . ucfirst($row['last_name']);
		}
		else {
			$this->exist = false;
			return "N/A";
		}
	}

	public function check_employee_id() {
		if($this->exist) {
			return $this->employee_id;
		}
		else {
			return "N/A";
		}
	}

	public function display_history($offset) {
		$this->offset = $offset;
		//Set Variable to avoid possible errors
		$result = '';
		//Fetch history of users access changes.
		$query = "SELECT access_prior, access_after, updated_by, updated_date, note FROM user_history WHERE employee_id='$this->employee_id' ORDER BY updated_date DESC LIMIT $this->offset, 15";
		$check_database = mysqli_query($this->con, $query);
		$check_rows = mysqli_num_rows($check_database);

		if($check_rows >= 1) {
			while ($row = mysqli_fetch_assoc($check_database)) {
				$date = $this->convert_date($row['updated_date']);
				$prior_access = $this->get_access_string($row['access_prior']);
				$after_access = $this->get_access_string($row['access_after']);

				$result .= '<tr>
				<td class="userHistory">' . $date . '</td>
				<td class="userHistory">' . $prior_access . '</td>
				<td class="userHistory">' . $after_access . '</td>
				<td class="userHistory">' . $row['updated_by'] . '</td>
				<td class="userHistory">' . $row['note'] . '</td>
				</tr>';

			}
		}
		else {
			$result = '<tr>
			 <td class="userHistory" colspan="5">No history found for this user!</td>
			</tr>';
		}
		return $result;

	}

	public function page_break() {
		$query = "SELECT * FROM user_history WHERE employee_id='$this->employee_id'";
		$check_database = mysqli_query($this->con, $query);
		$row_num = mysqli_num_rows($check_database);

		//Define Variables
		$result = $this->page_break_html($row_num);
		
		return $result;

	}
	private function convert_date($date) {
		$i_date = new DateTime($date);
		$n_timezone = new DateTimeZone('America/New_York');
		$i_date->setTimezone($n_timezone);
		return $i_date->format('m/d/Y h:ia');
	}

	private function get_access_string($level) {
		$string = '';

		switch ($level) {
			case '1':
				$string = 'General User';
				break;
			case '2':
				$string = 'Manager';
				break;
			case '3':
				$string = 'Admin';
				break;
			
			default:
				$string = 'No Access';
				break;
		}

		return $string;
	}

	private function page_break_html($num_rows) {
		$result = '';
		$lastpage = ceil($num_rows/15);
		$currpage = 1;

		for ($i=0; $i < $num_rows; $i+15) { 
			if($currpage == 1) {
				$result .= '<a href="user_history.php?employee_id=' . $this->employee_id . '"><<First</a>';
			}
			else if($currpage > 1 && $currpage < $lastpage) {
				$result .= '<a href="user_history.php?employee_id=' . $this->employee_id . '&offset=' . $i . '">' . $currpage . '</a>';
			}
			else {
				$result .= '<a href="user_history.php?employee_id=' . $this->employee_id . '&offset=' . $i . '">Last>></a>';
			}
			$currpage++;
		}

		return $result;
	}
}

?>
