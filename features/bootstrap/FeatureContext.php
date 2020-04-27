<?php

use Behat\Behat\Context\Context;
use Behat\Gherkin\Node\TableNode;
use function PHPUnit\Framework\assertEquals;
use function PHPUnit\Framework\assertTrue;

/**
 * Defines application features from the specific context.
 */
class FeatureContext implements Context
{
    private Player $player;
    private $error;
    private Blackjack $game;

    public function __construct()
    {
        $this->player = new Player();
        $this->game = new Blackjack(new Dealer());
    }

    /**
     * @When /^Игорь хочет испытать удачу в blackjack$/
     */
    public function игорьХочетИспытатьУдачуВBlackjack()
    {
        $this->player->join($this->game);
    }

    /**
     * @When /^он делает ставку (\d+) фишек$/
     * @param $amount
     */
    public function онДелаетСтавкуФишек($amount)
    {
        $this->error = $this->player->bet($amount);
    }

    /**
     * @When /^дилер сообщает ему:$/
     * @param TableNode $table
     */
    public function дилерСообщаетЕму(TableNode $table)
    {
        $expected = $table->getRow(1)[0];
        assertEquals($expected, $this->error);
    }

    /**
     * @When /^дилер сдаёт ему (\d+) карты$/
     * @param $cardsCount
     */
    public function дилерСдаётЕмуКарты($cardsCount)
    {
        $cards = $this->game->dealerDealsCards();
        assertEquals($cardsCount, count($cards));
    }

    /**
     * @When /^дилер начинает набирать себе (.*)/
     */
    public function дилерНачинаетНабиратьСебе($карты)
    {
        $this->game->getDealer()->initCards($карты);
    }

    /**
     * @When /^дилер закончил брать карты$/
     */
    public function дилерЗакончилБратьКарты()
    {
        assertTrue(count($this->game->getDealer()->getCards()) >= 2);
    }

    /**
     * @When /^дилер совершает (.*)$/
     */
    public function дилерСовершает($действие)
    {
        assertEquals($this->game->getDealer()->getNextAction(), $действие);
    }


}
