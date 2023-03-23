<?php

namespace App\Http\Controllers\Treatments;

use App\Http\Controllers\Controller;
use App\UseCases\Contracts\Treatments\DeleteTreatmentsUseCaseInterface;
use Illuminate\Http\Request;

class DeleteTreatmentsController extends Controller
{
    private DeleteTreatmentsUseCaseInterface $deleteTreatmentsUseCase;

    public function __construct(DeleteTreatmentsUseCaseInterface $deleteTreatmentsUseCase)
    {
        $this->deleteTreatmentsUseCase = $deleteTreatmentsUseCase;
    }

    public function __invoke($id)
    {
        $treatmentDeleted = $this->deleteTreatmentsUseCase->handle($id);

        if (! $treatmentDeleted) {
            return back()
                ->with('FailedTreatmentDelete', 'No se pudo eliminar el tratamiento');
        }

        return back()
            ->with('SuccessfulTreatmentDelete', 'Tratamiento eliminado con éxito');
    }
}
