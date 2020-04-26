<?php

use Behat\Behat\Context\Context;
use Behat\Gherkin\Node\TableNode;
use function PHPUnit\Framework\assertEquals;

/**
 * Defines application features from the specific context.
 */
class FeatureContext implements Context
{
    private $player;
    private $error;
    private $game;

    public function __construct()
    {
        $this->player = new Player();
    }

    /**
     * @When /^Игорь хочет испытать удачу в blackjack$/
     */
    public function игорьХочетИспытатьУдачуВBlackjack()
    {
        $this->player->join(new Blackjack());
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
        $cards = $this->player->game->dealerDealsCards();
        assertEquals($cardsCount, count($cards));
    }
}
