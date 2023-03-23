<?php

namespace App\UseCases\Users;

use App\Repositories\Contracts\Users\UserRepositoryInterface;
use App\UseCases\Contracts\Users\DeleteUsersUseCaseInterface;

class DeleteUsersUseCase implements DeleteUsersUseCaseInterface
{
    private UserRepositoryInterface $userRepository;

    public function __construct(UserRepositoryInterface $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function handle($id):bool
    {
       $userDeleted = $this->userRepository->delete($id);
       return true;
    }
}
