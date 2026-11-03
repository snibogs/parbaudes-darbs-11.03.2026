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


$kludas = [];
$vards = "";
$epasts = "";
$skaits = 0;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $vards = trim($_POST['vards'] ?? "");
    $epasts = trim($_POST['epasts'] ?? "");
    $skaits = intval($_POST['skaits'] ?? 0);

    if ($vards === "") {
        $kludas["vards"] = "Vārds ir obligāts";
    }

    if (!filter_var($epasts, FILTER_VALIDATE_EMAIL)) {
        $kludas["epasts"] = "Nederīgs e-pasts";
    }
}
?>

<form method="POST" action="">
    <label for="vards">Vārds</label>
    <input type="text" name="vards" id="vards" value="<?= htmlspecialchars($vards, ENT_QUOTES, 'UTF-8') ?>"><br>        
        <?php if (isset($kludas["vards"])): ?>
            <p><?=htmlspecialchars($kludas["vards"]) ?></p>
        <?php endif; ?>
    <label for="epasts">E-pasts</label>
    <input type="email" name="epasts" id="epasts" value="<?= htmlspecialchars($epasts, ENT_QUOTES, 'UTF-8') ?>"><br>
        <?php if (isset($kludas["epasts"])): ?>
            <p><?=htmlspecialchars($kludas["epasts"]) ?></p>
        <?php endif; ?>
    <label for="kurss">Kursa izvēle</label>
    <select name="kurss" id="kurss">
        <?php
        foreach ($kursi as $key => $kurss) {
            echo "<option value='$key'>" . $kurss['nosaukums'] . " - " . $kurss['cena'] . "EUR</option>";
        } ?>
    </select><br>
    <label for="skaits">Dalībnieku skaits</label>
    <input type="number" name="skaits" id="skaits" min="1" max="5" value="<?= htmlspecialchars($skaits, ENT_QUOTES, 'UTF-8') ?>"><br>
    <button type="submit">Iesniegt</button>
</form>

<?php 

if ($kludas === []) {
    echo "Kopējā cena: " . aprekins($cena, $skaits) . "EUR<br>";
    echo "Vārds: " . htmlspecialchars($vards, ENT_QUOTES, 'UTF-8') . "<br>";
    echo "E-pasts: " . htmlspecialchars($epasts, ENT_QUOTES, 'UTF-8') . "<br>";
    echo "Izvēlētais kurss: " . htmlspecialchars($kursi[$_POST['kurss']]['nosaukums'], ENT_QUOTES, 'UTF-8') . "<br>";
    echo "Dalībnieku skatis: " . htmlspecialchars($skaits, ENT_QUOTES, 'UTF-8') . "<br>";
    echo "Nemācēju dabūt atlaidi lai rāda";
}
?>