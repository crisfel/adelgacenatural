<?php

namespace App\Repositories\Contracts\Records;

use Illuminate\Http\UploadedFile;

interface RecordRepositoryInterface
{
    public function getRecords(string $id, string $order);

    public function getRecordById(string $id);

    public function save(
        string $age,
        string $size,
        string $bloodPressure,
        string $heartbeat,
        string $temperature,
        string $glucometer,
        string $lastFood,
        string $oximetry,
        string $oximetryLevel,
        string $bust,
        string $waist,
        string $hip,
        string $leftBicep,
        string $rightBicep,
        string $leftCalf,
        string $rightCalf,
        string $adipometer,
        string $weight,
        string $imc,
        string $metabolicAge,
        string $bodyWater,
        string $visceralFat,
        string $boneMass,
        string $detox,
        ?array $detoxInput,
        string $userID,
        string $recommendations,
        string $news,
        ?UploadedFile $bodyPhoto
    ): bool;

    public function update(
        string $age,
        string $size,
        string $bloodPressure,
        string $heartbeat,
        string $temperature,
        string $glucometer,
        string $lastFood,
        string $oximetry,
        string $oximetryLevel,
        string $bust,
        string $waist,
        string $hip,
        string $leftBicep,
        string $rightBicep,
        string $leftCalf,
        string $rightCalf,
        string $adipometer,
        string $weight,
        string $imc,
        string $metabolicAge,
        string $bodyWater,
        string $visceralFat,
        string $boneMass,
        string $recordID,
        string $recommendations,
        string $news
    ): bool;
}
