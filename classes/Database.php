<?php
// Klass som ansvarar för anslutningen till databasen
class Database
{
    //Uppgifter som behövs för att ansluta till MySQL
    private string $host = "127.0.0.1";
    private string $database = "bucketlist_db";
    private string $username = "root";
    private string $password = "";

    //Metod som skapar och returenerar en databasanslutning
    public function connect(): PDO 
    {
        try {
            //Skapar en anslutning med hjälp av PDO
            $connection = new PDO("mysql:host={$this->host};dbname={$this->database};charset=utf8mb4",
            $this->username,
            $this->password
            );

            //Gör så att PDO kastar fel om något går fel med databasen.
            $connection->setAttribute(
                PDO::ATTR_ERRMODE,
                PDO::ERRMODE_EXCEPTION
            );

            //Returnerar anslutningen så att andra klasser kan använda den.
            return $connection;
        } catch (PDOException $e) {
            //Visar ett felmeddelande om anslutningen misslyckas
            die("Kunde inte ansluta till databasen: " . $e->getMessage());
        }
    }
}
?>