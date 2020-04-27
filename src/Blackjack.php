<?php

class Blackjack
{
    private array $bets = [];
    private Deck $deck;

    public function __construct()
    {
        $this->deck = new Deck();
        $this->deck->shuffle();
    }

    public function addBet(Player $player, $amount): void
    {
        $this->bets[] = [$player, $amount];
    }

    public function dealerDealsCards(): array
    {
        $first = $this->deck->takeOne();
        $second = $this->deck->takeOne();

        return [$first, $second];
    }
}
