<!DOCTYPE html>
<html lang=fr>
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="TicTacToe Game">
  <meta name="author" content="Nicolas EISENBERG">
  <title>Tic Tac Toe</title>
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="css/custom.css">
</head>
<body>


<?php

echo '<form method="post" action="game.php">
        <label for "P1">Nom pour le joueur 1 :</label><br>
        <input type="text" name="P1" maxlength="15"><br>
        <label for "P2">Nom pour le joueur 2 :</label><br>
        <input type="text" name="P2" maxlength="15"><br>
        <label for "P1_sym">Symbole pour le joueur 1 :</label><br>
        <input type="text" name="P1_sym" maxlength="1"><br>
        <label for "P2_sym">Symbole pour le joueur 2 :</label><br>
        <input type="text" name="P2_sym" maxlength="1"><br>
        <br>
        
        <button type="submit" value="submit">Valider</button></form>';
?>

</html>
</body>