<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use App\Repositories\Contracts\Users\UserRepositoryInterface;
use Illuminate\Http\Request;

class EnableUsersController extends Controller
{
    private UserRepositoryInterface $userRepository;

    public function __construct(UserRepositoryInterface $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function __invoke(Request $request): \Illuminate\Http\RedirectResponse
    {
        $userID = intval($request->input('userID'));
        $isEnabled = intval($request->input('is-enabled'));
        $this->userRepository->enableByIdAndBoolean($userID, $isEnabled);

        return back();
    }
}
