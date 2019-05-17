<?php

require_once("joueur.php");

class Grid
{
    private $matrix_;
    private $j1_;
    private $j2_;
    private $win_;

    function __construct(Joueur $a, Joueur $b)
    {
        $this->matrix_ = [
                [0, 0, 0],
                [0, 0, 0],
                [0, 0, 0]
        ];
        $this->j1_ = $a;
        $this->j2_ = $b;
        $this->win_ = false;
    }

    function showTile($i, $j)
    {
        if ($this->matrix_[$i][$j] == 0)
        {
            $_SESSION['i']=$i;
            $_SESSION['j']=$j;
            echo '<a href="fill.php"><img src="empty.png">Empty case</img></a>';
        }
        if ($this->matrix_[$i][$j] == 1)
            echo '<p class="p1-sign">' . $this->j1_->getSign() . '</p>';
        if ($this->matrix_[$i][$j] == 2)
            echo '<p class="p2-sign">' . $this->j2_->getSign() . '</p>';
    }

    function getTile($i, $j)
    {
        return $this->matrix_[$i][$j];
    }

    function checkWin()
    // Vérifie si l'état de la grille donne un vainqueur
    {
        for($i=0; $i<3; $i++)
        {
            if ((getTile($i, 1) == getTile($i, 2)) && (getTile($i, 2) == getTile($i, 3)) && getTile($i,1))
            // Le test cherche si une ligne est égale et non égale à 0.
            {
                $this->win_ = true;
                // Comme elle n'est pas égale à 0 c'est soit 1 (j1 gagne), soit 2 (j2 gagne).
                if (getTile($i,1) == 1)
                    $this->j1_->setWin();
                else
                    $this->j2_->setWin();
            }

            if ((getTile(1, $i) == getTile(2, $i)) && (getTile(2, $i) == getTile(3, $i)) && getTile(1,$i))
            {
                $this->win_ = true;
                if (getTile(1,$i) == 1)
                    $this->j1_->setWin();
                else
                    $this->j2_->setWin();
            }
        }
        if ((getTile(1, 1) == getTile(2, 2)) && (getTile(2, 2) == getTile(3, 3)) && getTile(1,1))
        {
            $this->win_ = true;
            if (getTile(1,1) == 1)
                $this->j1_->setWin();
            else
                $this->j2_->setWin();
        }

        else if ((getTile(1, $i) == getTile(2, $i)) && (getTile(2, $i) == getTile(3, $i)) && getTile(1,$i))
        {
            $this->win_ = true;
            if (getTile(1,$i) == 1)
                $this->j1_->setWin();
            else
                $this->j2_->setWin();
        }

        else
        // S'il n'y a pas de vainqueur, ça peut être un match nul.
        {
            $flag = true;
            for ($i = 0; $i<3; $i++)
            {
                for ($j = 0; $j<3; j++)
                {
                    if (!getTile($i, $j))
                        $flag = false;
                        // S'il reste un 0, ce n'est pas un match nul.
                }
            }
            if ($flag)
                $this->win_ = true;
        }
    }

    function getWin()

    function changeTileJ1($i, $j)
    {
        $this->matrix_[$i][$j] = 1;
    }

    function changeTileJ2($i, $j)
    {
        $this->matrix_[$i][$j] = 2;
    }
}