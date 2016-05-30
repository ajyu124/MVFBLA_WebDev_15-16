<?php
//CREATE TABLE `items` ( `id` INT NOT NULL AUTO_INCREMENT , `timestamp` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP , `type` VARCHAR(15) NOT NULL , `name` TEXT NULL , `contact` TEXT NULL , `message` TEXT NULL , PRIMARY KEY (`id`));
if (isset($_POST["submit"])) {
	$type = $_POST["type"];
	$name = "";
	$contact = "";
	$message = "";
	switch ($type) {
		case "contact":
			$name = $_POST["name"];
			$contact = $_POST["email"];
			$message = $_POST["message"];
			break;
		case "review":
			$name = $_POST["s_name"];
			$contact = $_POST["s_email"];
			$message = $_POST["s_review"];
			break;
		case "reservation":
			$name = $_POST["r_name"];
			$contact = $_POST["r_email"] . "\n" . $_POST["r_phone"];
			$message = "Guests: " . $_POST["r_guests"] . "\nWhen: " . $_POST["r_date"] . " " . $_POST["r_time"] . "\nTable: " . $_POST["r_table"];
			break;
	}

	$url = parse_url(getenv("CLEARDB_DATABASE_URL"));

	$server = $url["host"];
	$username = $url["user"];
	$password = $url["pass"];
	$db = substr($url["path"], 1);

	$conn = new mysqli($server, $username, $password, $db);
	if ($conn->connect_errno) { /*fail quietly*/ }
	else {
		$conn->query("INSERT INTO items (type, name, contact, message) VALUES ('$type', '$name', '$contact', '$message')");
	}
	$conn->close();
}
?>
