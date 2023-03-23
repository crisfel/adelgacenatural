<?php

namespace App\UseCases\Treatments;

use App\Repositories\Contracts\Treatments\TreatmentRepositoryInterface;
use App\UseCases\Contracts\Treatments\EditTreatmentsUseCaseInterface;

class EditTreatmentsUseCase implements EditTreatmentsUseCaseInterface
{
    private TreatmentRepositoryInterface $treatmentRepository;

    public function __construct(TreatmentRepositoryInterface $treatmentRepository)
    {
        $this->treatmentRepository = $treatmentRepository;
    }

    public function handle($id)
    {
        return $this->treatmentRepository->getTreatmentByID($id);
    }
}
