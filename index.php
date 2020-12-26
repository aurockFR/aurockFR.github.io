<?php
	session_start();

	if (isset($_POST['lvl'], $_POST['haste'])){
		$_SESSION['lvl'] = $_POST['lvl'];
		$_SESSION['haste'] = $_POST['haste'];
	}
?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<title>Scapulator</title>
	</head>

	<body>
		<form method="POST" action="scapulator.php">
			<label for="lvl">Effective Smithing Lvl</label>
			<input type="number" name="lvl" value="lvl" id="lvl"><br>

			<label for="haste">Haste percentage</label>
			<input type="number" name="haste" value="haste" id="haste"><br>

			<br>
			<input type="submit" name="goto" value="Go to Scapulator">
		</form>
	</body>
</html>