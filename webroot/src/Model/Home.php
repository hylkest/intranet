<?php
namespace src\Model;

class Home {
    private int $count;
    private string $month;

    public function __construct(int $count, string $month) {
        $this->count = $count;
        $this->month = $month;
    }

    public function getCount(): int {
        return $this->count;
    }

    public function getMonth(): string {
        return $this->month;
    }
}
