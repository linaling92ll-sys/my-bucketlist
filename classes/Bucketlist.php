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

    //Lägger till en ny aktivitet i databasen
    public function add(
        string $name,
        string $description,
        string $priority
    ): bool{
        //SQL-fråga som lägger till en ny aktivitet i tabellen
        $sql = "INSERT INTO bucketlist (name, description, priority) VALUES (:name, :description, :priority)";

        //Förbereder SQL-frågan innan den skickas till databasen
        $statement = $this->connection->prepare($sql);

        //Skickar värdena till databasen och kör SQL-frågan
        return $statement->execute([
        ":name" => $name,
        ":description" => $description,
        ":priority" => $priority
        ]);
    }

    //Tar bort en aktivitet från databasen
    public function delete(int $id): bool
    {
       //SQL-fråga som tar bort en aktivitet baserat på dess ID
       $sql = "DELETE FROM bucketlist WHERE id = :id"; 

       //Förbereder SQL-frågan
       $statement = $this->connection->prepare($sql);

       //Kör SQL-frågan med aktivitetens ID
       return $statement->execute([
       ":id" => $id
       ]);
    }
}
?>