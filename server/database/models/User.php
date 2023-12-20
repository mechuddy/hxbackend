<?php
	// class
	class User {
		// static methods
		static function exist($email) {
			$all = "*";
			global $connection;
			global $table;
			$sql = "SELECT $all FROM $table WHERE email = '$email'";
			$result = $connection->query($sql);
			if($result->num_rows) {
				return true;
			} else {
				return false;
			}
		}
		static function confirmPassword($email, $password) {
			$all = "*";
			global $connection;
			global $table;
			$sql = "SELECT $all FROM $table WHERE email = '$email'";
			$result = $connection->query($sql);
			if($result->num_rows) {
				$record = $result->fetch_array(MYSQLI_ASSOC);
				if($password == $record['password']) {
					return true;
				} else {
					return false;
				}
			}
		}
		static function fetch($email) {
			$all = "*";
			global $connection;
			global $table;
			$sql = "SELECT $all FROM $table WHERE email = '$email'";
			$result = $connection->query($sql);
			if($result->num_rows) {
				$record = $result->fetch_array(MYSQLI_ASSOC);
				return $record;
			} else {
				return false;
			}
		}
	}
?>