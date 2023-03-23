<?php

namespace App\UseCases\Contracts\Treatments;

use Illuminate\Http\UploadedFile;

interface UpdateTreatmentsUseCaseInterface
{
    public function handle(string $title, string $description, ?UploadedFile $treatmentIMG, ?UploadedFile $treatmentFile, $treatmentID):bool;

}
