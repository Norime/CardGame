<html>
<head>
  <title>	PHP - Exemple n°6	</title>
</head>
<body>
<h1 align=center> PHP - Exemple n°6 </h1>
<h2 align=center> Consultation d'une Base de Données <br>
par un Programme sur le Serveur </h2>
<center> Cette page est générée par un programme PhP exécuté sur le serveur </center>
<hr><br>

<!	Envoyer l'entête d'un tableau HTML	!>
<!	avec une ligne de titres rappelant le nom des champs de la table de la base de données	!>
<head><center>
<table border>
<caption> <b> Personnes </b> </caption>
<tr> <th> Nom </th> <th> Prénom </th> <th> Téléphone </th> </tr>

<?php
  //--- Connection au SGBDR 
  $DataBase = mysqli_connect ( "localhost" , "root" , "" ) ;

  //--- Ouverture de la base de données
  mysqli_select_db ( $DataBase, "BD_Personnes" ) ;

  //--- Préparation de la requête
  $Requete = "Select * From personne ;" ;
    
  //--- Exécution de la requête (fin du script possible sur erreur ...)
  $Resultat = mysqli_query ( $DataBase, $Requete )  or  die(mysqli_error($DataBase) ) ;

  //--- Enumération des lignes du résultat de la requête
  while (  $ligne = mysqli_fetch_array($Resultat)  )
  {
    //--- Afficher une ligne du tableau HTML pour chaque enregistrement de la table 
    echo "<tr>\n" ;
    echo "<td>" . $ligne['Nom']       . "</td>\n" ;
    echo "<td>" . $ligne['Prenom']    . "</td>\n" ;
    echo "<td>" . $ligne['Telephone'] . "</td>\n" ;
    echo "</tr>\n" ;
  }

   
  //--- Libérer l'espace mémoire du résultat de la requête
  mysqli_free_result ( $Resultat ) ;

  //--- Déconnection de la base de données
  mysqli_close ( $DataBase ) ;  
?>

<!	Envoyer la fin du tableau HTML	!>
</table>
</center>

<br>
Ce programme n'a pas de paramètres.
<br>
Vérifiez que les informations contenues dans cette page HTML correspondent
aux enregistrements de la table 'Personnes' dans la base de données.
<br><br>
<hr>
</BODY>
</HTML>
