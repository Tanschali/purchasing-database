<?php

/*=============================================================
  File: class/db.class.php
  Projekt im Rahmen des Programmiertechnik Unterrichts der 2BKI2
  Thema: Anschaffungsdatenbank
  Autor: Tanja Weiser
==============================================================*/

class db  {

  private $connection = NULL;
  private $res = NULL;
  private $result = NULL;


  /**************************************
  * Verbindung zur Datenbank herstellen
  ***************************************/

  public function connect($host, $db, $user, $pass) {
    $this->connection = mysql_connect( // Verbidnugsherstellung
      $host,
      $user,
      $pass,
      TRUE) OR die(mysql_error());
 
    mysql_select_db($db, $this->connection) OR die(mysql_error()); // Selektieren der Datenbank
  }

  /**************************************
  * Verbindung zur Datenbank trennen
  ***************************************/
 
  public function disconnect() {
    if (is_resource($this->connection)) { // Fragt ab, ob der Parameter einer Ressource ist
      mysql_close($this->connection);
    }
  }

  /**************************************
  * Beliebigen Query ausführen
  ***************************************/
 
  public function query($query) {
    if (is_resource($this->connection)) {
      if (is_resource($this->res)) {
        mysql_free_result($this->res); // Freigabe des Speichers 
      }
 
        $this->result = mysql_query(
          $query,
          $this->connection
        )or die (mysql_error());
        return $this->result;
    }
    return false;
  }

  /**************************************
  * Beliebige Reihe einer Tablle ausgeben 
  ***************************************/
 
  public function fetchRow($var) {

      if (is_resource($this->res)) {
        while($row = mysql_fetch_assoc($this->res)){

        echo $row[$var]."<br>";
        }
      }
  }

  /**************************************
  * Ressourcen Tabelle auslesen
  ***************************************/

  public function showTable($table) {
    $result = mysql_query("SELECT * FROM $table");
    echo '<table border="2.5" bordercolor="#1F6E92" frame="void" >';
    echo'<tr><th>ID</th><th>Produkt</th><th>Bestand</th><th>Bestellen</th></tr>';
    while ($row = mysql_fetch_array($result)){
      echo '<tr>';
      for ($i = 0; $i < count($row)/2; $i++){    
        echo '<td>'.$row[$i].'</td>'; 
      }
      echo '</tr>'; 
    }
    echo '</table>';
  }

  /**************************************
  * User Tabelle auslesen
  ***************************************/

  public function showUser($table) {
    $result = mysql_query("SELECT * FROM $table");
    echo '<table border="2.5" bordercolor="#1F6E92" frame="void" >';
    echo'<tr><th>ID</th><th>Name</th><th>Passwort</th></tr>';
    while ($row = mysql_fetch_array($result)){
      echo '<tr>';
      for ($i = 0; $i < count($row)/2; $i++){    
        echo '<td>'.$row[$i].'</td>'; 
      }
      echo '</tr>'; 
    }
    echo '</table>';
  }

}

?>