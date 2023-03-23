<?php

namespace App\Http\Controllers\Records;

use App\Http\Controllers\Controller;
use App\Repositories\Contracts\Records\RecordRepositoryInterface;
use App\UseCases\Contracts\Records\GetQuantitiesAndDatesUseCaseInterface;
use Illuminate\Http\Request;

class IndexRecordsController extends Controller
{
    private RecordRepositoryInterface $recordRepository;
    private GetQuantitiesAndDatesUseCaseInterface $getQuantitiesAndDatesUseCase;

    public function __construct(RecordRepositoryInterface $recordRepository, GetQuantitiesAndDatesUseCaseInterface $getQuantitiesAndDatesUseCase)
    {
        $this->recordRepository = $recordRepository;
        $this->getQuantitiesAndDatesUseCase = $getQuantitiesAndDatesUseCase;
    }

    public function __invoke($id)
    {
        $records = $this->recordRepository->getRecords($id, 'desc');
        $chartData = $this->getQuantitiesAndDatesUseCase->handle($id);
        array_pop($chartData['categories']);

        return view('records.index', compact('records', 'id', 'chartData'));

    }
}
