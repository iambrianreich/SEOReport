<?php

$username = $_POST['username'];
$password = $_POST['password'];

//Salt the password eventually...

$hash = password_hash($password, PASSWORD_DEFAULT); //Hash the password.

$servername = "localhost"; //servername for DB, default localhost or 127.0.0.1 or ::1
$username = "root"; //username for DB, default root
$password = "JamesBondAgent007"; //password for DB
$dbname = "SEO";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
	die("Connection failed: " . $conn->connect_error);
} else {
	echo "Connected successfully <br> <br>";
}

//Insert password with email into the database if the email + password don't already exist in the database.
//Prepared statement used to prevent SQL Injection dropping of tables or insertion of unauthorized data.
$stmt = $conn->prepare("INSERT INTO Users (username,password) VALUES (?,?)");
$stmt->bind_param("ss", $username, $password);

$username = $_POST[username];
$password = $_POST[password];

$stmt->execute();

//We're done, close database connection.
$conn->close();

//Redirect back to the main index.

?>
