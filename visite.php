<?php

if (isset($_COOKIE['derniere_visite'])) {
    $messageVisite = "Dernière visite : " . date('d/m/Y à H:i:s', $_COOKIE['derniere_visite']);
} else {
    $messageVisite = "Bienvenue, c'est votre première visite !";
}

setcookie('derniere_visite', time(), time() + 3600 * 24 * 365);