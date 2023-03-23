<?php

namespace App\UseCases\Contracts\Users;

interface DeleteUsersUseCaseInterface
{
    public function handle($id):bool;
}
