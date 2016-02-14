<html><body>
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

if ($result = $mysqli->query("SELECT * FROM views")) {
    printf("Select returned %d rows.\n", $result->num_rows);

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

$conn->close();
?>
</body></html>