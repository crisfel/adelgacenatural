<?php

namespace App\Http\Controllers\Treatments;

use App\Http\Controllers\Controller;
use App\UseCases\Contracts\Treatments\UpdateTreatmentsUseCaseInterface;
use Illuminate\Http\Request;

class UpdateTreatmentsController extends Controller
{
    private UpdateTreatmentsUseCaseInterface $updateTreatmentUseCase;

    public function __construct(UpdateTreatmentsUseCaseInterface $updateTreatmentUseCase)
    {
        $this->updateTreatmentUseCase = $updateTreatmentUseCase;
    }

    public function __invoke(Request $request)
    {
        $title = $request->input('title');
        $description = $request->input('description');
        $treatmentIMG = $request->file('treatment_img');
        $treatmentFile = $request->file('treatment_file');
        $treatmentID = $request->input('treatmentID');

        $treatmentUpdated = $this->updateTreatmentUseCase->handle($title, $description, $treatmentIMG, $treatmentFile, $treatmentID);

        if (! $treatmentUpdated) {
            return redirect()->route('treatments.index')
                ->with('FailedTreatmentUpdate', 'No se pudo modificar el tratamiento');
        }

        return redirect()->route('treatments.index')
            ->with('SuccessfulTreatmentUpdate', 'Tratamiento modificado con éxito');

    }
}
