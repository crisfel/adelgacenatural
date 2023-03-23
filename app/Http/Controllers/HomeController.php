<?php

namespace App\Http\Controllers;

use App\Repositories\Contracts\Appointments\AppointmentRepositoryInterface;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    private AppointmentRepositoryInterface $appointmentRepository;


    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(AppointmentRepositoryInterface $appointmentRepository)
    {
        $this->middleware('auth');
        $this->appointmentRepository = $appointmentRepository;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $appointments = $this->appointmentRepository->getAllAppointmentsById();
        return view('appointments.index', compact('appointments'));
    }
}
