<?php

//check username  old password.

//if username  password is valid, allow password change.

//else disallow password change and redirect back to main index.

require_once('../bootstrap.php');

$servername     = $config['database']['host'];
$uname       = $config['database']['username'];
$pass       = $config['database']['password'];
$dbname         = $config['database']['database']; 

/*$servername = "localhost";
$uname = "root";
$pass = "JamesBondAgent007";
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
$password = $_POST['passwordOld'];

$newPassword = $_POST['passwordNew'];

//$hash = password_hash($password, PASSWORD_DEFAULT);
$newHash = password_hash($newPassword, PASSWORD_DEFAULT);

//echo "<br> $username <br>";
//echo "<br> $password <br>";
//echo "<br> $hash <br>";

$stmt = $conn->prepare("SELECT password FROM Users WHERE username = ?");
$stmt->bind_param("s", $username);
$stmt->execute();
$result = $stmt->get_result();

while($row = $result->fetch_assoc()) {
$hash = $row['password'];
}

//echo "<br> Got to if statement <br>";
//print_r($result);

if (password_verify($password, $hash) && $result->num_rows > 0) {

$lastmodified = time();
echo "<br>" . $lastmodified . "<br>";
//$stmt = $conn->prepare("INSERT INTO Users (username,password,lastModified) VALUES (?,?,?)");
$stmt = $conn->prepare("UPDATE Users SET password=?,lastModified=?,lastModifiedBy=? WHERE username=?");
$stmt->bind_param("siss", $newHash, $lastmodified, $username, $username);
$stmt->execute();

echo "<br> Password successfully changed for username " . $username . "<br>";

	while ($row = $result->fetch_assoc()) {
	//change password if the username  old password checks out.
	}
	$stmt->close();
	$conn->close();

	$redirect_uri = 'http://' . $_SERVER['HTTP_HOST'] . '/index.html';
	header('Location: ' . filter_var($redirect_uri, FILTER_SANITIZE_URL));

} else { //authentication failed, redirect back to main index.

die("Incorrect Username and/or Password, redirect back to login page");
$stmt->close();
$conn->close();

$redirect_uri = 'http://' . $_SERVER['HTTP_HOST'] . '/index.html';
header('Location: ' . filter_var($redirect_uri, FILTER_SANITIZE_URL));

}

$stmt->close();
$conn->close();
?>
