<?php

/*=============================================================
  File: class/user.class.php
  Projekt im Rahmen des Programmiertechnik Unterrichts der 2BKI2
  Thema: Anschaffungsdatenbank
  Autor: Tanja Weiser
==============================================================*/

class user {

	private $db;
	private $data = [];

	public function __construct($db) {
		$this->db = $db;
		$this->loadUser();
	}

	private function loadUser() {
			$result = mysql_query("SELECT * FROM user");

			while ($row = mysql_fetch_object($result)) {
				$this->data[$row->id]['name'] = $row->name;
				$this->data[$row->id]['passwd'] = $row->passwd;
			}
		}

	public function deleteUser($table, $id) {
		$this->db->query("DELETE FROM $table WHERE id = $id");
		header('Location: admin.php');
	}

	public function insertUser($table, $name, $passwd) {
		mysql_query("INSERT INTO $table (name, passwd) VALUES ('$name', '$passwd')");
		header('Location: admin.php');
	}


	
}
?>