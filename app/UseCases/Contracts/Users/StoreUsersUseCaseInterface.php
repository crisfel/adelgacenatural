<?php

namespace App\UseCases\Contracts\Users;

use Illuminate\Http\UploadedFile;

interface StoreUsersUseCaseInterface
{
    public function handle(string $name, string $email, string $cellphone, string $password, ?UploadedFile $userIMG, ?int $age,
                           ?string $occupation, ?string $maritalStatus, ?string $religion, ?string $locality,
                           ?string $pathologicalHistory, ?string $cardiovascular, ?string $pulmonary, ?string $digestive,
                           ?string $diabetes, ?string $kidney, ?string $clottingProblems, ?string $surgical, ?string $allergies,
                           ?string $medicines, ?int $alcohol, ?int $smoking, ?int $dope, ?string $familyBackground,
                           ?string $emotionalBackground, ?string $comment, string $role);
}
