<?php
//Anger sidans rubrik
$pageTitle = "Min bucketlist";

//Hämtar headern
require_once "includes/header.php";

//Hämtar Bucketlist-klassen
require_once "classes/Bucketlist.php";

//Skapar ett objekt av Bucketlist-klassen
$bucketlist = new Bucketlist();

//Hämtar alla aktiviteter från databasen
$activities = $bucketlist->getAll();

?>
<section class="add-section">
    <h2>Lägg till en aktivitet</h2>
    <form action="add.php" method="POST">

    <div class="form-group">
        <label for="name">Aktivitet:</label>
        <input type="text" id="name" name="name" required>
    </div>

    <div class="form-group">
        <label for="description">Beskrivning:</label>
        <textarea id="description" name="description" required></textarea>
    </div>

    <div class="form-group">
        <label for="priority">Prioritet:</label>
        <select id="priority" name="priority" required>
            <option value="">Välj prioritet</option>
            <option value="Låg">Låg</option>
            <option value="Medel">Medel</option>
            <option value="Hög">Hög</option>
        </select>
    </div>

    <button type="submit">Lägg till aktivitet</button>

</form>
</section>
<section class= "activities-section">
    <h2>Mina aktiviteter</h2>
    <?php if (!empty($activities)): ?>
        <?php foreach ($activities as $activity): ?>

<article>
    <h3><?= htmlspecialchars($activity["NAME"]) ?></h3>
    <p><?= htmlspecialchars($activity["DESCRIPTION"]) ?></p>

    <p>
        Prioritet: <?= htmlspecialchars($activity["priority"]) ?>
    </p>
    <form action="delete.php" method="POST">
        <input type="hidden" name="id" value="<?= htmlspecialchars((string) $activity["id"]) ?>">
        <button type="submit">Ta bort</button>
    </form>
</article>

<?php endforeach; ?>

<?php else: ?>
    <p>Du har inte lagt till några aktiviteter än.</p>

<?php endif; ?>

</section>

<?php

//Hämtar footern
require_once "includes/footer.php";
?>