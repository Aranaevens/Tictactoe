<!DOCTYPE html>
<html lang=fr>
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="TicTacToe Game">
  <meta name="author" content="Nicolas EISENBERG">
  <title>Tic Tac Toe</title>
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="css/custom.css">
  <style>
    h3{
        font-size: 35px;
    }

    p.j-notwin{
        font-size: 20px;
    }
    p.sign-notwin{
        font-size: 25px;
    }

    table{
        border-collapse: collapse;
    }

    table, tbody, th, td{
        font-size: 75px;
    }

    table, th, td{
        border: 1px solid black;
    }

    th{
        height: 100px;
    }
  </style>
</head>
<body>

<?php
require_once('Classes/grid.php');
require_once('Classes/joueur.php');

$j1 = new Joueur(htmlspecialchars($_POST["P1"]));
$j2 = new Joueur(htmlspecialchars($_POST["P2"]));

$m = new Grid($j1, $j2);

session_start();
$_SESSION['P1'] = $j1;
$_SESSION['P2'] = $j2;
$_SESSION["Grille"] = $m;

if ($m->getWin())
{
    echo '
    <div class="container">
        <div class="row">
            <div class="col-sm-3">
                <h3>Joueur 1</h3>
                <p class="j-notwin">Symbol :<p>
                <p class="sign">' . $j1->getSign() . '</p>
            </div>
            <div class="col-sm-6">
                <table>
                <tbody>
                    <tr>
                        <td>' . $m->showTile(1,1) . '</td>
                        <td>' . $m->showTile(1,2) . '</td>
                        <td>' . $m->showTile(1,3) . '</td>
                    </tr>
                    <tr>
                        <td>' . $m->showTile(2,1) . '</td>
                        <td>' . $m->showTile(2,2) . '</td>
                        <td>' . $m->showTile(2,3) . '</td>
                    </tr>
                    <tr>
                        <td>' . $m->showTile(3,1) . '</td>
                        <td>' . $m->showTile(3,2) . '</td>
                        <td>' . $m->showTile(3,3) . '</td>
                    </tr>
                </tbody>
                </table>
            </div>
            <div class="col-sm-3">
                <h3>Joueur 2</h3>
                <p class="j-notwin">Symbol :<p>
                <p class="sign-notwin">' . $j2->getSign() . '</p>
            </div>
        </div>
    </div>';
}