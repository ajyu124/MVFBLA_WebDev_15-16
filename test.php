<?php

echo $_SERVER['PHP_SELF'];
$v = "menu.php";

$name = "assets/js/" . substr($v, 0, -4) . ".js";
if (file_exists($name)) { ?>
<?php echo $name; ?>
} ?>