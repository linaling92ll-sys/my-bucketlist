<?php
// Klass som ansvarar för anslutningen till databasen
class Database
{
    //Uppgifter som behövs för att ansluta till MySQL
    private string $host;
    private string $database;
    private string $username;
    private string $password;

    //Hämtar databasuppgifterna från konfigurationsfilen
    public function __construct(): 
    {
        $config = require __DIR__."/db-config.php";

        $this->host = $config["host"];
        $this->database = $config["database"];
        $this->username = $username["username"];
        $this->password = $password["password"];
    }

    //Metod som skapar och returnerar en databasanslutning
    public function connect(): PDO 
    {
        try {
            //Skapar en anslutning med hjälp av PDO
            $connection = new PDO("mysql:host={$this->host};dbname={$this->database};charset=utf8mb4",
            $this->username,
            $this->password);

            //Gör så att PDO kastar ett fel om något går fel
            $connection->setAttribute(
                PDO::ATTR_ERRMODE,
                PDO::ERRMODE_EXCEPTION
            );

            //Returnerar anslutningen
            return $connection;
        } catch (PDOException $e) {
            //Visar ett felmeddelande om anslutningen misslyckdes
            die("Kunde inte ansluta till databasen:" .$e->getMessage());
        }
    }
}
?>