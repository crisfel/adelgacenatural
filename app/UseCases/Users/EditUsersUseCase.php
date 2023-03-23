<?php

namespace App\UseCases\Users;

use App\Repositories\Contracts\Users\UserRepositoryInterface;
use App\UseCases\Contracts\Users\EditUsersUseCaseInterface;

class EditUsersUseCase implements EditUsersUseCaseInterface
{
    private UserRepositoryInterface $userRepository;

    public function __construct(UserRepositoryInterface $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function handle($id)
    {
        return $this->userRepository->getById($id);
    }
}
