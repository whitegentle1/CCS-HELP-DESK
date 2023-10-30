<?php
session_start();
include("connection/db.php");
include("func/func.php");

$user_data = check_login($conn);
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
</head>
<body>
	Hello World
</body>
</html>