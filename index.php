<?php

require_once 'data.php';
require_once 'functions.php';

foreach ($kursi as $kurss) {
    echo "<table>";
    echo "<tr>";
    echo "<td>" . $kurss['nosaukums'] . "</td>";
    echo "<td>" . $kurss['cena'] . "EUR</td>";
    echo "</tr>";
    echo "</table>";
}

echo "<br>";

echo "Kursu skaits: " . count($kursi) . "<br>";

echo "<br><br>";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kursu pieteikuma kalkulators</title>
</head>
<body>
    <form method="POST" action="">
        <label for="vards">Vārds</label>
        <input type="text" name="vards" id="vards" required><br>
        <label for="epasts">E-pasts</label>
        <input type="email" name="epasts" id="epasts"required><br>
        <label for="kurss">Kursa izvēle</label>
        <select name="kurss" id="kurss" required>
            <?php
            foreach ($kursi as $key => $kurss) {
                echo "<option value='$key'>" . $kurss['nosaukums'] . " - " . $kurss['cena'] . "EUR</option>";
            } ?>
        </select><br>
        <label for="skaits">Dalībnieku skaits</label>
        <input type="number" name="skaits" id="skaits" min="1" max="5" required><br>
        <button tupe="submit">Iesniegt</button>
    </form>
</body>
</html>