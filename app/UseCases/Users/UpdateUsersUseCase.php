<?php

namespace App\UseCases\Users;

use App\Repositories\Contracts\Users\UserRepositoryInterface;
use App\UseCases\Contracts\Users\UpdateUsersUseCaseInterface;
use Illuminate\Http\UploadedFile;

class UpdateUsersUseCase implements UpdateUsersUseCaseInterface
{
    public UserRepositoryInterface $userRepository;

    public function __construct(UserRepositoryInterface $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function handle(string $name, string $email, string $cellphone, ?string $password, ?UploadedFile $userIMG, ?int $age,
                           ?string $occupation, ?string $maritalStatus, ?string $religion, ?string $locality,
                           ?string $pathologicalHistory, ?string $cardiovascular, ?string $pulmonary, ?string $digestive,
                           ?string $diabetes, ?string $kidney, ?string $clottingProblems, ?string $surgical, ?string $allergies,
                           ?string $medicines, ?int $alcohol, ?int $smoking, ?int $dope, ?string $familyBackground,
                           ?string $emotionalBackground, ?string $comment, string $role, int $userID)
    {

        return $this->userRepository->update(
                $name,
                $email,
                $cellphone,
                $password,
                $userIMG,
                $age,
                $occupation,
                $maritalStatus,
                $religion,
                $locality,
                $pathologicalHistory,
                $cardiovascular,
                $pulmonary,
                $digestive,
                $diabetes,
                $kidney,
                $clottingProblems,
                $surgical,
                $allergies,
                $medicines,
                $alcohol,
                $smoking,
                $dope,
                $familyBackground,
                $emotionalBackground,
                $comment,
                $role,
                $userID
        );

    }
}
