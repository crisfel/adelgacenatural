<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use App\Repositories\Contracts\Users\UserRepositoryInterface;
use Illuminate\Http\Request;

class StoreAssignmentsUsersController extends Controller
{
    private UserRepositoryInterface $userRepository;

    public function __construct(UserRepositoryInterface $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function __invoke(Request $request)
    {
        $treatmentIDS = $request->input('treatmentID');
        $userID = $request->input('userID');

        $isAssigned = $this->userRepository->saveAssignments($treatmentIDS, $userID);

        if (! $isAssigned) {
            return redirect()->route('users.index', ['id' => 'patient'])
                ->with('FailedUserAssignment', 'No se pudo asignar los tratamientos');
        }

        return redirect()->route('users.index', ['id' => 'patient'])
            ->with('SuccessfulUserAssignment', 'Tratamientos asignados con éxito');

    }
}
