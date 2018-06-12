<html>
<body>

<?php

session_start(); //Start the user session.

if (isset($_SESSION['username'])) {

echo " <br> Generating report for: " . $_SESSION["username"] . "<br> <br>";

} else {

echo "Session variable not set, please login";

$redirect_uri = 'http://' . $_SERVER['HTTP_HOST'] . '/index.html';
header('Location: ' . filter_var($redirect_uri, FILTER_SANITIZE_URL));

}

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

$username = $_SESSION['username']; //Grab the users session data.

//Grab the relevant data from the Site table for generating a report.
$stmt = $conn->prepare("select max(id), PrimaryUrl, lastModified, LastModifiedBy FROM Site WHERE lastModifiedBy = '$username' GROUP BY id LIMIT 1;");
$stmt->bind_param("s", $username);
$stmt->execute();
$result = $stmt->get_result();
while($row = $result->fetch_assoc()) {
//echo $row['password'];
//echo "<br>";

$siteID = $row['PrimaryUrl'];
$created = date("Y.m.d");
$lastModified = time();
$creator = $username;
$lastModifiedBy = $username;

}

/*
if ($siteID = 'NULL') {

$siteID = $_POST['URL'];

} else {

continue;

}  */

$stmt->close(); 

/*
echo "<br> SiteID: $siteID <br>";
echo "<br> Created: $created <br>";
echo "<br> lastModified: $lastModified <br>";
echo "<br> creator: $creator <br>";
echo "<br> lastModifiedBy: $lastModifiedBy <br>"; */


$stmt = $conn->prepare("SELECT siteID, created, lastModified, creator, lastModifiedBy FROM Report WHERE lastModifiedBy = '$username';");
$stmt->bind_param("s", $username);
$stmt->execute();
$result = $stmt->get_result();
while($row = $result->fetch_assoc()) {

$siteid = $row['siteID'];
$Created = $row['created'];
$Lastmodified = $row['lastModified'];
$Creator = $row['creator'];
$Lastmodifiedby = $row['lastModifiedBy'];

}

if ($siteid === NULL or $Created === NULL or $Lastmodified === NULL or $Creator === NULL or $Lastmodifiedby === NULL) {

$stmt->close();

$stmt = $conn->prepare("INSERT INTO Report (siteID, created, lastModified, creator, lastModifiedBy) VALUES (?, ?, ?, ?, ?)");
$stmt->bind_param("ssiss", $siteID, $created, $lastModified, $creator, $lastModifiedBy);
$stmt->execute();

$stmt->close();
$conn->close();

} else { //Data already exists in the Report table for $username

//if so display the data and give the option to download it in .csv format through a data dump.

$stmt = $conn->prepare("select siteID, created, lastModified, creator, lastModifiedBy FROM Report WHERE lastModifiedBy = '$username';");
$stmt->bind_param("s", $username);
$stmt->execute();
$result = $stmt->get_result();
while($row = $result->fetch_assoc()) {

$siteID = $row['siteID'];
$created = $row['created'];
$lastModified = $row['lastModified'];
$creator = $row['creator'];
$lastModifiedBy = $row['lastModifiedBy'];

}

echo "<br> siteID:  $siteID <br>";
echo "<br> created: $created <br>";
echo "<br> lastModified: $lastModified <br>";
echo "<br> creator: $creator <br>";
echo "<br> lastModifiedBy: $lastModifiedBy <br>";

}

?>

</body>
</html>

