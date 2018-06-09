<html>
<head>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title> SEOReport </title>
<style>

div {

	height: 100%;
	width: 50%;
	margin: 0 auto;
	background-color: white;
}

body {
	background-image: url("./images/background.png");
}

p {

font-size: large;

}

</style>
</head>
<body>
<div align="center">
<img class="img-responsive" src="./images/Reich-Web-Consulting-Logo.png">

<?php
session_start();

if (isset($_SESSION['username'])) {

echo " <br> Welcome, " . $_SESSION["username"] . "<br> <br>";

} else {

echo "Session variable not set, please login";

$redirect_uri = 'http://' . $_SERVER['HTTP_HOST'] . '/index.html';
header('Location: ' . filter_var($redirect_uri, FILTER_SANITIZE_URL));

}

?>

<a href="./index.html" type="button" class="btn-lg btn-success">Home</a>
<a href="./logout.php" type="button" class="btn-lg btn-success">Logout</a>

<br>
<br>

<h4> Generate Report </h4>
<form action="generateReport.php" method="post">
Filename: <input type="text" name="FileName" value="report.csv"><br>
<p> Default filename is report.csv </p>
</form>


<h4> List Crawl Errors Request </h4>
<p> This will request crawlerror data if exists & display it </p>
<form action="listCrawlErrors.php" method="post">
Website URL: <input type="text" name="URL"><br>
<input type="submit">
</form>

<h4> Crawl Errors Data Request </h4>
<form action="crawlerrors.php" method="post">
Website URL: <input type="text" name="URL"><br>
<p> all requests must include a forward / after the URL i.e. http://example.com/ </p>
<p> This is a full data request, this might take a while. You might also be redirected to authenticate with google oauth. </p>
<input type="submit">
</form>

<h4> Create CSV Request </h4>
<form action="createCSV.php" method="post">
Website URL: <input type="text" name="URL"><br>
<p> This is a request to create a .csv file for a specific website's crawlerrors. </p> 
Filename: <input type="text" name="FileName" value="file.csv"><br>
<p> Default filename is file.csv </p> 
<input type="submit">
</form>

<br>
<br>

</div>
</body>
</html>
