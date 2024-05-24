<?php

class BoardDisplay
{
    public static function display(array $board, int $columns)
    {
        echo "╔═══════════════════════════════════════════╗\n";
        echo "║               [Slot Machine]              ║\n";
        echo "╠═══════════════════════════════════════════╣\n";
        foreach ($board as $row) {
            echo "║ ";
            foreach ($row as $cell) {
                echo " $cell ";
                if ($j < $columns - 1) {
                    echo " | ";
                }
            }
            echo " ║\n";
        }
        echo "╠═══════════════════════════════════════════╣\n";
        echo "║                 [ LEVER ]                 ║\n";
        echo "╚═══════════════════════════════════════════╝\n";
    }
}
