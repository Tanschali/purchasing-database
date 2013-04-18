<?php

/*=============================================================
  File: class/product.class.php
  Projekt im Rahmen des Programmiertechnik Unterrichts der 2BKI2
  Thema: Anschaffungsdatenbank
  Autor: Tanja Weiser
==============================================================*/

class product {

	private $db;
	private $data = [];

	public function __construct($db) {
		$this->db = $db;
		$this->load();
	}

	private function load() {
			$result = mysql_query("SELECT * FROM ressourcen");

			while ($row = mysql_fetch_object($result)) {
				$this->data[$row->id]['produkt'] = $row->produkt;
				$this->data[$row->id]['bestand'] = $row->bestand;
				$this->data[$row->id]['bestellen'] = $row->bestellen;
			}
		}

	public function deleteEntry($table, $id) {
		$this->db->query("DELETE FROM $table WHERE id = $id");
		header('Location: delete.php');
	}

	public function insertEntry($table, $produkt, $bestand=0, $bestellen=0) {
		mysql_query("INSERT INTO $table (produkt, bestand, bestellen) VALUES ('$produkt', '$bestand', '$bestellen')");
		header('Location: entry.php');
	}
	
	
	public function changeEntry($table, $id, $produkt, $bestand, $bestellen) {
		mysql_query("UPDATE $table SET produkt = '$produkt', bestand = '$bestand', bestellen = '$bestellen' WHERE id = '$id'");
		header('Location: change.php');
	}

	public function searchByName($table, $produkt) {
		$search = mysql_query("SELECT * FROM $table WHERE produkt LIKE '%$produkt%'");
		$table = "<table><tr><td>ID</td><td>Produkt</td><td>Bestand</td><td>Bestellen</td></tr>";
		while($row = mysql_fetch_assoc($search)) {
        $table .= "<tr><td>".$row['id']."&nbsp;&nbsp;"."</td>";
        $table .= "<td>".$row['produkt']."&nbsp;&nbsp;"."</td>";
        $table .= "<td>".$row['bestand']."&nbsp;&nbsp;"."</td>";
        $table .= "<td>".$row['bestellen']."&nbsp;&nbsp;"."</td></tr>";
		}
		return $table;
	}

	public function saveList($table, $filename) {
		$result = mysql_query("SELECT * FROM $table");
		$res = mysql_query("SHOW FIELDS FROM $table");
		file_put_contents('/home/AnschaffungsDB/'.$filename.'.csv', '');

		while ($row = mysql_fetch_object($res)) {
			file_put_contents('/home/AnschaffungsDB/'.$filename.'.csv', file_get_contents('/home/AnschaffungsDB/'.$filename.'.csv').$row->Field.',');
		}
		while($row = mysql_fetch_object($result)) {
			file_put_contents('/home/AnschaffungsDB/'.$filename.'.csv', 
			file_get_contents('/home/AnschaffungsDB/'.$filename.'.csv')."\n".$row->id.','.$row->produkt.','.$row->bestand.','.$row->bestellen);
		}
	}


	
}
?>