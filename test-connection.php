<?php
//Hämtar Database-klassen
require_once "classes/Database.php";

//Skapar ett objekt av klassen Database
$database = new Database();

//Försöker ansluta till databasen
$connection = $database->connect();

//Skriver ut ett meddelande om anslutningen lyckas
echo "Anslutningen till databasen fungerar";
?>