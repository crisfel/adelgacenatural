<?php

namespace App\UseCases\Contracts\Treatments;

use Illuminate\Http\UploadedFile;

interface StoreTreatmentsUseCaseInterface
{
    public function handle(string $title, string $description, ?UploadedFile $treatmentIMG, UploadedFile $treatmentPDF):bool;
}
