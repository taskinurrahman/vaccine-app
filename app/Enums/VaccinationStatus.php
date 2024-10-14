<?php

namespace App\Enums;

enum VaccinationStatus: int
{
    case NOT_REGISTERED = 0;
    case NOT_SCHEDULED = 1;
    case SCHEDULED = 2;
    case VACCINATED = 3;

    public function label(): string
    {
        return match($this) {
            self::NOT_REGISTERED => 'Not registered',
            self::NOT_SCHEDULED => 'Not scheduled',
            self::SCHEDULED => 'Scheduled',
            self::VACCINATED => 'Vaccinated',
        };
    }
}
