<?php

namespace App\UseCases\Treatments;

use App\Repositories\Contracts\Treatments\TreatmentRepositoryInterface;
use App\UseCases\Contracts\Treatments\IndexTreatmentsUseCaseInterface;

class IndexTreatmentsUseCase implements IndexTreatmentsUseCaseInterface
{
    private TreatmentRepositoryInterface $treatmentRepository;

    public function __construct(TreatmentRepositoryInterface $treatmentRepository)
    {
        $this->treatmentRepository = $treatmentRepository;
    }


    public function handle()
    {
        return $this->treatmentRepository->getTreatments();
    }

}
