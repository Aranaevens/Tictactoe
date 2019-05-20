<!DOCTYPE html>
<html lang=fr>
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="TicTacToe Game">
  <meta name="author" content="Nicolas EISENBERG">
  <title>Tic Tac Toe</title>
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="css/tictac.css">
</head>
<body>

<?php
require_once('Classes/grid.php');
require_once('Classes/joueur.php');

session_start();

if (isset($_POST['P1']))
{
    $j1 = new Joueur(htmlspecialchars($_POST["P1"]), htmlspecialchars($_POST["P1_sym"]));
    $j2 = new Joueur(htmlspecialchars($_POST["P2"]), htmlspecialchars($_POST["P2_sym"]));
    $m = new Grid($j1, $j2);
}

else if (isset($_SESSION["Grille"]))
{
    $m = $_SESSION["Grille"];
    $j1 = $_SESSION['P1'];
    $j2 = $_SESSION['P2'];
}

if (!isset($_SESSION['P_ENCOURS']))
{
    $_SESSION['P1'] = $j1;
    $_SESSION['P2'] = $j2;
    $_SESSION["Grille"] = $m;
    $_SESSION['P_ENCOURS'] = $m->getJ1();
}

if (!$m->getWin())
{
    echo '
    <div class="container">
        <div class="row">
            <div class="col-sm-3">
                <h3 style="text-align:center;">' . $j1->getName() . '</h3>
                <p>Symbole :<p>
                <p class="sign">' . $j1->getSign() . '</p>';
                if ($_SESSION['P_ENCOURS'] == $m->getJ1())
                    echo '<p>A son tour de jouer</p>';
            echo '</div>
            <div class="col-sm-6">
                <table>
                <tbody>
                    <tr>';
                        if ($m->isTileEmpty(0,0))
                        {
                            echo '<td onclick="window.location=\'empty.php?i=0&j=0\'">&nbsp</td>';
                        }
                        else
                            echo '<td>' . $m->showTile(0,0) . '</td>';
                        
                        if ($m->isTileEmpty(0,1))
                        { 
                            echo '<td onclick="window.location=\'empty.php?i=0&j=1\'">&nbsp</td>';
                        }
                        else
                            echo '<td>' . $m->showTile(0,1) . '</td>';
                        
                        if ($m->isTileEmpty(0,2))
                        {
                            echo '<td onclick="window.location=\'empty.php?i=0&j=2\'">&nbsp</td>';
                        }
                        else
                            echo '<td>' . $m->showTile(0,2) . '</td>';
                    echo '</tr>
                    <tr>';
                        if ($m->isTileEmpty(1,0))
                        {
                            echo '<td onclick="window.location=\'empty.php?i=1&j=0\'">&nbsp</td>';
                        }
                        else
                            echo '<td>' . $m->showTile(1,0) . '</td>';
                        
                        if ($m->isTileEmpty(1,1))
                        {
                            echo '<td onclick="window.location=\'empty.php?i=1&j=1\'">&nbsp</td>';
                        }
                        else
                            echo '<td>' . $m->showTile(1,1) . '</td>';
                        
                        if ($m->isTileEmpty(1,2))
                        {
                            echo '<td onclick="window.location=\'empty.php?i=1&j=2\'">&nbsp</td>';
                        }
                        else
                            echo '<td>' . $m->showTile(1,2) . '</td>';
                    echo '</tr>
                    <tr>';
                        if ($m->isTileEmpty(2,0))
                        {
                            echo '<td onclick="window.location=\'empty.php?i=2&j=0\'">&nbsp</td>';
                        }
                        else
                            echo '<td>' . $m->showTile(2,0) . '</td>';
                        
                        if ($m->isTileEmpty(2,1))
                        {
                            echo '<td onclick="window.location=\'empty.php?i=2&j=1\'">&nbsp</td>';
                        }
                        else
                            echo '<td>' . $m->showTile(2,1) . '</td>';
                        
                        if ($m->isTileEmpty(2,2))
                        {
                            echo '<td onclick="window.location=\'empty.php?i=2&j=2\'">&nbsp</td>';
                        }
                        else
                            echo '<td>' . $m->showTile(2,2) . '</td>';
                    echo '</tr>
                </tbody>
                </table>
            </div>
            <div class="col-sm-3">
                <h3 style="text-align:center;">' . $j2->getName() . '</h3>
                <p>Symbole :<p>
                <p class="sign">' . $j2->getSign() . '</p>';
                if ($_SESSION['P_ENCOURS'] == $m->getJ2())
                    echo '<p>A son tour de jouer</p>
            </div>
        </div>
    </div>';
}

else if ($m->getWin() != $j1 && $m->getWin() != $j2)
{
    echo '
    <div class="container">
        <div class="row">
            <div class ="col-sm-12">
            <h1 style="text-align:center; width:100%;">MATCH NUL!!</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-3">
                <h3 style="text-align:center;">' . $j1->getName() . '</h3>
                <p>Symbole :<p>
                <p class="sign">' . $j1->getSign() . '</p>
            </div>
            <div class="col-sm-6">
                <table>
                <tbody>
                <tr>
                <td>' . $m->showTile(0,0) . '</td>
                <td>' . $m->showTile(0,1) . '</td>
                <td>' . $m->showTile(0,2) . '</td>
            </tr>
            <tr>
                <td>' . $m->showTile(1,0) . '</td>
                <td>' . $m->showTile(1,1) . '</td>
                <td>' . $m->showTile(1,2) . '</td>
            </tr>
            <tr>
                <td>' . $m->showTile(2,0) . '</td>
                <td>' . $m->showTile(2,1) . '</td>
                <td>' . $m->showTile(2,2) . '</td>
            </tr>
                </tbody>
                </table>
            </div>
            <div class="col-sm-3">
                <h3 style="text-align:center;">' . $j2->getName() . '</h3>
                <p>Symbole :<p>
                <p class="sign">' . $j2->getSign() . '</p>
            </div>
        </div>
    </div>
    <hr>
    <div class="container">
    <div class="row">
    <div class="col-sm-12" style="text-align:center;">
    <form method="post" action="index.php">
    <label for "rego">Rejouer ?</label><br>
    <button type="submit" value="submit">C\'est reparti !</button>
    </form>
    </div>
    </div>
    </div>';
    session_destroy();
}

else
{
    echo '
    <div class="container">
        <div class="row">
            <div class="col-sm-3">';
            if ($m->getWin() == $m->getJ1())
            {
                echo '<h3 style="background-color:red; text-align:center;">' . $j1->getName() . '</h3>
                <p>Symbole :<p>
                <p class="sign">' . $j1->getSign() . '</p>
                <h2 style="text-align:center;">GAGNE !!</h2>';
            }
            else
            {
                echo '<h3 style="text-align:center;">' . $j1->getName() . '</h3>
                <p>Symbole :<p>
                <p class="sign">' . $j1->getSign() . '</p>';
            }
            echo '</div>
            <div class="col-sm-6">
                <table>
                <tbody>
                <tr>
                <td>' . $m->showTile(0,0) . '</td>
                <td>' . $m->showTile(0,1) . '</td>
                <td>' . $m->showTile(0,2) . '</td>
            </tr>
            <tr>
                <td>' . $m->showTile(1,0) . '</td>
                <td>' . $m->showTile(1,1) . '</td>
                <td>' . $m->showTile(1,2) . '</td>
            </tr>
            <tr>
                <td>' . $m->showTile(2,0) . '</td>
                <td>' . $m->showTile(2,1) . '</td>
                <td>' . $m->showTile(2,2) . '</td>
            </tr>
                </tbody>
                </table>
            </div>
            <div class="col-sm-3">';
                if ($m->getWin() == $m->getJ2())
                {
                    echo '<h3 style="background-color:red; text-align:center;">' . $j2->getName() . '</h3>
                    <p>Symbole :<p>
                    <p class="sign">' . $j2->getSign() . '</p>
                    <h2 style="text-align:center;">GAGNE !!</h2>';
                }
                else
                {
                    echo '<h3 style="text-align:center;">' . $j2->getName() . '</h3>
                    <p>Symbole :<p>
                    <p class="sign">' . $j2->getSign() . '</p>';
                }
            echo '</div>
        </div>
    </div>
    <hr>
    <div class="container">
    <div class="row">
    <div class="col-sm-12" style="text-align:center;">
    <form method="post" action="index.php">
    <label for "rego">Rejouer ?</label><br>
    <button type="submit" value="submit">C\'est reparti !</button>
    </form>
    </div>
    </div>
    </div>';
    session_destroy();
}

