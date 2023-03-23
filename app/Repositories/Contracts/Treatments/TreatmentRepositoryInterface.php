<?php

namespace App\Repositories\Contracts\Treatments;

use Illuminate\Http\UploadedFile;

interface TreatmentRepositoryInterface
{
    public function getTreatments();
    public function save(string $title, string $description, ?UploadedFile $treatmentIMG, UploadedFile $treatmentPDF):bool;
    public function getTreatmentByID($id);
    public function update(string $title, string $description, ?UploadedFile $treatmentIMG, ?UploadedFile $treatmentFile, $treatmentID): bool;
    public function delete($id): bool;
}
