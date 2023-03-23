<?php

namespace App\Http\Controllers\Treatments;

use App\Http\Controllers\Controller;
use App\UseCases\Contracts\Treatments\EditTreatmentsUseCaseInterface;
use Illuminate\Http\Request;

class EditTreatmentsController extends Controller
{
    private EditTreatmentsUseCaseInterface $editTreatmentsUseCase;

    public function __construct(EditTreatmentsUseCaseInterface $editTreatmentsUseCase)
    {
        $this->editTreatmentsUseCase = $editTreatmentsUseCase;
    }

    public function __invoke($id)
    {
       $treatment = $this->editTreatmentsUseCase->handle($id);

       return view('treatments.edit', compact('treatment'));

    }
}
