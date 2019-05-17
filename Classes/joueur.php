<?php

class Joueur
{
    private $sign_;
    private $win_;

    function __construct($letter)
    {
        $this->sign_ = $letter;
        $this->win_ = false;
    }

    function getSign()
    {
        return $this->sign_;
    }

    function getWin()
    {
        return $this->win_;
    }

    function setWin()
    {
        $this->win_ = true;
    }
}