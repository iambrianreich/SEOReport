<?php

require_once('../bootstrap.php');

$servername = $config['database']['host'];
$uname = $config['database']['username'];
$pass = $config['database']['pasword'];
$dbname = $config['database']['database'];

//Create connection
$conn = new mysqli($servername, $uname, $pass, $dbname);

//Check connection
if ($conn->connect_error) {
	die("Connection failed: " . $conn->connect_error);
} else {
	echo "Connected successfully <br> <br>";
}

//$sql = "SELECT username, password FROM Users WHERE username='$username' AND password='$password'";
//$result = $conn->query($sql);
$stmt = $conn->prepare("SELECT username,password FROM Users WHERE username=? AND password=?");
$stmt->bind_param("ss", $username, $password);
//execute query
$stmt->execute();
$stmt->bind_result($user,$passs);

if ($stmt->fetch() > 0) {
echo "Username and Password, already exist: ";
} else {
//Insert password with email into the database if the email + password don't already exist in the database.
//Prepared statement used to prevent SQL Injection dropping of tables or insertion of unauthorized data.

$username = $_POST['username']; //Fetch
$password = $_POST['password']; //Fetch
//Add some salt. //Salt is added by the PASSWORD_DEFAULT Function but, can be randomized for paranoid security.
$password = password_hash($password, PASSWORD_DEFAULT);

//echo $username . "<br> <br>"; //Test statement
//echo $password . "<br> <br>"; //Test statement

$stmt = $conn->prepare("INSERT INTO Users (username,password) VALUES (?,?)");
$stmt->bind_param("ss", $username, $password);
$stmt->execute();

echo "Username and/or Password registered successfully";

}

//We're done, close database connection & the statement.
$stmt->close();
$conn->close();

//Redirect back to the main index.

?>
