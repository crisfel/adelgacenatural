<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use App\UseCases\Contracts\Users\IndexUsersUseCaseInterface;

class IndexUsersController extends Controller
{
    private IndexUsersUseCaseInterface $indexUsersUseCase;

    public function __construct(IndexUsersUseCaseInterface $indexUsersUseCase)
    {
        $this->indexUsersUseCase = $indexUsersUseCase;
    }

    public function __invoke($id)
    {
        $users = $this->indexUsersUseCase->handle($id);

        return view('users.index', compact('users', 'id'));
    }
}
