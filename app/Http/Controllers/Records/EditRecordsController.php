<?php

namespace App\Http\Controllers\Records;

use App\Http\Controllers\Controller;
use App\Repositories\Contracts\Records\RecordRepositoryInterface;
use Illuminate\Http\Request;

class EditRecordsController extends Controller
{
    private RecordRepositoryInterface $recordRepository;

    public function __construct(RecordRepositoryInterface $recordRepository)
    {
        $this->recordRepository = $recordRepository;
    }

    public function __invoke($id)
    {
        $record = $this->recordRepository->getRecordById($id);

        return view('records.edit', compact('record', 'id'));
    }
}
