<?php


session_start();
$var_value = $_SESSION['varname'];
/* $var_value = $_SESSION['$_POSt[name]']; */

/* echo "<script type= 'text/javascript'>alert(varname);</script>"; */
/* echo $donnees['difficulty']; */

var_dump($_SESSION);
?>
<?php
if(isset($_POST['name'])){
    

    try {
		$conn = new PDO('mysql:host=localhost;dbname=hikingdb;charset=utf8', 'root', '');
		

		$data = [
			'name' => $_POST['name'],
			'difficulty' => $_POST['difficulty'],
			'distance' => $_POST['distance'],
			'duration' => $_POST['duration'],
			'height_difference' => $_POST['height_difference'],
		];
		$sql = "UPDATE hiking SET name=:name, difficulty=:difficulty, distance=:distance, duration=:duration, height_difference=:height_difference WHERE name=:name";
		$stmt= $conn->prepare($sql);
		$stmt->execute($data);
		echo "<script type= 'text/javascript'>alert('Record Updated Successfully');</script>";







		$data4 = "select * from hikingdb where ID = 100";

		$query = mysql_query($data4);
		
		$data2 = mysql_fetch_array($query);






	} 
	catch (PDOException $e) {
        echo $e->getMessage();
        exit;
    }

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
			<input type="text" name="name" value="<?php echo $_SESSION['varname'] ?>"/>

		
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
			<input type="duration" name="duration" value="">
		</div>
		<div>
			<label for="height_difference">Dénivelé</label>
			<input type="text" name="height_difference" value="">
		</div>
		<button type="submit" name="button">Envoyer</button>
	</form>
</body>
</html>
