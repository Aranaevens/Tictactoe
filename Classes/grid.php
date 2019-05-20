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
        if ($this->matrix_[$i][$j] == 1)
            return $this->j1_->getSign();
        if ($this->matrix_[$i][$j] == 2)
            return $this->j2_->getSign();
    }

    function isTileEmpty($i, $j)
    {
        if ($this->matrix_[$i][$j] == 0)
            return true;
        else
            return false;
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
            if (($this->getTile($i, 0) == $this->getTile($i, 1)) && ($this->getTile($i, 1) == $this->getTile($i, 2)) && $this->getTile($i,0))
            // Le test cherche si une ligne est égale et non égale à 0.
            {
                $this->win_ = true;
                // Comme elle n'est pas égale à 0 c'est soit 1 (j1 gagne), soit 2 (j2 gagne).
                if ($this->getTile($i,0) == 1)
                    $this->j1_->setWin();
                else
                    $this->j2_->setWin();
            }

            if (($this->getTile(0, $i) == $this->getTile(1, $i)) && ($this->getTile(1, $i) == $this->getTile(2, $i)) && $this->getTile(0,$i))
            // Cherche si une colonne est gagnante.
            {
                $this->win_ = true;
                if ($this->getTile(0,$i) == 1)
                    $this->j1_->setWin();
                else
                    $this->j2_->setWin();
            }
        }
        $c1 = (($this->getTile(0, 0) == $this->getTile(1, 1)) && ($this->getTile(1, 1) == $this->getTile(2, 2)) && $this->getTile(0,0));
        $c2 = (($this->getTile(0, 2) == $this->getTile(1, 1)) && ($this->getTile(1, 1) == $this->getTile(2, 0)) && $this->getTile(1,1));
        if (($c1 || $c2))
        // Cherche une diagonale gagnante.
        {
            $this->win_ = true;
            if ($this->getTile(1,1) == 1)
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
                for ($j = 0; $j<3; $j++)
                {
                    if (!$this->getTile($i, $j))
                        $flag = false;
                        // S'il reste un 0, ce n'est pas un match nul.
                }
            }
            if ($flag)
                $this->win_ = true;
        }
    }

    function getWin()
    {
        if ($this->win_ == true)
        {
            if ($this->j1_->getWin())
                return $this->j1_;
            else if ($this->j2_->getWin())
                return $this->j2_;
            else
                return new Joueur(' ');
        }
        else
            return 0;
    }

    function changeTileJ1($i, $j)
    {
        var_dump($i, $j);
        $this->matrix_[$i][$j] = 1;
    }

    function changeTileJ2($i, $j)
    {
        var_dump($i, $j);
        $this->matrix_[$i][$j] = 2;
    }

    function getJ1()
    {
        return $this->j1_;
    }
    
    function getJ2()
    {
        return $this->j2_;
    }
}