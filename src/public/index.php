<?php
require_once __DIR__ . '/../kernel/Rooters.php';
require_once __DIR__ . '/../kernel/NavBar.php';
require_once __DIR__ . '/../kernel/Constant.php';
require_once __DIR__ . '/../kernel/DataBase.php';
require_once __DIR__ . '/../../vendor/autoload.php';

session_start();
if (empty($_SESSION)) {
    $_SESSION['connected'] = false;
    $_SESSION['status'] = 'inviter';
    $_SESSION['classe'] = Null;
    $_SESSION['id'] = Null;
    $_SESSION['Nom'] = Null;
    $_SESSION['Prenom'] = Null;
};

$routeur = new Routeur();
$controlleur = $routeur->recuperePageAAfficher();
if (null !== $controlleur) {
    $controlleur->afficher();
}