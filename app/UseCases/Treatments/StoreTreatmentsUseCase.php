<?php

namespace App\UseCases\Treatments;

use App\Repositories\Contracts\Treatments\TreatmentRepositoryInterface;
use App\UseCases\Contracts\Treatments\StoreTreatmentsUseCaseInterface;
use Illuminate\Http\UploadedFile;

class StoreTreatmentsUseCase implements StoreTreatmentsUseCaseInterface
{
    private TreatmentRepositoryInterface $treatmentRepository;

    public function __construct(TreatmentRepositoryInterface $treatmentRepository)
    {
        $this->treatmentRepository = $treatmentRepository;
    }

    public function handle(string $title, string $description, ?UploadedFile $treatmentIMG, UploadedFile $treatmentPDF): bool
    {
        return $this->treatmentRepository->save($title, $description, $treatmentIMG, $treatmentPDF);
    }
}
