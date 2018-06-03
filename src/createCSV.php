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

$sql="SELECT * FROM CrawlError";
$result=mysqli_query($con,$sql);

//$row=mysqli_fetch_array($result,MYSQLI_ASSOC);
//var_dump($row);

//echo "<br> <br>";

// Fetch all
$rows=mysqli_fetch_all($result,MYSQLI_ASSOC);
//var_dump($rows);

$fp = fopen('file.csv', 'w');

foreach ($rows as $fields) {
    fputcsv($fp, $fields);
}

fclose($fp);

// Free result set
//mysqli_free_result($result);

mysqli_close($con);

?>

</body>
</html>

