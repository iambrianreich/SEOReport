<?php

require_once('../bootstrap.php');

$servername     = $config['database']['host'];
$uname       = $config['database']['username'];
$pass       = $config['database']['password'];
$dbname         = $config['database']['database']; 

/*$servername = "localhost"; //servername for DB, default localhost or 127.0.0.1 or ::1
$uname = "root"; //username for DB, default root
$pass = "JamesBondAgent007"; //password for DB
$dbname = "SEO"; */

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
	$redirect_uri = 'http://' . $_SERVER['HTTP_HOST'] . '/index.html';
	header('Location: ' . filter_var($redirect_uri, FILTER_SANITIZE_URL));

	while ($row = $result->fetch_assoc()) {

	}

} else { //Username and/or Password don't already exist, so enter them into the DB.

$Created = date("Y.m.d");
echo "<br>" . $Created . "<br>";
$lastmodified = time();
echo "<br>" . $lastmodified . "<br>";
$stmt = $conn->prepare("INSERT INTO Users (username,password,created,lastModified) VALUES (?,?,?,?)");
$stmt->bind_param("sssi", $username, $hash, $Created, $lastmodified);
$stmt->execute();

$stmt->close();
$conn->close();

$redirect_uri = 'http://' . $_SERVER['HTTP_HOST'] . '/index.html';
header('Location: ' . filter_var($redirect_uri, FILTER_SANITIZE_URL));

}

//We're done, close database connection & the statement.
$stmt->close();
$conn->close();

//Redirect back to the main index.
$redirect_uri = 'http://' . $_SERVER['HTTP_HOST'] . '/index.html';
header('Location: ' . filter_var($redirect_uri, FILTER_SANITIZE_URL));

?>
