<?php

class Player
{
    private string $name;
    private string $surname;
    private int $credits;

    public function __construct($name, $surname, $credits)
    {
        $this->name = $name;
        $this->surname = $surname;
        $this->credits = $credits;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getSurname(): string
    {
        return $this->surname;
    }

    public function getCredits(): int
    {
        return $this->credits;
    }

    public function updateCredits($amount)
    {
        $this->credits += $amount;
    }
}
