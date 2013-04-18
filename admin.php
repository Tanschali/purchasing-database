<html>

<!--============================================================
  File: admin.php
  Projekt im Rahmen des Programmiertechnik Unterrichts der 2BKI2
  Thema: Anschaffungsdatenbank
  Autor: Tanja Weiser
================================================================-->

<!--============================================================
  						MENÜ ANFANG
================================================================-->

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
<a href="logout.php" title="logout" id="">logout</a>
</li>
</ul>
</div>
<br><br><br>

<!--============================================================
						MENÜ ENDE
================================================================-->

 <form action="admin.php" method="post">

<div class="links"> 
	<div align="right">

<?php

/*=============================================================
						KLASSEN
==============================================================*/

require_once 'class/db.class.php'; 
require_once 'class/user.class.php';

/*=============================================================*/

$result = new db(); // neues Objekt erstellen
$result -> connect('localhost', 'anschaffung', 'root', 'root'); //Verbindungsaufbau, pw Laptop: root, pw Schule: server
$result -> query("SELECT * FROM user"); // auslesen der Tabelle 'ressourcen'
$result -> showUser('user'); // Anzeigen der Tabelle 'ressourcen' in einer Tabelle
$user = new user($result);

if(isset($_POST['insert'])) {
	$name = $_POST['name'];
	$passwd = $_POST['passwd'];
	$user -> insertUser('user', $name, $passwd);
}

if(isset($_POST['delete'])) { //deleteUser($table, $id)
	$id = $_POST['ID'];
	$user -> deleteUser('user', $id);
}

$result -> disconnect(); // Verbindung zur DB trennen

?> 
	</div>
</div>
<div class="rechts">	
<table>
<tr>
<td>&nbsp;&nbsp;&nbsp;<text>Benutzer hinzuf&uuml;gen</text></td>
</tr>
<tr>
<td>&nbsp;&nbsp;&nbsp;<input type="text" name="name" placeholder="Benutzername"></td>
</tr>
<tr>
<td>&nbsp;&nbsp;&nbsp;<input type="text" name="passwd" placeholder="Passwort"></td>
</tr>
<tr>
<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<input type="submit" name="insert" value="hinzuf&uuml;gen" class="button-change"></td>
</tr>
<tr><td></td></tr><tr><td></td></tr><tr><td></td></tr>
<tr>
<td>&nbsp;&nbsp;&nbsp;<text>Benutzer l&ouml;schen</text></td>
</tr>
<tr>
<td>&nbsp;&nbsp;&nbsp;<input type="text" name="ID" placeholder="ID des Benutzers"></td>
</tr>
<tr>
<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<input type="submit" name="delete" value="l&ouml;schen" class="button-delete"></td>
</tr>


</table><br>


</div>
</body>
</html>


