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
		<link rel="stylesheet" href="/style.css" />
		<link rel="icon" href="/images/favicon.ico">
	</head>
	<body>
		<div id="nav">
			<a href="/"><img src="/images/logo3.png" class="logo"></a>
			<nav>
				<a href="#pages">Pages</a>
			</nav>
		</div>
		<nav id="pages" style="display: none">
			<div class="inner">
				<h2>Pages</h2>
				<ul class="links">
					<!-- todo: / -->
					<li><a href="/">Home</a></li>
					<li><a href="/about.php">About Us</a></li>
					<li><a href="/menu.php">Menu</a></li>
					<li><a href="/reservations.php">Reservations</a></li>
					<li><a href="/loyalty.php">Loyalty Program</a></li>
					<li><a href="/reviews.php">Reviews</a></li>
				</ul>
				<a href="#" class="close">Close</a>
			</div>
		</nav>
