<html>
<head>
  <title>	PHP - Exemple n�6	</title>
</head>
<body>
<h1 align=center> PHP - Exemple n�6 </h1>
<h2 align=center> Consultation d'une Base de Donn�es <br>
par un Programme sur le Serveur </h2>
<center> Cette page est g�n�r�e par un programme PhP ex�cut� sur le serveur </center>
<hr><br>

<!	Envoyer l'ent�te d'un tableau HTML	!>
<!	avec une ligne de titres rappelant le nom des champs de la table de la base de donn�es	!>
<head><center>
<table border>
<caption> <b> Personnes </b> </caption>
<tr> <th> Nom </th> <th> Pr�nom </th> <th> T�l�phone </th> </tr>

<?php
  //--- Connection au SGBDR 
  $DataBase = mysqli_connect ( "localhost" , "root" , "" ) ;

  //--- Ouverture de la base de donn�es
  mysqli_select_db ( $DataBase, "BD_Personnes" ) ;

  //--- Pr�paration de la requ�te
  $Requete = "Select * From personne ;" ;
    
  //--- Ex�cution de la requ�te (fin du script possible sur erreur ...)
  $Resultat = mysqli_query ( $DataBase, $Requete )  or  die(mysqli_error($DataBase) ) ;

  //--- Enum�ration des lignes du r�sultat de la requ�te
  while (  $ligne = mysqli_fetch_array($Resultat)  )
  {
    //--- Afficher une ligne du tableau HTML pour chaque enregistrement de la table 
    echo "<tr>\n" ;
    echo "<td>" . $ligne['Nom']       . "</td>\n" ;
    echo "<td>" . $ligne['Prenom']    . "</td>\n" ;
    echo "<td>" . $ligne['Telephone'] . "</td>\n" ;
    echo "</tr>\n" ;
  }

   
  //--- Lib�rer l'espace m�moire du r�sultat de la requ�te
  mysqli_free_result ( $Resultat ) ;

  //--- D�connection de la base de donn�es
  mysqli_close ( $DataBase ) ;  
?>

<!	Envoyer la fin du tableau HTML	!>
</table>
</center>

<br>
Ce programme n'a pas de param�tres.
<br>
V�rifiez que les informations contenues dans cette page HTML correspondent
aux enregistrements de la table 'Personnes' dans la base de donn�es.
<br><br>
<hr>
</BODY>
</HTML>
