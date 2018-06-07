<?php

//check username + old password.

//if username + password is valid, allow password change.

//else disallow password change and redirect back to main index.

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
$password = $_POST['passwordOld'];

$newPassword = $_POST['passwordNew'];

$hash = password_hash($password, PASSWORD_DEFAULT);
$newHash = password_hash($newPassword, PASSWORD_DEFAULT);

$stmt = $conn->prepare("SELECT password FROM Users WHERE username = ?");
$stmt->bind_param("s", $username);
$stmt->execute();
$result = $stmt->get_result();

if (password(verify($password, $hash) && $result->num_rows > 0)) {

$lastmodified = time();
echo "<br>" . $lastmodified . "<br>";
$stmt = $conn->prepare("INSERT INTO Users (username,password,lastModified) VALUES (?,?,?)");
$stmt->bind_param("ssi", $username, $newHash, $lastmodified);
$stmt->execute();

echo "<br> Password successfully changed for username " . $username . "<br>";

	while ($row = $result->fetch_assoc()) {
	//change password if the username + old password checks out.
	}

} else { //authentication failed, redirect back to main index.

die("Incorrect Username and/or Password, redirect back to login page");

}

//We're done, close database connection & the statement.
$stmt->close();
$conn->close();

?>

