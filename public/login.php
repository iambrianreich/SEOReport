<?php

session_start();

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

$username = $_POST['username'];
$password = $_POST['password'];
$_SESSION['username'] = $username;

$stmt = $conn->prepare("SELECT password FROM Users WHERE username = ?");
$stmt->bind_param("s", $username);
$stmt->execute();
$result = $stmt->get_result();
while($row = $result->fetch_assoc()) {
//echo $row['password'];
//echo "<br>";
$hash = $row['password'];
}

//echo $hash;
//echo "<br>";

//echo "<br> $hash <br>";

if (password_verify($password, $hash)) {
echo "Your password matches, correct password";
	while ($row = $result->fetch_assoc()) {
//Redirect to index.php where the main functions of the application are located.
//$redirect_uri = 'http://' . $_SERVER['HTTP_HOST'] . '/index.php';
//header('Location: ' . filter_var($redirect_uri, FILTER_SANITIZE_URL));
}

$stmt->close();
$conn->close();

$redirect_uri = 'http://' . $_SERVER['HTTP_HOST'] . '/index.php';
header('Location: ' . filter_var($redirect_uri, FILTER_SANITIZE_URL));

} else {

echo "Your password doesn't match, incorrect password" . '<br> <br>';
//Redirect back to login page.

$stmt->close();
$conn->close();

$redirect_uri = 'http://' . $_SERVER['HTTP_HOST'] . '/index.html';
header('Location: ' . filter_var($redirect_uri, FILTER_SANITIZE_URL));
}

?>
