<?php
	// class
	class DB {
		// public props
		public string $DBHost, $DBUser, $DBPassword, $DBName;
		// constructor
		function __construct($DBHost, $DBUser, $DBPassword, $DBName) {
			$this->DBHost = $DBHost;
			$this->DBUser = $DBUser;
			$this->DBPassword = $DBPassword;
			$this->DBName = $DBName;
		}
		// methods
		function connect() {
			global $connection;
			$connection = new mysqli($this->DBHost, $this->DBUser, $this->DBPassword, $this->DBName);
			if($connection->connect_error) {
				return false;
			} else {
				return true;
			}
		}
	}
?>