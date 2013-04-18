<html>

<!--============================================================
  File: save.php
  Projekt im Rahmen des Programmiertechnik Unterrichts der 2BKI2
  Thema: Anschaffungsdatenbank
  Autor: Tanja Weiser
================================================================-->

<!--+++++++++++++++++++++++++++++++++++++++++
	++++++++++++++ MENÜ ANFANG ++++++++++++++
    +++++++++++++++++++++++++++++++++++++++++-->

<head><title>Bestand | Anschaffung</title>
		<link rel="stylesheet" type="text/css" href="css/db.css">
</head>
<body>
<center>
<h1>Bestand | Anschaffung</h1>
</center>
<br>
<div class="menu">
<ul id="navi">
<li>
<a href="change.php" title="change" id="">&auml;ndern</a>
<li>
<a href="delete.php" title="delete" id="">l&ouml;schen</a>
</li>
<li>
<a href="entry.php" title="entry" id="">eintragen</a>
</li>
<li>
<a href="search.php" title="search" id="">suchen</a>
</li>
<li>
<a href="save.php" title="save" id="akt">speichern</a>
</li>
<li>
<a href="logout.php" title="logout" id="">logout</a>
</li>
</ul>
</div>
<br><br><br>

<!--+++++++++++++++++++++++++++++++++++++++++
	++++++++++++++ MENÜ ENDE ++++++++++++++++
    +++++++++++++++++++++++++++++++++++++++++-->

 <form action="save.php" method="post">


<div class="links"> 
	<div align="right">

<?php

//######################      KLASSEN      ######################

require_once 'class/db.class.php'; 
require_once 'class/product.class.php';

//###############################################################

$result = new db(); // neues Objekt erstellen
$result -> connect('localhost', 'anschaffung', 'root', 'root'); //Verbindungsaufbau, pw Laptop: root, pw Schule: server
$result -> query("SELECT * FROM ressourcen"); // auslesen der Tabelle 'ressourcen'
$result -> showTable('ressourcen'); // Anzeigen der Tabelle 'ressourcen' in einer Tabelle
$product = new product($result);

if(isset($_POST['save'])) {
	$name = $_POST['name'];
	$product -> saveList('ressourcen', $name);
}


$result -> disconnect(); // Verbindung zur DB trennen

?> 
	</div>
</div>
<div class="rechts">	
<table>
<!-- Eintrag löschen / ändern-->
<table>
<tr>
<td>&nbsp;&nbsp;&nbsp;<text>Liste Speichern:</text></td>
</tr>
<tr>
<td>&nbsp;&nbsp;&nbsp;<input type="text" name="name" placeholder="Listenname">
</td>
<td><input type="submit" name="save" value="speichern" class="button-change"></td>
</table><br>


</div>
</body>
</html>

