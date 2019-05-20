<?php

class Joueur
{
    private $name_;
    private $sign_;
    private $win_;

    function __construct($nom, $letter)
    {
        $this->name_ = $nom;
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

    function getName()
    {
        return $this->name_;
    }

    function setWin()
    {
        $this->win_ = true;
    }
}