<?php

require_once('../bootstrap.php');

$servername     = $config['database']['host'];
$username       = $config['database']['username'];
$password       = $config['database']['password'];
$dbname         = $config['database']['database'];

//Create connection
$conn = new mysqli($servername, $uname, $pass, $dbname);

//Check connection
if ($conn->connect_error) {
	die("Connection failed: " . $conn->connect_error);
} else {
	echo "Connected successfully <br> <br>";
}

//get variables
$username = $_POST['username'];
$password = $_POST['password'];

$hash = password_hash($password, PASSWORD_DEFAULT);

$sql = "SELECT username, password FROM Users WHERE username='$username'";
$result = $conn->query($sql);

if (password_verify($password, $hash) && $result->num_rows > 0) { //Check if username and/or password already exist.

	die("Username and/or Password already exists");

	while ($row = $result->fetch_assoc()) {

	}

} else { //Username and/or Password don't already exist, so enter them into the DB.

$lastmodified = time();
echo "<br>" . $lastmodified . "<br>";
$stmt = $conn->prepare("INSERT INTO Users (username,password,lastModified) VALUES (?,?,?)");
$stmt->bind_param("ssi", $username, $hash, $lastmodified);
$stmt->execute();

}

//We're done, close database connection & the statement.
$stmt->close();
$conn->close();

//Redirect back to the main index.

?>

