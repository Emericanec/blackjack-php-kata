<?php


class Deck
{
    private array $cards;

    public function __construct()
    {
        $this->cards = ['2', '3', '4', '5', '6', '7', '8', '9', '10', 'J', 'Q', 'K', 'A'];
    }

    public function shuffle(): void
    {
        shuffle($this->cards);
    }

    public function takeOne(): string
    {
        return array_pop($this->cards);
    }
}
