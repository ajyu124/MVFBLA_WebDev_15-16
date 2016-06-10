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
	global $page;
	if (isset($page) && $page == $id)
		echo " class='active'";
}

if (isset($page)) {
	switch ($page) {
		case 2:
			$title = "About Us";
			break;
		case 3:
			$title = "Menu";
			break;
		case 4:
			$title = "Reservations";
			break;
		case 5:
			$title = "Loyalty Program";
			break;
		case 6:
			$title = "Reviews";
			break;
		case 7:
			$title = "Your Order";
			break;
	}
}
?>
<!DOCTYPE html>
<html>
	<head>
		<title><?php if (!isset($title)) { ?>Panettiere: Loaves of Love<?php } else { echo $title; ?> | Panettiere<?php } ?></title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<meta name="description" content="Panettiere is a modern-day bakery and restaurant that upholds a high standard of quality, healthy, and wholesome food. We bring the best quality gluten-free foods to the table without neglecting various dietary needs in today's society." />
		<meta property="og:site_name" content="Panettiere Restaurant & Bakery" />
		<meta property="og:title" content="<?php if (!isset($title)) { ?>Panettiere: Loaves of Love<?php } else { echo $title . " | Panettiere"; } ?>" />
		<meta property="og:description" content="Panettiere is a modern-day bakery and restaurant that upholds a high standard of quality, healthy, and wholesome food." />
		<meta property="og:type" content="website" />
		<meta property="og:url" content="https://panettiere.ml<?php if ($_SERVER['PHP_SELF'] != '/index.php') { echo $_SERVER['PHP_SELF']; } ?>" />
		<meta property="og:image" content="https://panettiere.ml/images/brand/icon_1.png" />
		<link rel="stylesheet" href="/style.css" />
		<link rel="icon" href="/images/brand/favicon.ico">
	</head>
	<body>
		<div id="nav">
			<div class="container">
				<a href="/"><img src="/images/brand/logo.png" class="logo"></a>
				<nav id="nav-bar">
					<a href="/about.php"<?php aip(2); ?>><h6 class="plain">About</h6></a>
					<a href="/menu.php"<?php aip(3); aip(7); ?>><h6 class="plain">Menu</h6></a>
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
