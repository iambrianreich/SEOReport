<?php

$servername = "localhost"; //servername for DB, default localhost or 127.0.0.1 or ::1
$uname = "root"; //username for DB, default root
$pass = "JamesBondAgent007"; //password for DB
$dbname = "SEO";
//Create connection
$conn = new mysqli($servername, $uname, $pass, $dbname);
//Check connection
if ($conn->connect_error) {
	die("Connection failed: " . $conn->connect_error);
} else {
	echo "Connected successfully <br> <br>";
}

$username = $_POST['username'];
$password = $_POST['password'];
$hash = password_hash($password, PASSWORD_DEFAULT);

$stmt = $conn->prepare("SELECT password FROM Users WHERE username = ? AND password = ?");
$stmt->bind_param("ss", $username, $password);
$stmt->execute();
$result = $stmt->get_result();

if (password_verify($password, $hash)) {

echo "Your password matches, correct password";
//Redirect to index.php where the main functions of the application are located.

} else {

echo "Your password doesn't match, incorrect password" . '<br> <br>';
//Redirect back to login page.

}

?>
