<?php

  try {
    //Connexion à la base de données
    $base = new PDO('mysql:host=localhost; dbname=memorygame', 'root', '');
    //Requète permettant de rechercher dans la base de données le meilleur temps
    $reponse = $base->query('SELECT ScoreTime FROM score ORDER BY ScoreTime ASC LIMIT 1;');
    while ($donnees = $reponse->fetch())
    {
      //Affichage du meilleur temps
    	echo $donnees['ScoreTime'] . '<br />';
    }

    // On teste si on reçoit la variable score du post de la fonction ajax
    if (isset($_POST['score']))
      {
        $score=$_POST['score'];
        //Insertion dans la base de données du score du joueur si il gagne
        $reponseInsert = $base->query("INSERT INTO score (ScoreTime) VALUES ('$score')");
      }

  }

  //Gestion des erreurs
  catch(exception $e) {
    die('Erreur '.$e->getMessage());
  }


?>
