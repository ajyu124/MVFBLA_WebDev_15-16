<?php
if (isset($_POST["submit"])) {
	$name = $_POST["name"];
	$email = $_POST["email"];
	$message = $_POST["message"];

	$url = parse_url(getenv("CLEARDB_DATABASE_URL"));

	$server = $url["host"];
	$username = $url["user"];
	$password = $url["pass"];
	$db = substr($url["path"], 1);

	$conn = new mysqli($server, $username, $password, $db);
	if ($conn->connect_errno) { /*fail quietly*/ }
	else {
		$conn->query("INSERT INTO messages (name, email, message) VALUES ('$name', '$email', '$message')");
	}
	$conn->close();
}
?>