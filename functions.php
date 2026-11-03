<?php

$cena = $kursi[$_POST['kurss']]['cena'] ?? 0;

function starpsumma($cena, $skaits) {
    return $cena * $skaits;
}

function aprekins($cena, $skaits) {

    $atlaide = 0;

    if ($skaits >= 3) {
        $atlaide = 0.10;
    }
    return $cena * $skaits * (1 - $atlaide);
}