<?php

class Dealer
{
    private array $cards;

    public function initCards(array $cards): void
    {
        $this->cards = $cards;
    }

    public function getCards(): array
    {
        return $this->cards;
    }

    public function getNextAction(): string
    {
        if ($this->calculate($this->cards) >= 17) {
            return 'перестает брать карты';
        } else {
            return 'взять еще карту';
        }
    }

    private function calculate(array $cards): int
    {
        $result = 0;
        foreach ($cards as $card) {
            if (is_numeric($card)) {
                $result += (int)$card;
            } elseif (in_array($card, ['J', 'Q', 'K'])) {
                $result += 10;
            } else {
                $result += $result + 11 > 21 ? 1 : 11;
            }
        }

        if ($result > 21 && in_array('A', $cards, true)) {
            $result -= 10;
        }

        return $result;
    }
}