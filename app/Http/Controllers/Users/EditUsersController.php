<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use App\UseCases\Contracts\Users\EditUsersUseCaseInterface;

class EditUsersController extends Controller
{
    private EditUsersUseCaseInterface $editUsersUseCase;

    public function __construct(EditUsersUseCaseInterface $editUsersUseCase)
    {
      $this->editUsersUseCase = $editUsersUseCase;
    }


    public function __invoke($id)
    {
        $user = $this->editUsersUseCase->handle($id);

        return view('users.edit', compact('user'));
    }
}
