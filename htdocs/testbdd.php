<?php

// https://www.php.net/manual/fr/book.pdo.php
// https://www.php.net/manual/fr/pdo.connections.php

// Connexion a la base de donnee
// SELECT
// Create table
// INSERT

// Connexion à la base de données
$user = 'root';
$pass = '20081999';
$driver = 'mysql';
$lhost = 'localhost';
$bdd = 'Commerce';

$db = new PDO("$driver:host=$lhost;dbname=$bdd", $user, $pass);


$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


// CREATE TABLE
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$sql = "CREATE TABLE IF NOT EXISTS clients(
     ID INT(11) AUTO_INCREMENT PRIMARY KEY,
     prenom VARCHAR(50) NOT NULL, 
     nom VARCHAR(50) NOT NULL,
     adresse VARCHAR(250) NOT NULL);";
$db->exec($sql);
print("Table créée.\n");

// INSERT
$insert = "INSERT INTO clients(prenom, nom, adresse) VALUES('Damien', 'Clairet', '160 rue des pommes, 62510 Arques')";
$request = $db->prepare($insert);
$request->execute();

// SELECT
foreach ($db->query('SELECT * from clients') as $row) {
    print_r($row);
}