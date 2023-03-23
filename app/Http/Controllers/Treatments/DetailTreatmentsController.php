<?php

namespace App\Http\Controllers\Treatments;

use App\Http\Controllers\Controller;
use App\UseCases\Contracts\Treatments\DetailTreatmentUseCaseInterface;
use Illuminate\Http\Request;

class DetailTreatmentsController extends Controller
{
    private DetailTreatmentUseCaseInterface $detailTreatmentUseCase;

    public function __construct(DetailTreatmentUseCaseInterface $detailTreatmentUseCase)
    {
        $this->detailTreatmentUseCase = $detailTreatmentUseCase;
    }


    public function __invoke($id)
    {
        $treatment = $this->detailTreatmentUseCase->handle($id);

        return view('treatments.detail', compact('treatment'));
    }


}
