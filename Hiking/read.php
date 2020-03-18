<?php


session_start();
$var_value = clickedId;
$_SESSION['varname'] = $var_value;

?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Randonnées</title>
    <link rel="stylesheet" href="css/basics.css" media="screen" title="no title" charset="utf-8">
    <style>
      table, th, td {
        border: 1px solid black;
        border-collapse: collapse;
      }
    </style>
  </head>
  <body>
    <h1>Liste des randonnées</h1>
    <table>
        <?php
          try
          {
            // On se connecte à MySQL
            $bdd = new PDO('mysql:host=localhost;dbname=hikingdb;charset=utf8', 'root', '');
          
          }
          catch(Exception $e)
          {
            // En cas d'erreur, on affiche un message et on arrête tout
                  die('Erreur : '.$e->getMessage());
          }

          $reponse = $bdd->query('SELECT * FROM hiking');

          while ($donnees = $reponse->fetch())
          {
          ?>
            <tr>
              <td>Nom</td>
              <td>Difficulté</td>
              <td>Distance</td>
              <td>Duration</td>
              <td>Dénivelé</td>
            </tr>
            <tr>
              <td id='<?php echo $donnees['id']; ?>' onClick="reply_click(this.id)"><a href="/Hiking/update.php"><?php echo $donnees['name']; ?></a><br></td>      
              <td><?php echo $donnees['difficulty']; ?><br></td>
              <td><?php echo $donnees['distance']; ?><br></td>
              <td><?php echo $donnees['duration']; ?><br><br></td>
              <td><?php echo $donnees['height_difference']; ?></td>
            </tr>
          <?php
          }
          $reponse->closeCursor(); // Termine le traitement de la requête

          ?>
    </table>
    <script type="text/javascript">
      function reply_click(clicked_id)
      {
          let clickedId = clicked_id;
          /* alert(clickedId); */

          
      }
    </script>
  </body>
</html>
