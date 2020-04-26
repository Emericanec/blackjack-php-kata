<?php


class Blackjack
{
    private $bets = array();
    private $deck;

    public function __construct()
    {
        $this->deck = new Deck();
        $this->deck->shuffle();
    }

    public function addBet(Player $player, $amount)
    {
        array_push($this->bets, array($player, $amount));
    }

    public function dealerDealsCards()
    {
        $first = $this->deck->takeOne();
        $second = $this->deck->takeOne();

        return array($first, $second);
    }
}