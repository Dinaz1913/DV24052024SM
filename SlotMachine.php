<?php

require_once 'Player.php';
require_once 'BoardDisplay.php';

class SlotMachine
{
    private Player $player;

    public function __construct(Player $player)
    {
        $this->player = $player;
    }

    public function play()
    {

        $player = $this->player;
        $playerCredits = $player->getCredits();
        $columns = (int)readline("Enter column quantity: ");

        $board = $this->generateBoard($columns);

        while ($playerCredits > 0) {
            echo "1. Enter amount of your bet. \n";
            $bet = (int)readline("Your Bet: ");
            echo "\n\n";
            if ($bet > $playerCredits) {
                echo "You don't have enough money to place this bet!\n";
                continue;
            }

            $player->updateCredits(-$bet);

            echo "1. Bet goes for horizontal lines full \n" .
                "2. Bet goes for vertical lines and horizontal full \n" .
                "3. Bet goes for diagonal lines and previous lines combined \n";
            $choice = (int)readline("Enter your combination: ");
            echo "\n\n";

            $outcomes = $this->checkTheWinner($board, $bet, $choice, $columns);
            $totalSum = array_sum($outcomes);

            echo "Your Win: " . implode(", ", $outcomes) . "\n\n";
            echo "Total Count: " . count($outcomes) . "\n\n";
            echo "Total Win: $totalSum\n\n";

            BoardDisplay::display($board, $columns);

            $player->updateCredits($totalSum);

            if ($playerCredits <= 0) {
                echo "\nYou've run out of money! Game over.\n";
                break;
            } else {
                echo "You have {$playerCredits} € remaining.\n\n";
            }
        }
    }

    private function generateBoard(int $columns): array
    {
        $gamingSymbols = json_decode(file_get_contents('gamingSymbols.json'));
        $board = [];
        for ($i = 0; $i < 3; $i++) {
            $row = [];
            for ($j = 0; $j < $columns; $j++) {
                $row[] = $gamingSymbols[rand(0, count($gamingSymbols) - 1)];
            }
            $board[] = $row;
        }
        return $board;
    }

    private function checkTheWinner(array $board, int $bet, int $choice, int $columns): array
    {
        return [];
    }
}
