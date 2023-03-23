<?php

namespace App\Http\Controllers\Appointments;

use App\Http\Controllers\Controller;
use App\Repositories\Contracts\Appointments\AppointmentRepositoryInterface;
use Illuminate\Http\Request;

class StoreAppointmentsController extends Controller
{
    private AppointmentRepositoryInterface $appointmentRepository;

    public function __construct(AppointmentRepositoryInterface $appointmentRepository)
    {
        $this->appointmentRepository = $appointmentRepository;
    }

    /**
     * @throws \Illuminate\Validation\ValidationException
     */
    public function __invoke(Request $request): \Illuminate\Http\RedirectResponse
    {
        $fields = [
            'date' => 'required|string',
            'time' => 'required|string',
        ];

        $message = [
            'required' => 'El :atribute es requerido'
        ];

        $this->validate($request, $fields, $message);

        $date = $request->input('date');
        $time = $request->input('time');
        $comment = $request->input('comment');
        $appointmentSaved = $this->appointmentRepository->save($date, $time, $comment);

        if (! $appointmentSaved) {
            return redirect()->route('appointments.index')
                ->with('FailedAppointmentStore', 'No se pudo solicitar cita');
        }

        return redirect()->route('appointments.index')
            ->with('SuccessfulAppointmentStore', 'Cita solicitada');
    }
}
