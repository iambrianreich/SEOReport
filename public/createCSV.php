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
/*
$dbConfig = Config::getInstance()->get('db');
$db = new PDO(
	'mysql:host=localhost;dbname=SEO', $dbConfig['root'], $dbConfig['JamesBondAgent007']
);

$db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

$query = 'SELECT id, reportID, url, type, errorCount, created, creator, lastModifiedBy, lastModified, platform from CrawlError';
$statement = $db->prepare($query);
$statement->bindValue('id', 'reportID', 'url', 'type', 'errorCount', 'created', 'creator', 'lastModifiedBy', 'lastModified', 'platform');
$statement->execute();
$rows = $statement->fetchAll();
var_dump($rows); */

$con=mysqli_connect("localhost","root","JamesBondAgent007","SEO");
// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
} else {
  echo "Connected successfully <br> <br>";
}

$URL = $_POST['URL'];

$sql="SELECT * FROM CrawlError WHERE url = '$URL'";
$result=mysqli_query($con,$sql);

//$row=mysqli_fetch_array($result,MYSQLI_ASSOC);
//var_dump($row);

//echo "<br> <br>";

// Fetch all
$rows=mysqli_fetch_all($result,MYSQLI_ASSOC);
//var_dump($rows); //test statement

if (file_exists("file.csv")) { //if file exists and has write permission, write out to that file.

echo "<br> file exists <br>";
echo "<br> writing to file <br>";

$fp = fopen('file.csv', 'w');

foreach ($rows as $fields) {
    fputcsv($fp, $fields);
}

fclose($fp);

}

else { //if file doesn't exist and doesn't have write permission. Create that file and add write permissions.

echo "<br> file doesn't exist, Please note: PHP needs write access to the folder to create the file. <br>";
echo "<br> attempting to create file & add write permissions <br>";

touch("file.csv");
chmod("file.csv",0777);

echo "<br> Attempting to write to the file <br> ";

$fp = fopen('file.csv', 'w');

foreach ($rows as $fields) {
    fputcsv($fp, $fields);

}

fclose($fp);

}

/*
$fp = fopen('file.csv', 'w');

foreach ($rows as $fields) {
    fputcsv($fp, $fields);
}

fclose($fp); */

// Free result set
//mysqli_free_result($result);

mysqli_close($con);

?>

</body>
</html>

