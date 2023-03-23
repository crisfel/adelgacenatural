<?php

namespace App\UseCases\Users;

use App\Repositories\Contracts\Users\UserRepositoryInterface;
use App\UseCases\Contracts\Users\IndexUsersUseCaseInterface;

class IndexUsersUseCase implements IndexUsersUseCaseInterface
{
    private UserRepositoryInterface $userRepository;

    public function __construct(UserRepositoryInterface $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function handle($role)
    {
        $users = $this->userRepository->getByRole($role);

        return $users;
    }

}
