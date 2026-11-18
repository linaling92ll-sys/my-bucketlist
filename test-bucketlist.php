<?php

// Hämtar Bucketlist-klassen
require_once "classes/Bucketlist.php";

// Skapar ett objekt av Bucketlist
$bucketlist = new Bucketlist();

// Hämtar alla aktiviteter från databasen
$activities = $bucketlist->getAll();

// Skriver ut aktiviteterna på sidan
echo "<pre>";
print_r($activities);
echo "</pre>";