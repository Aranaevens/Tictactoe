<?php

require_once('Classes/grid.php');
require_once('Classes/joueur.php');

session_start();
$m = $_SESSION["Grille"];
$i = $_GET['i'];
$j = $_GET['j'];


if ($_SESSION['P_ENCOURS'] == $m->getJ1())
{
    $m->changeTileJ1($i, $j);
    $_SESSION['P_ENCOURS'] = $m->getJ2();
}
else
{    
    $m->changeTileJ2($i, $j);
    $_SESSION['P_ENCOURS'] = $m->getJ1();
}
$m->checkWin();
$_SESSION["Grille"] = $m;
header('Location: game.php');
