<?php
// Hämtar inställningar för felrapportering
require_once __DIR__ . "/config.php";
//Kontrollera att formuläret har skickats med POST
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    //Hämtar aktivitetens ID från formuläret
    $id = filter_input(INPUT_POST, "id", FILTER_VALIDATE_INT);

    //Kontrollerar att ID-numret är giltigt positivt heltal
    if ($id == false || $id === null || $id < 1) {
        die("Ogiltigt aktivitets-ID.");
    }

    // Hämtar Bucketlist-klassen
    require_once "classes/Bucketlist.php";

    // Skapar ett objekt av Bucketlist-klassen
    $bucketlist = new Bucketlist();

    // Tar bort aktiviteten från databasen
    $result = $bucketlist->delete($id);

    // Skickar tillbaka besökaren till bucketlist-sidan
    header("Location: bucketlist.php");
    exit;
}