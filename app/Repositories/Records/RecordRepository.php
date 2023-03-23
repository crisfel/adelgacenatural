<?php

namespace App\Repositories\Records;

use App\Models\record;
use App\Repositories\Contracts\Records\RecordRepositoryInterface;
use GuzzleHttp\Client;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\Request as RequestAlias;

class RecordRepository implements RecordRepositoryInterface
{
    public function getRecords(string $id, string $order)
    {
        return Record::where('user_id', $id)->orderBy('created_at', $order)->get();
    }

    public function getRecordById($id)
    {
        return Record::find($id);
    }

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
        ?string $recommendations,
        ?string $news,
        ?UploadedFile $bodyPhoto
    ): bool
    {
        date_default_timezone_set('America/Bogota');
        $record = new Record();
        $record->age = $age;
        $record->size = $size;
        $record->blood_pressure = $bloodPressure;
        $record->heartbeat = $heartbeat;
        $record->temperature = $temperature;
        $record->glucometer = $glucometer;
        $record->last_food = $lastFood;
        $record->oximetry = $oximetry;
        $record->oximetry_level = $oximetryLevel;
        $record->bust = $bust;
        $record->waist = $waist;
        $record->hip = $hip ;
        $record->left_bicep = $leftBicep;
        $record->right_bicep = $rightBicep;
        $record->left_calf = $leftCalf;
        $record->right_calf = $rightCalf;
        $record->adipometer = $adipometer;
        $record->weight = $weight;
        $record->imc = $imc;
        $record->metabolic_age = $metabolicAge;
        $record->body_water = $bodyWater;
        $record->visceral_fat = $visceralFat;
        $record->bone_mass = $boneMass;
        $record->user_id = $userID;
        $record->recommendations = $recommendations;
        $record->news = $news;

        if (! is_null($detoxInput)) {
            $becomeInteger = function ($s) {
                return intVal($s);
            };
            $detoxInput = array_map($becomeInteger, $detoxInput);
            $record->detox  = array_sum($detoxInput);
        }

        $record->save();

        if (isset($bodyPhoto)) {
            $pathName = sprintf('body_images/%s.png', $record->id);
            Storage::disk('public')->put($pathName, file_get_contents($bodyPhoto));
            $client = new Client();
            $url = "https://adelgacenatural.com/upload.php";

            $client->request(RequestAlias::METHOD_POST, $url, [
                'multipart' => [
                    [
                        'name' => 'image',
                        'contents' => fopen(
                            str_replace(
                                '\\',
                                '/',
                                Storage::path('public\body_images\\' . $record->id . '.png')
                            ),
                            'r'
                        )
                    ],
                    [
                        'name' => 'path',
                        'contents' => 'body_images'
                    ]
                ]
            ]);
            $record->body_photo_url = '/storage/body_images/' . $record->id . '.png';
            $record->save();
            unlink(str_replace('\\', '/', storage_path('app/public/body_images/'.$record->id.'.png')));
        }







            return true;
    }

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
        ?string $recommendations,
        ?string $news
    ): bool
    {
        $record = Record::find($recordID);
        $record->age = $age;
        $record->size = $size;
        $record->blood_pressure = $bloodPressure;
        $record->heartbeat = $heartbeat;
        $record->temperature = $temperature;
        $record->glucometer = $glucometer;
        $record->last_food = $lastFood;
        $record->oximetry = $oximetry;
        $record->oximetry_level = $oximetryLevel;
        $record->bust = $bust;
        $record->waist = $waist;
        $record->hip = $hip ;
        $record->left_bicep = $leftBicep;
        $record->right_bicep = $rightBicep;
        $record->left_calf = $leftCalf;
        $record->right_calf = $rightCalf;
        $record->adipometer = $adipometer;
        $record->weight = $weight;
        $record->imc = $imc;
        $record->metabolic_age = $metabolicAge;
        $record->body_water = $bodyWater;
        $record->visceral_fat = $visceralFat;
        $record->bone_mass = $boneMass;
        $record->recommendations = $recommendations;
        $record->news = $news;
        $record->save();

        return true;
    }

}
