<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use App\Repositories\Contracts\Treatments\TreatmentRepositoryInterface;
use App\Repositories\Contracts\Users\UserRepositoryInterface;
use function view;

class AssignTreatmentsUsersController extends Controller
{
    private TreatmentRepositoryInterface $treatmentRepository;
    private UserRepositoryInterface $userRepository;

    public function __construct(TreatmentRepositoryInterface $treatmentRepository, UserRepositoryInterface $userRepository)
    {
        $this->treatmentRepository = $treatmentRepository;
        $this->userRepository = $userRepository;
    }

    public function __invoke($id): \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Contracts\Foundation\Application
    {
        $treatments = $this->treatmentRepository->getTreatments();
        $patientTreatments = $this->userRepository->getTreatmentsOfPatient($id);

        return view('users.assign', ['treatments' => $treatments, 'patientTreatments' => $patientTreatments, 'userID' => $id]);
    }
}
