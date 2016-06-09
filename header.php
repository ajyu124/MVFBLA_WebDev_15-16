<?php
date_default_timezone_set('America/Los_Angeles');

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

$open = false;
$time = intval(date("Hi"));
switch (date("w")) {
	case "0":
	case "6":
		if (($time >= 630 && $time <= 1400) || ($time >= 1700 && $time <= 2300))
			$open = true;
		break;
	default:
		if (($time >= 530 && $time <= 1400) || ($time >= 1700 && $time <= 2130))
			$open = true;
		break;
}

function aip($id) {
	if (isset($page) && $page == $id) {
		echo " class='active'";
	}
}
?>
<!DOCTYPE html>
<html>
	<head>
		<title><?php if (!isset($page)) { ?>Panettiere: Loaves of Love<?php } else {
				switch ($page) {
					case 2:
						echo "About Us";
						break;
					case 3:
						echo "Menu";
						break;
					case 4:
						echo "Reservations";
						break;
					case 5:
						echo "Loyalty Program";
						break;
					case 6:
						echo "Reviews";
						break;
					case 7:
						echo "Your Order";
						break;
				}
				echo " | Panettiere";
			} ?></title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<link rel="stylesheet" href="/style.css" />
		<link rel="icon" href="/images/brand/favicon.ico">
	</head>
	<!--<?php echo $page; aip(2); ?>-->
	<body>
		<div id="nav">
			<div class="container">
				<a href="/"><img src="/images/brand/logo.png" class="logo"></a>
				<nav id="nav-bar">
					<a href="/about.php"<?php aip(2); ?>><h6 class="plain">About</h6></a>
					<a href="/menu.php"<?php aip(3); ?><?php aip(7); ?>><h6 class="plain">Menu</h6></a>
					<a href="/reservations.php"<?php aip(4); ?>><h6 class="plain">Reserve</h6></a>
					<a href="/loyalty.php"<?php aip(5); ?>><h6 class="plain">Rewards</h6></a>
					<a href="/reviews.php"<?php aip(6); ?>><h6 class="plain">Reviews</h6></a>
				</nav>
				<nav id="nav-pages">
					<a href="#pages">Pages</a>
				</nav>
			</div>
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
