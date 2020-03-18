<?php
if(isset($_POST['name'])){
    /* require_once("read.php"); */

    try {
        $conn = new PDO('mysql:host=localhost;dbname=hikingdb;charset=utf8', 'root', '');
    } catch (PDOException $e) {
        echo $e->getMessage();
        exit;
    }

    $q = $conn->prepare("INSERT INTO hiking (name, difficulty, distance, duration, height_difference) VALUES (:name, :difficulty, :distance, :duration, :height_difference)");
	$q->execute(array(':name'=>$_POST['name'], ':difficulty'=>$_POST['difficulty'], ':distance'=>$_POST['distance'], ':duration'=>$_POST['duration'], ':height_difference'=>$_POST['height_difference']) );


	/* $q = "INSERT INTO hiking (name, difficulty, distance, duration, height_difference)
VALUES ('".$_POST["name"]."','".$_POST["difficulty"]."','".$_POST["distance"]."')";
	$q->execute(array(':name'=>$_POST['name'])); */

	echo 'success'; 
	echo "<script type= 'text/javascript'>alert('New Record Inserted Successfully');</script>";
}

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Ajouter une randonnée</title>
	<link rel="stylesheet" href="css/basics.css" media="screen" title="no title" charset="utf-8">
</head>
<body>
	<a href="/Hiking/read.php">Liste des données</a>
	<h1>Ajouter</h1>
	<form action="" method="post">
		<div>
			<label for="name">Name</label>
			<input type="text" name="name" value="">
		</div>

		<div>
			<label for="difficulty">Difficulté</label>
			<select name="difficulty">
				<option value="très facile">Très facile</option>
				<option value="facile">Facile</option>
				<option value="moyen">Moyen</option>
				<option value="difficile">Difficile</option>
				<option value="très difficile">Très difficile</option>
			</select>
		</div>

		<div>
			<label for="distance">Distance</label>
			<input type="text" name="distance" value="">
		</div>
		<div>
			<label for="duration">Durée</label>
			<input type="time" name="duration" value="">
		</div>
		<div>
			<label for="height_difference">Dénivelé</label>
			<input type="text" name="height_difference" value="">
		</div>
		<button type="submit" name="button">Envoyer</button>
	</form>
</body>
</html>
