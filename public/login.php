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

$username = $_POST['username'];
$password = $_POST['password'];
$hash = password_hash($password, PASSWORD_DEFAULT);

$stmt = $conn->prepare("SELECT password FROM Users WHERE username = ?");
$stmt->bind_param("s", $username);
$stmt->execute();
$result = $stmt->get_result();

if (password_verify($password, $hash) && $result->num_rows > 0) {
echo "Your password matches, correct password";
	while ($row = $result->fetch_assoc()) {
//Redirect to index.php where the main functions of the application are located.
	}

} else {

echo "Your password doesn't match, incorrect password" . '<br> <br>';
//Redirect back to login page.

}

?>

