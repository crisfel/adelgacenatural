<?php

namespace App\Http\Controllers\Treatments;

use App\Http\Controllers\Controller;
use App\UseCases\Contracts\Treatments\StoreTreatmentsUseCaseInterface;
use Illuminate\Http\Request;

class StoreTreatmentsController extends Controller
{
    private StoreTreatmentsUseCaseInterface $storeTreatmentsUseCase;

    public function __construct(StoreTreatmentsUseCaseInterface $storeTreatmentsUseCase)
    {
        $this->storeTreatmentsUseCase = $storeTreatmentsUseCase;
    }

    /**
     * @throws \Illuminate\Validation\ValidationException
     */
    public function __invoke(Request $request)
    {
        // Here it validates the request
        $fields = [
            'title' => 'required|string',
            'description' => 'required|string',
            'treatment_img' => 'mimes:jpg,jpeg,png',
            'treatment_file' => 'required|mimes:pdf'
        ];

        $message = [
            'required'=>':attribute es requerido',
        ];

        $this->validate($request, $fields, $message);

        // Set variables with request's inputs
        $title = $request->input('title');
        $description = $request->input('description');
        $treatmentIMG = $request->file('treatment_img');
        $treatmentPDF = $request->file('treatment_file');
        $treatmentSaved = $this->storeTreatmentsUseCase->handle($title, $description, $treatmentIMG, $treatmentPDF);

        if (! $treatmentSaved) {
            return redirect()->route('treatments.index')
                ->with('FailedTreatmentStore', 'No se pudo registrar el tratamiento');
        }

        return redirect()->route('treatments.index')
            ->with('SuccessfulTreatmentStore', 'Tratamiento registrado con éxito');
    }
}
