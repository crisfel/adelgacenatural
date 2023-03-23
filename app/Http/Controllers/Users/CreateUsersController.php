<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use App\UseCases\Contracts\Users\CreateUsersUseCaseInterface;

class CreateUsersController extends Controller
{
    private CreateUsersUseCaseInterface $createUsersUseCase;

    public function __construct(CreateUsersUseCaseInterface $createUsersUseCase)
    {
        $this->createUsersUseCase = $createUsersUseCase;
    }

    public function __invoke($role)
    {
        return view('users.create', compact('role'));
    }
}
