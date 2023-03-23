<?php

namespace App\UseCases\Treatments;

use App\Repositories\Contracts\Treatments\TreatmentRepositoryInterface;
use App\UseCases\Contracts\Treatments\UpdateTreatmentsUseCaseInterface;
use Illuminate\Http\UploadedFile;

class UpdateTreatmentsUseCase implements UpdateTreatmentsUseCaseInterface
{
    private TreatmentRepositoryInterface $treatmentRepository;

    public function __construct(TreatmentRepositoryInterface $treatmentRepository)
    {
        $this->treatmentRepository = $treatmentRepository;
    }

    public function handle(string $title, string $description, ?UploadedFile $treatmentIMG, ?UploadedFile $treatmentFile, $treatmentID):bool
    {
        return $this->treatmentRepository->update($title, $description, $treatmentIMG, $treatmentFile, $treatmentID);
    }

}
