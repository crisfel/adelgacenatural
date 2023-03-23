<?php

namespace App\Http\Controllers\Appointments;

use App\Http\Controllers\Controller;
use App\Repositories\Contracts\Appointments\AppointmentRepositoryInterface;
use Illuminate\Http\Request;

class ChangeStatusAppointmentsController extends Controller
{
    private AppointmentRepositoryInterface $appointmentRepository;

    public function __construct(AppointmentRepositoryInterface $appointmentRepository)
    {
        $this->appointmentRepository = $appointmentRepository;
    }


    public function __invoke(Request $request)
    {
        $appointmentID = intval($request->input('appointmentID'));
        $status = $request->input('status');

        $this->appointmentRepository->changeStatus($appointmentID, $status);

        return back();

    }
}
