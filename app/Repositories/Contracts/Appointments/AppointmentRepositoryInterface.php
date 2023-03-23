<?php

namespace App\Repositories\Contracts\Appointments;

interface AppointmentRepositoryInterface
{
    public function getAllAppointmentsById();
    public function save(string $date, string $time, ?string $comment): bool;
    public function changeStatus($appointmentID, $status);
}
