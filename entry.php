<html>

<!--============================================================
  File: entry.php
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
<a href="entry.php" title="entry" id="akt">eintragen</a>
</li>
<li>
<a href="search.php" title="search" id="">suchen</a>
</li>
<li>
<a href="save.php" title="save" id="">speichern</a>
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
 <form action="entry.php" method="post">

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

if(isset($_POST['insert'])) {
	$id = $_POST['ID'];
	$produkt = $_POST['produkt'];
	$bestand = $_POST['bestand'];
	$bestellen = $_POST['bestellen'];
	$product -> insertEntry('ressourcen', $produkt, $bestand, $bestellen);
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
<td>&nbsp;&nbsp;&nbsp;<text>Eintrag erstellen:</text></td>
</tr>
<tr>
<td>&nbsp;&nbsp;&nbsp;<input type="text" name="produkt" placeholder="Produktname"></td>
</tr>
<tr>
<td>&nbsp;&nbsp;&nbsp;<input type="text" name="bestand" placeholder="Bestand"></td>
<td>&nbsp;&nbsp;&nbsp;<input type="submit" name="insert" value="eintragen" class="button-change"></td>
</tr>
<tr>
<td>&nbsp;&nbsp;&nbsp;<input type="text" name="bestellen" placeholder="Bestellen"></td>
</tr>
</table><br>


</div>
</body>
</html>


