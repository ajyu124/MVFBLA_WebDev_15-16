<?php
//CREATE TABLE `items` ( `id` INT NOT NULL AUTO_INCREMENT , `timestamp` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP , `type` VARCHAR(15) NOT NULL , `name` TEXT NULL , `contact` TEXT NULL , `message` TEXT NULL , PRIMARY KEY (`id`));
if (isset($_POST["submit"])) {
	$type = $_POST["type"];
	$name = $_POST["name"];
	$contact = $_POST["email"];
	$message = "";
	switch ($type) {
		case "contact":
		case "review":
		case "order":
			$message = $_POST["message"];
			break;
		case "reservation":
			$contact .= "\n" . $_POST["phone"];
			$message = "Guests: " . $_POST["guests"] . "\nWhen: " . $_POST["date"] . " " . $_POST["time"] . "\nTable: " . $_POST["table"];
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
