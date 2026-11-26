<?php
// Hämtar inställningar för felrapportering
require_once __DIR__ . "/config.php";
//Kontrollera att formuläret har skickats
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    //Hämtar information från formuläret
    $name = trim($_POST["name"] ?? "");
    $description = trim($_POST["description"] ?? "");
    $priority = $_POST["priority"] ?? "";

    //Kontrollera att alla fällt är ifyllda
    if (
        $name === "" || $description === "" || !in_array($priority, ["Låg", "Medel", "Hög"], true)
    ) {
        die("Du måste fylla i alla fält och välja en prioritet.");
    }

    //Hämtar Bucketlist-klassen
    require_once "classes/Bucketlist.php";

    //Skapar ett objekt av klassen
    $bucketlist = new Bucketlist();

    //Sparar den nya aktiviteten i databasen
    $result = $bucketlist->add($name, $description, $priority);

    //Kontrollera om aktiviteten sparades
    if ($result) {
        //Skicka tillbaka besökaren till bucket-sidan
        header("Location: bucketlist.php");
        exit;
    } else {
        //Visar ett felmeddelande om sparandet misslyckades
        echo "Det gick inte att lägga till aktiviteten.";
    }
} else {
    //Skickar tillbaka besökaren om sidan öppnas utan formulärdata
    header("Location: bucketlist.php");
    exit;
}