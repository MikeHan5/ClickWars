<link rel="stylesheet" href="style.css">

<img src="img/logo.png" class="logo"/>
<p class="mainText">
	Click + or - !<br>
	Higher it goes better picture/videos show up.<br>
	Lower it goes gross and annoying picture/videos show up.<br>
	Let's see what you guys vote for!<br>
	<span class="disclaimer">Some of these images are very disturbing. You have been warned. We will not be resposible for any mental or physical damages caused by our website.</span>
</p>

<?php

$db = mysqli_connect('localhost', 'root', 'Phantom123!') or die(mysql_connect_error());

mysqli_select_db($db, 'ClickWars') or die(myslqi_connect_error());
$view = mysqli_query($db, "SELECT * FROM counter") or die(mysqli_error($db));

$imagesDir = 'Img/good/';

$images = glob($imagesDir . '*.{jpg,jpeg,png,gif}', GLOB_BRACE);

$randomImage = $images[array_rand($images)]; // See comments

while($record = mysqlI_fetch_row($view)){
	foreach ($record as $field) {
		echo "<p class='count'>" . $field . "</p>" ;
?>
<div class="buttons">
	<form action="count.php" method="POST">
		<input type="submit" class="add" name="add" value="+" />
		<input type="submit" class="minus" name="minus" value="-" />
	</form>
</div>
<?php
		if($field >= 10 && $field <= 19){
			echo "<img class='picture' src='Img/good/good01.jpg'/>";
		}
		else if($field >= 20 && $field <= 49){
			echo "<img class='picture' src='Img/good/good02.jpg'/>";
		}
		else if($field >= 50 && $field <= 99){
			echo "<img class='picture' src='Img/good/good03.jpg'/>";
		}
		else if($field >= 100 && $field <= 999){
			echo "<iframe class='video' width='560' height='315' src='https://www.youtube.com/embed/JHOBhgjc1Jc' frameborder='0' allowfullscreen></iframe>";
		}
		else if($field >= 1000){
			echo "<iframe class='video' width='560' height='315' src='https://www.youtube.com/embed/8062vgof-qI' frameborder='0' allowfullscreen></iframe>";
		}
		else if($field <= -10 && $field >= -19){
			echo "<img class='picture' src='Img/bad/bad01.jpg'/>";
		}
		else if($field <= -20 && $field >= -49){
			echo "<img class='picture' src='Img/bad/bad02.jpg'/>";
		}
		else if($field <= -50 && $field >= -99){
			echo "<img class='picture' src='Img/bad/bad03.jpg'/>";
		}
		else if($field <= -100 && $field >= -999){
			echo "<iframe class='video' width='560' height='315' src='https://www.youtube.com/embed/D4rSeQ_Ny1U' frameborder='0' allowfullscreen></iframe>";
		}
		else if($field <= -1000){
			echo "<iframe class='video' width='560' height='315' src='https://www.youtube.com/embed/Coj5o2l_L0U' frameborder='0' allowfullscreen></iframe>";
		}
	}
}

