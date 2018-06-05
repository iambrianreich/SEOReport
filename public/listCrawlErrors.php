<?php

/**
 * Lists crawl errors.
 */

require_once('../bootstrap.php');

?>
<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title> SEOReport </title>
</head>
<body style="text-align: center";>

<br>
<br>

<?php
$servername     = $config['database']['host'];
$username       = $config['database']['username'];
$password       = $config['database']['password'];
$dbname         = $config['database']['database'];

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$URL = $_POST['URL'];

//$sql = "SELECT * from CrawlError WHERE url = $_POST('URL')";
$sql = "SELECT id, reportID, url, type, errorCount, created, creator, lastModifiedBy, lastModified, platform from CrawlError WHERE url = '$URL'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        //echo "<strong> Title: </strong>" . $row["title"]. "<br> <strong> Author: </strong>" . $row["author"]. "<br> <strong> ISBN </strong>" . $row["ISBN"]. " <br> <strong> Genre: </strong>" . $row["Genre"]. "<br> <br>";
	echo "<strong> id: </strong>" . $row['id'] . "<br> <strong> reportID: </strong>" . $row['reportID'] . "<br> <strong> url: </strong>" . $row['url'] . "<br> <strong> type: </strong>" . $row['type'] . "<br> <strong> errorCount: </strong>" . $row['errorCount'] . "<br> <strong> created: </strong>" . $row['created'] . "<br> <strong> creator: </strong>" . $row['creator'] . "<br> <strong> lastModifiedBy: </strong>" . $row['lastModifiedBy'] . "<br> <strong> lastModified </strong>" . $row['lastModified'] . "<br> <strong> platform: </strong>" . $row['platform'] . "<br> <br>";  
    }

} else {
    echo "0 results";
}
$conn->close();
?>

</body>
</html>

