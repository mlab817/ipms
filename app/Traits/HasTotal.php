<?php

namespace App\Traits;

trait HasTotal
{
    protected int $startYear = 2023;

    protected int $endYear = 2028;

    public function getTotalAttribute(): float
    {
        $total = 0;
        $currentYear = $this->startYear;

        while ($currentYear <= $this->endYear) {
            $total += floatval($this->{"y{$currentYear}"});
        }

        return $total;
    }

    public function initializeTotalAttributeTrait()
    {
        $this->append('total');
    }
}