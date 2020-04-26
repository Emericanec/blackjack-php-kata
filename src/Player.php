<?php


class Player
{
    public $game;

    public function __construct()
    {
    }

    public function join(Blackjack $game)
    {
        $this->game = $game;
    }

    public function bet($amount)
    {
        if($amount < 5) {
            return "минимальная ставка 5";
        }
        $this->game->addBet($this, $amount);
    }
}