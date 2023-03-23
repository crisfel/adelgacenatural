<?php

namespace App\Http\Controllers\Treatments;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CreateTreatmentsController extends Controller
{
    public function __invoke()
    {
        return view('treatments.create');
    }
}
