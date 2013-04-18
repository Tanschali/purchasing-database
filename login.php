<?php

/*=============================================================
  File: login.php
  Projekt im Rahmen des Programmiertechnik Unterrichts der 2BKI2
  Thema: Anschaffungsdatenbank
  Autor: Tanja Weiser
==============================================================*/

session_start();

//######################      KLASSEN      ######################

require_once 'class/db.class.php'; // Einbinden der Datenbank-Klasse

//###############################################################
 $result ="";

if (isset($_POST['login'])) {
	$username = $_POST['username'];
	$password = $_POST['pw'];
	
	$user = new db(); 
	$user -> connect('localhost', 'anschaffung', 'root', 'root');

	$result = $user -> query("SELECT * FROM user WHERE name = '$username'"); 

	//Wenn kein Datensatz gefunden
	if (mysql_num_rows($result) == 0) {
		header('Location: login.php');
		exit;
	}

	$row = mysql_fetch_object($result);

	//Passwort prüfen
	if ($row->passwd != $password) {
		header('Location: login.php');
		exit;
	}

	if($row->name == 'admin') {
		header('Location: admin.php');
	exit;
	}

	$_SESSION['angemeldet'] = true; 

}

//Wenn Benutzer angemeldet
if ($_SESSION['angemeldet']) {
	header('Location: change.php');
	exit;
}


?>


<hmtl>
	<head>
		<title>Login Bestand | Anschaffung</title>
		<!-- STYLESHEET EINBINDUNG -->
		<link rel="stylesheet" type="text/css" href="css/login.css">
	</head>
<body>
	<div class="top">
		<text><br><text>Login</text>
	</div>
	<div class="main"> <!-- VEWERNDEN VON main-->
	<form action="login.php" method="post">
	<input type="text" name="username" placeholder="Username"><br>
	<input type="password" name="pw" placeholder="Passwort">
	<br><input type="submit" name="login" value="Login" class="button">
	</div>

	<h5>&copy; Tanja Weiser | Anschaffungsdatenbank | 2013 </h5>
</body>
</html>

