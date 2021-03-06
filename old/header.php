<?php

$url = parse_url(getenv("CLEARDB_DATABASE_URL"));
$server = $url["host"];
$username = $url["user"];
$password = $url["pass"];
$db = substr($url["path"], 1);

$conn = new mysqli($server, $username, $password, $db);
if ($conn->connect_errno) { /*fail quietly*/ echo "<!--conn fail:" . $conn->connect_error . "-->\n";  }
else {
	if ($conn->query("INSERT INTO `views` (ip, useragent, page) VALUES ('" . (getenv('HTTP_CLIENT_IP')?:getenv('HTTP_X_FORWARDED_FOR')?:getenv('HTTP_X_FORWARDED')?:getenv('HTTP_FORWARDED_FOR')?:getenv('HTTP_FORWARDED')?:getenv('REMOTE_ADDR')?:"UNKNOWN") . "', '" . $_SERVER['HTTP_USER_AGENT'] . "', '" . $_SERVER['PHP_SELF'] . "')") === TRUE) {
		//congrats
	}
	else {
		/*fail quietly*/ echo "<!--query fail:" . $conn->error . "-->\n";
	}
}
$conn->close();

?>
<!DOCTYPE html>
<html>
	<head>
		<title>Panettiere | Loaves of Love</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<!--[if lte IE 8]><script src="assets/js/ie/html5shiv.js"></script><![endif]-->
		<link rel="stylesheet" href="assets/css/main.css" />
		<!--[if lte IE 9]><link rel="stylesheet" href="assets/css/ie9.css" /><![endif]-->
		<!--[if lte IE 8]><link rel="stylesheet" href="assets/css/ie8.css" /><![endif]-->
		<link rel="icon" href="images/favicon.ico">
	</head>
	<body>

		<!-- Page Wrapper -->
			<div id="page-wrapper">

				<!-- Nav bar -->
					<div id="nav">
						<h1><a href="http://www.panettiere.ml/"><img src="images/logo3.png" class="logo"></a></h1>
						<nav>
							<a href="#menu">Pages</a>
						</nav>
					</div>

				<!-- Menu -->
					<nav id="menu">
						<div class="inner">
							<h2>Pages</h2>
							<ul class="links">
								<li><a href="/">Home</a></li>
								<li><a href="/about.php">About Us</a></li>
								<li><a href="/menu.php">Menu</a></li>
								<li><a href="#footer">Reservations</a></li>
								<li><a href="/rewards.php">Loyalty Program</a></li>
								<li><a href="/reviews.php">Reviews</a></li>
							</ul>
							<a href="#" class="close">Close</a>
						</div>
					</nav>
