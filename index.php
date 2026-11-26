<?php
// Hämtar inställningar för felrapportering
require_once __DIR__ . "/config.php";
//Anger sidans rubrik
$pageTitle = "Min bucketlist - saker jag vill uppleva";
//Hämtar headern
require_once "includes/header.php";
?>

<h2>Välkommen till min Bucketlist!</h2>
<p>Här skriver jag saker som jag vill uppleva,
platser som jag vill besöka och mål som jag vill uppnå.</p>

<section>
    <h2>Om projektet</h2>
    <p>
        Detta projekt är en uppgift där jag ska utveckla en 
        responsiv webbplats med hjälp av HTML, CSS, PHP och MySQL.
    </p>
    <p>
        Syftet med webbplatsen är att kunna skapa en personlig bucketlist
        där jag kan lägga till, visa och ta bort aktiviteter som jag vill genomföra
        i framtiden.
    </p>
</section>
<section>
    <h2>Tekniker som jag använder</h2>
    <ul>
        <li>HTML - för webbplatsens struktur.</li>
        <li>CSS - för desig och responsivitet.</li>
        <li>PHP - for webbplatsens funktioner.</li>
        <li>MySQL - för att lagra aktiviteterna.</li>
        <li>Git och GitHub - för versionshantering.</li>
    </ul>
</section>
<section>
    <h2>Mina reflektioner kring PHP</h2>
    <p>
        Under arbetets gång med projektet så har jag fått lära mig hur 
        PHP kan användas för att skapa dynamiska webbplatser.
        Jag har bland annat arbetat med klasser, objekt, metoder 
        och databasanslutningar.
    </p>
    <p>
        Jag har också lärt mig hur PHP kan kommunicera med en MySQL-databas för att hämta, lägga till 
        och ta bort information.
    </p>
</section>

<?php
//Hämtar footern
require_once "includes/footer.php";
?>