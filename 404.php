<?php
require_once("header.php");

$type = "404";
$name = getenv('HTTP_CLIENT_IP')?:getenv('HTTP_X_FORWARDED_FOR')?:getenv('HTTP_X_FORWARDED')?:getenv('HTTP_FORWARDED_FOR')?:getenv('HTTP_FORWARDED')?:getenv('REMOTE_ADDR')?:"UNKNOWN";
$contact = $name;
$message = $_SERVER["REQUEST_URI"];
if ($message != "/none")
	$conn->query("INSERT INTO items (type, name, contact, message) VALUES ('$type', '$name', '$contact', '$message')");
?>
<header class="window half" id="windowHome">
	<div class="container">
		<h2>404 Not Found</h2>
		<p>Error: Page not found</p>
	</div>
</header>
<div class="container">
	<div class="row">
		<div class="columns twelve">
			<p>The page you were looking for could not be found.</p>
			<p class="pushtop">However, if you were looking for delicious, savory dishes to satisfy your hunger, you can look through <a href="menu.php">Panettiere's menu</a> to choose something that your heart desires.</p>
			<p class="pushtop">Still lost? Click the Panettiere logo to go to the <a href="/">home page</a>. Use the contact form below if you believe something should be here.</p>
		</div>
	</div>
</div>
<?php
require_once("footer.php");
?>