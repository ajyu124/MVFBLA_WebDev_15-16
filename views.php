<?php
$url = parse_url(getenv("CLEARDB_DATABASE_URL"));
$server = $url["host"];
$username = $url["user"];
$password = $url["pass"];
$db = substr($url["path"], 1);

$conn = new mysqli($server, $username, $password, $db);
if ($conn->connect_errno) {
    printf("Connect failed: %s\n", $mysqli->connect_error);
    exit();
}
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
<section id="wrapper">
	<header id="headerRewards">
		<div class="inner">
			<h2>Admin Panel</h2>
			<p>View messages and page logs</p>
		</div>
	</header>

	<!-- Content -->
		<div class="wrapper">
			<div class="inner">
<?php
if ($result = $conn->query("SELECT * FROM `messages` ORDER BY `id` DESC")) {
    printf("<h3 class='major'>Messages (%d)</h3>", $result->num_rows);

    echo "<table border=1>";
	echo "<tr><th>id</th><th>time</th><th>name</th><th>email</th><th>message</th></tr>";
	while ($row = $result->fetch_array()) {
		echo "<tr>";
		echo "<td>" . $row['id'] . "</td>";
		echo "<td>" . $row['time'] . "</td>";
		echo "<td>" . $row['name'] . "</td>";
		echo "<td>" . $row['email'] . "</td>";
		echo "<td>" . $row['message'] . "</td>";
		echo "</tr>";
	}
	echo "</table>";
    /* free result set */
    $result->close();
}
else {
	echo $conn->error;
}
?>
				<br>
<?php
if ($result = $conn->query("SELECT * FROM `views` ORDER BY `id` DESC")) {
    printf("<h3 class='major'>Pageviews (%d)</h3>", $result->num_rows);

    echo "<table border=1>";
	echo "<tr><th>id</th><th>time</th><th>ip</th><th>useragent</th><th>page</th></tr>";
	while ($row = $result->fetch_array()) {
		echo "<tr>";
		echo "<td>" . $row['id'] . "</td>";
		echo "<td>" . $row['time'] . "</td>";
		echo "<td>" . $row['ip'] . "</td>";
		echo "<td>" . $row['useragent'] . "</td>";
		echo "<td>" . $row['page'] . "</td>";
		echo "</tr>";
	}
	echo "</table>";
    /* free result set */
    $result->close();
}
else {
	echo $conn->error;
}
?>
			</div>
		</div>
</section>
<?php
$conn->close();
?>
</body></html>