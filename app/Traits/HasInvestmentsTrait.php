<?php

namespace App\Traits;

trait HasInvestmentsTrait
{
    public function getTotalInvestmentAttribute()
    {
        return $this->projects()->sum('investment_target_total') ?? 0; // showing 0 only
    }

    public function getInvestmentTarget2016Attribute()
    {
        return $this->projects()->sum('investment_target_2016') ?? 0; // showing 0 only
    }

    public function getInvestmentTarget2017Attribute()
    {
        return $this->projects()->sum('investment_target_2017') ?? 0; // showing 0 only
    }

    public function getInvestmentTarget2018Attribute()
    {
        return $this->projects()->sum('investment_target_2018') ?? 0; // showing 0 only
    }

    public function getInvestmentTarget2019Attribute()
    {
        return $this->projects()->sum('investment_target_2019') ?? 0; // showing 0 only
    }

    public function getInvestmentTarget2020Attribute()
    {
        return $this->projects()->sum('investment_target_2020') ?? 0; // showing 0 only
    }

    public function getInvestmentTarget2021Attribute()
    {
        return $this->projects()->sum('investment_target_2021') ?? 0; // showing 0 only
    }

    public function getInvestmentTarget2022Attribute()
    {
        return $this->projects()->sum('investment_target_2022') ?? 0; // showing 0 only
    }

    public function getInvestmentTarget2023Attribute()
    {
        return $this->projects()->sum('investment_target_2023') ?? 0; // showing 0 only
    }

    public function getProjectCountAttribute()
    {
        return $this->projects()->count();
    }
}
