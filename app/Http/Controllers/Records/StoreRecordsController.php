<?php

namespace App\Http\Controllers\Records;

use App\Http\Controllers\Controller;
use App\Repositories\Contracts\Records\RecordRepositoryInterface;
use Illuminate\Http\Request;

class StoreRecordsController extends Controller
{
    /**
     * @throws \Illuminate\Validation\ValidationException
     */

    private RecordRepositoryInterface $recordRepository;

    public function __construct(RecordRepositoryInterface $recordRepository)
    {
        $this->recordRepository = $recordRepository;
    }

    public function __invoke(Request $request): \Illuminate\Http\RedirectResponse
    {
        $fields = [
            'age' => 'required|string',
            'size' => 'required|string',
            'blood_pressure' => 'required|string',
            'heartbeat' => 'required|string',
            'temperature' => 'required|string',
            'glucometer' => 'required|string',
            'last_food' => 'required|string',
            'oximetry' => 'required|string',
            'oximetry_level' => 'required|string',
            'bust' => 'required|string',
            'waist' => 'required|string',
            'hip' => 'required|string',
            'left_bicep' => 'required|string',
            'right_bicep' => 'required|string',
            'left_calf' => 'required|string',
            'right_calf' => 'required|string',
            'adipometer' => 'required|string',
            'weight' => 'required|string',
            'imc' => 'required|string',
            'metabolic_age' => 'required|string',
            'body_water' => 'required|string',
            'visceral_fat' => 'required|string',
            'bone_mass' => 'required|string',
            'detox' => 'required|string',
            'body-photo' => 'mimes:jpg,jpeg,png',
        ];

        $message = [
            'required' => ':attribute es requerido'
        ];

        $this->validate($request, $fields, $message);

        $age = $request->input('age');
        $size = $request->input('size');
        $bloodPressure =  $request->input('blood_pressure');
        $heartbeat = $request->input('heartbeat');
        $temperature = $request->input('temperature');
        $glucometer = $request->input('glucometer');
        $lastFood = $request->input('last_food');
        $oximetry = $request->input('oximetry');
        $oximetryLevel = $request->input('oximetry_level');
        $bust = $request->input('bust');
        $waist = $request->input('waist');
        $hip = $request->input('hip');
        $leftBicep = $request->input('left_bicep');
        $rightBicep = $request->input('right_bicep');
        $leftCalf = $request->input('left_calf');
        $rightCalf = $request->input('right_calf');
        $adipometer = $request->input('adipometer');
        $weight = $request->input('weight');
        $imc = $request->input('imc');
        $metabolicAge = $request->input('metabolic_age');
        $bodyWater = $request->input('body_water');
        $visceralFat = $request->input('visceral_fat');
        $boneMass = $request->input('bone_mass');
        $detox = $request->input('detox');
        $detoxInput = $request->input('detox_input');
        $userID = $request->input('userID');
        $recommendations = $request->input('recommendations');
        $news = $request->input('news');
        $bodyPhoto =  $request->file('body-photo');

        $recordSaved = $this->recordRepository->save(
            $age,
            $size,
            $bloodPressure,
            $heartbeat,
            $temperature,
            $glucometer,
            $lastFood,
            $oximetry,
            $oximetryLevel,
            $bust,
            $waist,
            $hip,
            $leftBicep,
            $rightBicep,
            $leftCalf,
            $rightCalf,
            $adipometer,
            $weight,
            $imc,
            $metabolicAge,
            $bodyWater,
            $visceralFat,
            $boneMass,
            $detox,
            $detoxInput,
            $userID,
            $recommendations,
            $news,
            $bodyPhoto
        );

        if (! $recordSaved) {
            return redirect()->route('records.index', ['id' => $userID])
                ->with('FailedRecordsStore', 'Registro no adicionado');
        }

        return redirect()->route('records.index', ['id' => $userID])
            ->with('SuccessfulRecordsStore', 'Registro adicionado');
    }
}
