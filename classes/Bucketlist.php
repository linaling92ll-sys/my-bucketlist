<?php
//Hämtar Database-klassen
require_once "Database.php";

//Klassen som hanterar bucketlistens aktiviteter
class Bucketlist
{
    //Här sparas anslutningen till databasen
    private PDO $connection;

    //Körs automatiskt när ett objekt av klassen skapas
    public function __construct()
    {
        //Skapar ett objekt av Database-klassen
        $database = new Database();

        //Ansluter till databasen och sparar anslutningen
        $this->connection = $database->connect();
    }

    //Hämtar alla aktiviteter från databasen
    public function getAll(): array 
    {
        //SQL-fråga som hämtar alla aktiviteter
        $sql = "SELECT * FROM bucketlist ORDER BY created_at DESC";

        //Förbereder SQL-frågan
        $statement = $this->connection->prepare($sql);

        //Kör SQL-frågan
        $statement->execute();

        //Hämtar resultat och returnerar de som en array
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }
}
?>