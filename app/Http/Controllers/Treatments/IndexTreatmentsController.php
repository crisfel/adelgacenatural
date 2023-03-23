<?php

namespace App\Http\Controllers\Treatments;

use App\Http\Controllers\Controller;
use App\UseCases\Contracts\Treatments\IndexTreatmentsUseCaseInterface;
use Illuminate\Http\Request;

class IndexTreatmentsController extends Controller
{
    private IndexTreatmentsUseCaseInterface $indexTreatmentsUseCase;

    public function __construct(IndexTreatmentsUseCaseInterface $indexTreatmentsUseCase)
    {
       $this->indexTreatmentsUseCase = $indexTreatmentsUseCase;
    }

    public function __invoke()
    {
        $treatments = $this->indexTreatmentsUseCase->handle();

        return view('treatments.index', compact('treatments'));

    }
}
