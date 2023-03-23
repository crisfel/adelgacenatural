<?php

namespace App\Http\Controllers\Appointments;

use App\Http\Controllers\Controller;
use App\Repositories\Contracts\Appointments\AppointmentRepositoryInterface;
use Illuminate\Http\Request;

class IndexAppointmentsController extends Controller
{
    private AppointmentRepositoryInterface $appointmentRepository;

    public function __construct(AppointmentRepositoryInterface $appointmentRepository)
    {
        $this->appointmentRepository = $appointmentRepository;
    }

    public function __invoke()
    {
        $appointments = $this->appointmentRepository->getAllAppointmentsById();

        return view('appointments.index', compact('appointments'));

    }
}
