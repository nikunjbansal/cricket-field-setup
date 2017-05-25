<?php

class database{
	private $db_host;
	private $db_username;
	private $db_password;
	private $db_name;
	private $conn;

	public function __construct()
	{
		$this->db_host = "localhost";
		$this->db_username = "root";
		$this->db_password = "";
		$this->db_name = "field";
		$this->connect();
	}
	
	public function connect()
	{
		$this->conn = mysqli_connect($this->db_host,$this->db_username,$this->db_password,$this->db_name);
		if (mysqli_connect_errno())
		{
		echo "Failed to connect to MySQL: " . mysqli_connect_error();
		}
	}
	
	public function query($query) 
	{
		return $this->conn->query($query);
	}
	
	public function update($query)
	{
		return $this->conn->query($query);
	}
}

