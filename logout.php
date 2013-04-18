<?php
 
/*=============================================================
  File: logout.php
  Projekt im Rahmen des Programmiertechnik Unterrichts der 2BKI2
  Thema: Anschaffungsdatenbank
  Autor: Tanja Weiser
==============================================================*/

session_start();
$_SESSION = array(); // session mit leerem array füllen
header("Refresh:5;url=login.php"); // Weiterleitung zur login.php nah 5sek
?>

<html>

<head><title>Logout</title>
	  <link rel="stylesheet" type="text/css" href="css/db.css">
</head>
<body>
	<form action="save.php" method="post">
<div>	
<text>Sie werden nun ausgeloggt und automatisch zum Login weitergeleitet...</text><br>
</div>
</body>
</html>

