<?php

namespace App\Repositories\Appointments;

use App\Mail\AppointmentMail;
use App\Mail\GeneralMail;
use App\Models\Appointment;
use App\Models\User;
use App\Repositories\Contracts\Appointments\AppointmentRepositoryInterface;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class AppointmentRepository implements AppointmentRepositoryInterface
{
    public function getAllAppointmentsById()
    {
        if (Auth::user()->role == 'administrator' || Auth::user()->role == 'therapist') {
            $appointments = Appointment::where('therapist_id', Auth::user()->id)->orderBy('created_at', 'desc')->get();
        } else {
            $appointments = Appointment::where('patient_id', Auth::user()->id)->orderBy('created_at', 'desc')->get();
        }

        return $appointments;
    }

    public function save(string $date, string $time, ?string $comment): bool
    {
        $user = User::find(Auth::user()->id);
        $appointment = new Appointment();
        $appointment->date = $date;
        $appointment->time = $time;
        $appointment->comment = $comment;
        $appointment->status = 'requested';
        $appointment->patient_id = $user->id;
        $appointment->therapist_id = $user->therapist->id;
        $appointment->save();

        $text = 'Hola, has recibido una solicitud de cita, por favor revisa la sección de citas en la plataforma.<br><br>Cordialmente Adelgace Naturalmente.';
        $subject = 'Solicitud de cita';

        Mail::to($user->therapist->email)->send(new AppointmentMail($subject, $text));
        return true;
    }

    public function changeStatus($appointmentID, $status)
    {
        $appointment = Appointment::find($appointmentID);
        $appointment->status = $status;
        $appointment->save();
    }

}
