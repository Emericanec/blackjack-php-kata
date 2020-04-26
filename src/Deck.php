<?php


class Deck
{
    private $cards;
    /**
     * Deck constructor.
     */
    public function __construct()
    {
        $this->cards = array('2', '3', '4', '5', '6', '7', '8', '9', '10', 'J', 'Q', 'K', 'A');
    }

    public function shuffle()
    {
        shuffle($this->cards);
    }

    public function takeOne()
    {
        return array_pop($this->cards);
    }

}