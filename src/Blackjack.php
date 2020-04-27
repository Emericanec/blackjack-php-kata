<?php

class Blackjack
{
    private array $bets = [];
    private Deck $deck;
    private Dealer $dealer;

    public function __construct(Dealer $dealer)
    {
        $this->deck = new Deck();
        $this->deck->shuffle();
        $this->dealer = $dealer;
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

    public function getDealer(): Dealer
    {
        return $this->dealer;
    }
}
