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
