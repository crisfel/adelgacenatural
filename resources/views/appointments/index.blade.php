@extends('layouts.dashboard')
@section('content')
    @if(Session::has('SuccessfulAppointmentStor'))
        <div class="alert alert-success" role="alert">
            <p class="text-center text-white">{{ Session::get('SuccessfulAppointmentStor') }}</p>
        </div>
    @endif
    @if(Session::has('FailedAppointmentStore'))
        <div class="alert alert-warning" role="alert">
            <p class="text-center text-white">{{ Session::get('FailedAppointmentStore') }}</p>
        </div>
    @endif
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-12">
                <div class="card my-4">
                    <div class="card-header p-0 position-relative mt-n4 mx-2 z-index-2">
                        <div class="bg-success bg-gradient shadow-primary rounded-bottom pt-1 pb-0">
                            <h6 class="text-white text-center text-capitalize ps-2 mx-6 p-3">
                                Citas
                                @if (Auth::user()->role == 'patient')
                                    <a href="{{route('appointments.create')}}" class="btn btn-block btn-Secondary"><i style="color: white; margin-top: 13px;" class="material-icons opacity-10">library_add</i></a></h6>
                                @endif
                        </div>
                    </div>
                    <div class="card-body px-0 pb-2">
                        <div class="table-responsive p-0">
                            <table id="my_table" class="table align-items-center table-striped table-bordered mb-0">
                                <thead>
                                <tr>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Estado</th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Fecha</th>
                                    @if (Auth::user()->role == 'administrator' || Auth::user()->role == 'therapist')
                                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Paciente</th>
                                    @endif
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Teléfono</th>
                                    @if (Auth::user()->role == 'administrator' || Auth::user()->role == 'therapist')
                                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Aceptar/Rechazar</th>
                                    @endif
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Acción</th>
                                </tr>
                                </thead>
                                <tbody>
                                    @foreach ($appointments as $appointment)
                                        <tr class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            <td style="vertical-align: middle;">
                                                @if ($appointment->status == 'requested')
                                                    <span style="color:white;" class="bg-primary p-1 rounded">Solicitada</span>
                                                @endif
                                                    @if ($appointment->status == 'accepted')
                                                        <span style="color:white;" class="bg-success p-1 rounded">Aceptada</span>
                                                    @endif
                                                    @if ($appointment->status == 'rejected')
                                                        <span style="color:white;" class="bg-danger p-1 rounded">Rechazada</span>
                                                    @endif
                                            </td>
                                            <td>{{$appointment->date}} {{$appointment->time}}</td>
                                            @if (Auth::user()->role == 'administrator' || Auth::user()->role == 'therapist')
                                                <td>{{$appointment->patient->name}}</td>
                                            @endif
                                            <td>{{$appointment->patient->cellphone}}</td>
                                            @if (Auth::user()->role == 'administrator' || Auth::user()->role == 'therapist')
                                                <td>
                                                    <select class="form-control" id="change-status-select{{$appointment->id}}" onchange="changeStatus({{$appointment->id}})">
                                                        <option class="text-center" value="option">Seleccione una opción</option>
                                                        <option class="text-center" value="accepted">Aceptar</option>
                                                        <option class="text-center" value="rejected">Rechazar</option>
                                                    </select>
                                                </td>
                                            @endif
                                            <td>
                                                <div class="d-flex justify-content-center">
                                                    <div class="d-inline">
                                                        <button type="button" class="btn btn-white p-1" data-bs-toggle="modal" data-bs-target="#appointmentDetailModal" title="Detalle"
                                                                @if ($appointment->status == 'accepted')
                                                                    data-status="Aceptada"
                                                                @elseif ($appointment->status == 'rejected')
                                                                    data-status="Rechazada"
                                                                @else
                                                                    data-status="Solicitada"
                                                                @endif
                                                                data-datetime="{{$appointment->date}} {{$appointment->time}}"
                                                                data-patient="{{$appointment->patient->name}}"
                                                                data-cellphone="{{$appointment->patient->cellphone}}"
                                                                data-comment="{{$appointment->comment}}"><a style="color: darkgreen;" >
                                                                <i style="color: darkblue; font-size: 25px !important;" class="material-icons opacity-10">add</i></a>
                                                        </button>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="appointmentDetailModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalMessageTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h6 class="modal-title" id="extraInfoModalLabel">Información de la cita</h6>
                    <button type="button" class="btn-close text-dark" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <table class="table table-striped">
                        <tbody style="color:black !important;" class="text-center">
                            <tr>
                                <td>
                                    <b>Fecha:</b>
                                </td>
                                <td>
                                    <p style="color:black;" id="date-def"></p>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <b>Estatus:</b>
                                </td>
                                <td>
                                    <p style="color:black;" id="status-def"></p>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <b>Paciente</b>
                                </td>
                                <td>
                                    <p style="color:black;" id="patient-def"></p>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <b>Celular</b>
                                </td>
                                <td>
                                    <p style="color:black;" id="cellphone-def"></p>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <b>Comentario</b>
                                </td>
                                <td>
                                    <p style="color:black;" id="comment-def"></p>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>


    <form method="POST" action="{{route('appointments.change-status')}}" id="change-status-form">
        @csrf
        <input type="hidden" name="appointmentID" id="appointmentID">
        <input type="hidden" name="status" id="status">
    </form>
    <script type="text/javascript">
        function changeStatus(id)
        {
            var select = document.getElementById('change-status-select'+id);
            var form = document.getElementById('change-status-form');
            var status = document.getElementById('status');
            var appointmentID = document.getElementById('appointmentID');

           if (select.value !== 'option') {
               status.value = select.value;
               appointmentID.value = id;
               form.submit();
           }
        }
    </script>
    <script>
        $('#appointmentDetailModal').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget);
            document.getElementById("date-def").innerHTML = button.data('datetime');
            document.getElementById("status-def").innerHTML = button.data('status');
            document.getElementById("patient-def").innerHTML = button.data('patient');
            document.getElementById("cellphone-def").innerHTML = button.data('cellphone');
            document.getElementById("comment-def").innerHTML = button.data('comment');
        });
    </script>
@endsection
