<?php

	$db = mysqli_connect('localhost', 'root', 'Phantom123!') or die(mysql_connect_error());

	mysqli_select_db($db, 'ClickWars') or die(myslqi_connect_error());

	mysqli_query($db, "
	CREATE TABLE IF NOT EXISTS counter(
		count BIGINT NOT NULL PRIMARY KEY
	)") or die(mysqli_error($db));

	$view = mysqli_query($db, "SELECT * FROM counter") or die(mysqli_error($db));


	$add = $_POST['add'];
	$minus = $_POST['minus'];

	if(isset($add)){
		echo "Testing";
		mysqli_query($db, "UPDATE counter SET count = count + 1");
	}
	if(isset($minus)){
		echo "Testing Minus";
		mysqli_query($db, "UPDATE counter SET count = count - 1");
	}

	header( 'Location: http://localhost/ClickWars/index.php' ) ; 