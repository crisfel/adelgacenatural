<?php

namespace App\UseCases\Contracts\Records;

interface GetQuantitiesAndDatesUseCaseInterface
{
    public function handle(string $userID);
}
