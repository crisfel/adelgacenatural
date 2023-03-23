<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use App\UseCases\Contracts\Users\DeleteUsersUseCaseInterface;

class DeleteUsersController extends Controller
{
    private DeleteUsersUseCaseInterface $deleteUsersUseCase;

    public function __construct(DeleteUsersUseCaseInterface $deleteUsersUseCase)
    {
        $this->deleteUsersUseCase = $deleteUsersUseCase;
    }

    public function __invoke($id)
    {
        $userDeleted = $this->deleteUsersUseCase->handle($id);

        if (! $userDeleted) {
            return back()
                ->with('FailedUserDelete', 'No se pudo eliminar el usuario');
        }

        return back()
            ->with('SuccessfulUserDelete', 'Usuario eliminado con éxito');

    }
}
