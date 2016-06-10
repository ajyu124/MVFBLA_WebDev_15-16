<?php
require_once("header.php");
?>
<header class="window half" id="windowHome">
	<div class="container">
		<h2>Admin Panel</h2>
		<p>View logs, check messages, update pages, and collect reservations.</p>
	</div>
</header>
<div class="container">
	<div class="row">
		<div class="columns twelve">
			<h4>Messages</h4>
			<div class="table-wrapper">
				<table>
					<thead>
						<tr><th>id</th><th>time</th><th>name</th><th>email</th><th>message</th></tr>
					</thead>
					<tbody>
<?php
if ($result = $conn->query("SELECT * FROM `items` WHERE `type`='contact' ORDER BY `id` DESC LIMIT 20")) {
	while ($row = $result->fetch_array()) {
		echo "<tr>";
		echo "<td>" . $row['id'] . "</td>";
		echo "<td>" . $row['timestamp'] . "</td>";
		echo "<td>" . $row['name'] . "</td>";
		echo "<td>" . str_replace("\n", "<br>", $row['contact']) . "</td>";
		echo "<td>" . str_replace("\n", "<br>", $row['message']) . "</td>";
		echo "</tr>";
	}
    $result->close();
}
else {
	echo $conn->error;
}
?>
					</tbody>
				</table>
			</div>
			<h4 class="pushtop">Orders</h4>
			<div class="table-wrapper">
				<table>
					<thead>
						<tr><th>id</th><th>time</th><th>token</th><th>email</th><th>order</th></tr>
					</thead>
					<tbody>
<?php
if ($result = $conn->query("SELECT * FROM `items` WHERE `type`='order' ORDER BY `id` DESC LIMIT 20")) {
	while ($row = $result->fetch_array()) {
		echo "<tr>";
		echo "<td>" . $row['id'] . "</td>";
		echo "<td>" . $row['timestamp'] . "</td>";
		echo "<td>" . $row['name'] . "</td>";
		echo "<td>" . $row['contact'] . "</td>";
		echo "<td>" . str_replace("\n", "<br>", $row['message']) . "</td>";
		echo "</tr>";
	}
    $result->close();
}
else {
	echo $conn->error;
}
?>
					</tbody>
				</table>
			</div>
			<h4 class="pushtop">Reviews</h4>
			<div class="table-wrapper">
				<table>
					<thead>
						<tr><th>id</th><th>time</th><th>name</th><th>email</th><th>review</th></tr>
					</thead>
					<tbody>
<?php
if ($result = $conn->query("SELECT * FROM `items` WHERE `type`='review' ORDER BY `id` DESC LIMIT 20")) {
	while ($row = $result->fetch_array()) {
		echo "<tr>";
		echo "<td>" . $row['id'] . "</td>";
		echo "<td>" . $row['timestamp'] . "</td>";
		echo "<td>" . $row['name'] . "</td>";
		echo "<td>" . str_replace("\n", "<br>", $row['contact']) . "</td>";
		echo "<td>" . str_replace("\n", "<br>", $row['message']) . "</td>";
		echo "</tr>";
	}
    $result->close();
}
else {
	echo $conn->error;
}
?>
					</tbody>
				</table>
			</div>
			<h4 class="pushtop">Reservations</h4>
			<div class="table-wrapper">
				<table>
					<thead>
						<tr><th>id</th><th>time</th><th>name</th><th>contact</th><th>reservation</th></tr>
					</thead>
					<tbody>
<?php
if ($result = $conn->query("SELECT * FROM `items` WHERE `type`='reservation' ORDER BY `id` DESC LIMIT 20")) {
	while ($row = $result->fetch_array()) {
		echo "<tr>";
		echo "<td>" . $row['id'] . "</td>";
		echo "<td>" . $row['timestamp'] . "</td>";
		echo "<td>" . $row['name'] . "</td>";
		echo "<td>" . str_replace("\n", "<br>", $row['contact']) . "</td>";
		echo "<td>" . str_replace("\n", "<br>", $row['message']) . "</td>";
		echo "</tr>";
	}
    $result->close();
}
else {
	echo $conn->error;
}
?>
					</tbody>
				</table>
			</div>
			<h4 class="pushtop">404s</h4>
			<div class="table-wrapper">
				<table>
					<thead>
						<tr><th>id</th><th>time</th><th>ip</th><th>page</th></tr>
					</thead>
					<tbody>
<?php
if ($result = $conn->query("SELECT * FROM `items` WHERE `type`='404' ORDER BY `id` DESC LIMIT 20")) {
	while ($row = $result->fetch_array()) {
		echo "<tr>";
		echo "<td>" . $row['id'] . "</td>";
		echo "<td>" . $row['timestamp'] . "</td>";
		echo "<td>" . $row['name'] . "</td>";
		echo "<td>" . str_replace("\n", "<br>", $row['message']) . "</td>";
		echo "</tr>";
	}
    $result->close();
}
else {
	echo $conn->error;
}
?>
					</tbody>
				</table>
			</div>
			<h4 class="pushtop">Views</h4>
			<div class="table-wrapper">
				<table>
					<thead>
						<tr><th>id</th><th>time</th><th>ip</th><th>useragent</th><th>page</th></tr>
					</thead>
					<tbody>
<?php
if ($result = $conn->query("SELECT * FROM `views` ORDER BY `id` DESC LIMIT 50")) {
	while ($row = $result->fetch_array()) {
		echo "<tr>";
		echo "<td>" . $row['id'] . "</td>";
		echo "<td>" . $row['time'] . "</td>";
		echo "<td>" . $row['ip'] . "</td>";
		echo "<td>" . $row['useragent'] . "</td>";
		echo "<td>" . $row['page'] . "</td>";
		echo "</tr>";
	}
    $result->close();
}
else {
	echo $conn->error;
}
?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>
<?php
$conn->close();
require_once("footer.php");
?>
