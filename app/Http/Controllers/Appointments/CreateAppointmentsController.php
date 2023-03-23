<?php

namespace App\Http\Controllers\Appointments;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CreateAppointmentsController extends Controller
{
    public function __invoke()
    {
        return view('appointments.create');
    }
}
