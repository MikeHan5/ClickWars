<?php

$db = mysqli_connect('localhost', 'root', 'Phantom123!') or die(mysql_connect_error());

mysqli_select_db($db, 'ClickWars') or die(myslqi_connect_error());
$view = mysqli_query($db, "SELECT * FROM counter") or die(mysqli_error($db));

while($record = mysqlI_fetch_row($view)){
	foreach ($record as $field) {
		echo "<p class='count'>" . $field . "</p>" ;
	}
}
?>

<form action="count.php" method="POST">
	<input type="submit" name="add" value="add" />
	<input type="submit" name="minus" value="minus" />
</form>