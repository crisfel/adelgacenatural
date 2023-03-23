@extends('layouts.dashboard')
@section('content')
    @if(Session::has('SuccessfulUserStore'))
        <div class="alert alert-success" role="alert">
            <p class="text-center text-white">{{ Session::get('SuccessfulUserStore') }}</p>
        </div>
    @endif
    @if(Session::has('FailedUserStore'))
        <div class="alert alert-warning" role="alert">
            <p class="text-center text-white">{{ Session::get('FailedUserStore') }}</p>
        </div>
    @endif
    @if(Session::has('SuccessfulUserUpdate'))
        <div class="alert alert-success" role="alert">
            <p class="text-center text-white">{{ Session::get('SuccessfulUserUpdate') }}</p>
        </div>
    @endif
    @if(Session::has('FailedUserUpdate'))
        <div class="alert alert-warning" role="alert">
            <p class="text-center text-white">{{ Session::get('FailedUserUpdate') }}</p>
        </div>
    @endif
    @if(Session::has('SuccessfulUserDelete'))
        <div class="alert alert-success" role="alert">
            <p class="text-center text-white">{{ Session::get('SuccessfulUserDelete') }}</p>
        </div>
    @endif
    @if(Session::has('FailedUserDelete'))
        <div class="alert alert-warning" role="alert">
            <p class="text-center text-white">{{ Session::get('FailedUserDelete') }}</p>
        </div>
    @endif
    @if(Session::has('SuccessfulUserAssignment'))
        <div class="alert alert-success" role="alert">
            <p class="text-center text-white">{{ Session::get('SuccessfulUserAssignment') }}</p>
        </div>
    @endif
    @if(Session::has('FailedUserAssignment'))
        <div class="alert alert-warning" role="alert">
            <p class="text-center text-white">{{ Session::get('FailedUserAssignment') }}</p>
        </div>
    @endif
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-12">
                <div class="card my-4">
                    <div class="card-header p-0 position-relative mt-n4 mx-2 z-index-2">
                        <div class="bg-success bg-gradient shadow-primary rounded-bottom pt-1 pb-0">
                            <h6 class="text-white text-center text-capitalize ps-2 mx-6 p-3">
                                @if ($id == 'administrator')
                                    Administradores
                                @endif
                                @if ($id == 'therapist')
                                    Terapeutas
                                @endif
                                    @if ($id == 'patient')
                                        Pacientes
                                    @endif
                            <a href="{{route('users.create', ['role' => $id])}}" class="btn btn-block btn-Secondary"><i style="color: white; margin-top: 13px;" class="material-icons opacity-10">group_add</i></a></h6>
                        </div>
                    </div>
                    <div class="card-body px-0 pb-2">
                        <div class="table-responsive p-0">
                            <table id="my_table" class="table align-items-center table-striped table-bordered mb-0">
                                <thead>
                                    <tr>
                                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Foto</th>
                                        @if ($id == 'patient')
                                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Habilitar</th>
                                        @endif
                                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Nombre</th>
                                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Email</th>
                                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Celular</th>
                                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Acción</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach( $users as $user )
                                    <tr>
                                        <td class="align-middle text-center text-sm">
                                            @if (isset($user->url_img))
                                                <a class="image-link" href="https://adelgacenatural.com{{$user->url_img}}">
                                                    @else
                                                        <a href="#">
                                                    @endif
                                                <img class="rounded-2" width="100px" src="https://adelgacenatural.com{{$user->url_img}}" onError="this.onerror=null;this.src='https://app.adelgacenatural.com/img/without-photo.png';">
                                            </a>
                                        </td>
                                        @if ($id == 'patient')
                                            <td class="align-middle text-center text-sm">
                                                <div class="d-flex form-check form-switch justify-content-center">
                                                    @if ($user->is_enabled == 1)
                                                        <input class="form-check-input" type="checkbox" role="switch" id="switch{{$user->id}}" onchange="isEnabled({{$user->id}})" checked>
                                                    @else
                                                        <input class="form-check-input" type="checkbox" role="switch" id="switch{{$user->id}}" onchange="isEnabled({{$user->id}})">
                                                    @endif
                                                </div>
                                            </td>
                                        @endif
                                        <td class="align-middle text-center text-sm">{{ $user->name }}</td>
                                        <td class="align-middle text-center text-sm">{{ $user->email }}</td>
                                        <td class="align-middle text-center text-sm">{{ $user->cellphone }}</td>
                                        <td class="align-middle text-center text-sm">
                                            <div class="d-flex justify-content-center">
                                                <div class="d-inline">
                                                    <a style="color: darkgreen;" href="{{route('users.edit', ['id' => $user->id])}}" title="Editar" class="btn btn-link px-1 mb-0"><i style="color: darkgreen; font-size: 25px !important;" class="material-icons opacity-10">edit</i></a>
                                                </div>
                                                @if ($id == 'patient')
                                                    <div class="d-inline">
                                                        <a style="color: darkred;" href="{{route('assign.treatments', ['id' => $user->id])}}" title="Asignar tratamientos" class="btn btn-link px-1 mb-0"><i style="color: darkslategrey; font-size: 25px !important;" class="material-icons opacity-10">assignment_turned_in</i></a>
                                                    </div>
                                                    <div class="d-inline">
                                                        <a style="color: darkgreen;" href="{{route('records.index', ['id' => $user->id])}}" title="Historial" class="btn btn-link px-1 mb-0"><i style="color: darkorange; font-size: 25px !important;" class="material-icons opacity-10">list_alt</i></a>
                                                    </div>
                                                    <div class="d-inline">
                                                        <a style="color: darkgreen;" target="_blank" href="https://api.whatsapp.com/send?phone={{$user->cellphone}}&text=Hola, quisiéramos saber cómo estás, no olvides que para nosotros eres muy importante y queremos seguir acompañándote en tu proceso de baja de peso. https://www.app.adelgacenatural.com/login."

                                                           title="Enviar WhatsApp" class="btn btn-link px-1 mb-0"><i style="color: darkmagenta; font-size: 25px !important;" class="material-icons opacity-10">send</i></a>
                                                    </div>
                                                    <div class="d-inline">
                                                        <button type="button" class="btn btn-white p-1" data-bs-toggle="modal" data-bs-target="#extraInfoModal" title="Detalle"
                                                                data-name="{{$user->name}}"
                                                                data-age="{{$user->age}}"
                                                                data-cellphone="{{$user->cellphone}}"
                                                                data-occupation="{{$user->occupation}}"
                                                                data-marital_status="{{$user->marital_status}}"
                                                                data-religion="{{$user->religion}}"
                                                                data-locality="{{$user->locality}}"
                                                                data-pathological_history="{{$user->pathological_history}}"
                                                                data-cardiovascular="{{$user->cardiovascular}}"
                                                                data-pulmonary="{{$user->pulmonary}}"
                                                                data-digestive="{{$user->digestive}}"
                                                                data-diabetes="{{$user->diabetes}}"
                                                                data-kidney="{{$user->kidney}}"
                                                                data-clotting_problems="{{$user->clotting_problems}}"
                                                                data-surgical="{{$user->surgical}}"
                                                                data-allergies="{{$user->allergies}}"
                                                                data-medicines="{{$user->medicines}}"
                                                                data-alcohol="{{$user->alcohol}}"
                                                                data-smoking="{{$user->smoking}}"
                                                                data-dope="{{$user->dope}}"
                                                                data-family_background="{{$user->family_background}}"
                                                                data-emotional_background="{{$user->emotional_background}}"
                                                                data-comment="{{$user->comment}}"
                                                        ><a style="color: darkgreen;" ><i style="color: darkblue; font-size: 25px !important;" class="material-icons opacity-10">add</i></a></button>
                                                    </div>
                                                    <form method="GET" id="whatsapp-form" action="https://api.whatsapp.com/send">

                                                    </form>
                                                @endif
                                                <div class="d-inline">
                                                    <a style="color: darkred;" href="{{route('users.delete',['id' => $user->id])}}" title="Eliminar" class="btn btn-link px-1 mb-0" onclick="return confirm('¿Está seguro que quiere eliminar este usuario?');"><i style="color: darkred; font-size: 25px !important;" class="material-icons opacity-10">delete</i></a>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>

                            <style>
                                .form-control {
                                    background-color: #f2f2f2 !important ;
                                }
                            </style>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <form method="POST" action="{{route('users.enable')}}" id="is-enabled-form">
        @csrf
        <input type="hidden" name="userID" id="userID">
        <input type="hidden" name="is-enabled" id="is-enabled">
    </form>
    <div class="modal fade" id="extraInfoModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalMessageTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h6 class="modal-title" id="extraInfoModalLabel">Información extra</h6>
                    <button type="button" class="btn-close text-dark" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <table class="table table-striped">
                        <tbody style="color:black !important;" class="text-center">
                            <tr>
                                <td>
                                    <b>Nombre</b>
                                </td>
                                <td>
                                    <p style="color:black;" id="name-def"></p>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <b>Edad</b>
                                </td>
                                <td>
                                    <p style="color:black;" id="age-def"></p>
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
                                    <b>Ocupación</b>
                                </td>
                                <td>
                                    <p style="color:black;" id="occupation-def"></p>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <b>Estado civil</b>
                                </td>
                                <td>
                                    <p style="color:black;" id="maritalStatus-def"></p>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <b>Religión</b>
                                </td>
                                <td>
                                    <p style="color:black;" id="religion-def"></p>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <b>Localidad</b>
                                </td>
                                <td>
                                    <p style="color:black;" id="locality-def"></p>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <b>Antecedentes patológicos</b>
                                </td>
                                <td>
                                    <p style="color:black;" id="pathologicalHistory-def"></p>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <b>Cardiovascular</b>
                                </td>
                                <td>
                                    <p style="color:black;" id="cardiovascular-def"></p>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <b>Pulmonares</b>
                                </td>
                                <td>
                                    <p style="color:black;" id="pulmonary-def"></p>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <b>Digestives</b>
                                </td>
                                <td>
                                    <p style="color:black;" id="digestive-def"></p>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <b>Diabetes</b>
                                </td>
                                <td>
                                    <p style="color:black;" id="diabetes-def"></p>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <b>Renales</b>
                                </td>
                                <td>
                                    <p style="color:black;" id="kidney-def"></p>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <b>Problemas de coagulación</b>
                                </td>
                                <td>
                                    <p style="color:black;" id="clottingProblems-def"></p>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <b>Quirúrgicos</b>
                                </td>
                                <td>
                                    <p style="color:black;" id="surgical-def"></p>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <b>Alérgias</b>
                                </td>
                                <td>
                                    <p style="color:black;" id="allergies-def"></p>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <b>Medicamentos</b>
                                </td>
                                <td>
                                    <p style="color:black;" id="medicines-def"></p>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <b>Alcohol</b>
                                </td>
                                <td>
                                    <p style="color:black;" id="alcohol-def"></p>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <b>Tabaquismo</b>
                                </td>
                                <td>
                                    <p style="color:black;" id="smoking-def"></p>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <b>Drogas</b>
                                </td>
                                <td>
                                    <p style="color:black;" id="dope-def"></p>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <b>Antecedentes familiares</b>
                                </td>
                                <td>
                                    <p style="color:black;" id="familyBackground-def"></p>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <b>Antecedentes emocionales</b>
                                </td>
                                <td>
                                    <p style="color:black;" id="emotionalBackground-def"></p>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <b>Comentarios</b>
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
    <script type="text/javascript">
        $('#extraInfoModal').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget);
            var dName = button.data('name');
            var dAge = button.data('age');
            var dCellphone = button.data('cellphone');
            var dOccupation = button.data('occupation');
            var dMaritalStatus = button.data('marital_status');
            var dReligion = button.data('religion');
            var dLocality = button.data('locality');
            var dPathologicalHistory = button.data('pathological_history');
            var dCardiovascular = button.data('cardiovascular');
            var dPulmonary = button.data('pulmonary');
            var dDigestive = button.data('digestive');
            var dDiabetes = button.data('diabetes');
            var dKidney = button.data('kidney');
            var dClottingProblems = button.data('clotting_problems');
            var dSurgical = button.data('surgical');
            var dAllergies = button.data('allergies');
            var dMedicines = button.data('medicines');
            var dAlcohol = button.data('alcohol');
            var dSmoking = button.data('smoking');
            var dDope = button.data('dope');
            var dFamilyBackground = button.data('family_background');
            var dEmotionalBackground = button.data('emotional_background');
            var dComment = button.data('comment');

            document.getElementById("name-def").innerHTML = dName;
            document.getElementById("age-def").innerHTML = dAge;
            document.getElementById("cellphone-def").innerHTML = dCellphone;
            document.getElementById("occupation-def").innerHTML = dOccupation;
            document.getElementById("maritalStatus-def").innerHTML = dMaritalStatus;
            document.getElementById("religion-def").innerHTML = dReligion;
            document.getElementById("locality-def").innerHTML = dLocality;
            document.getElementById("pathologicalHistory-def").innerHTML = dPathologicalHistory;
            document.getElementById("cardiovascular-def").innerHTML = dCardiovascular;
            document.getElementById("pulmonary-def").innerHTML = dPulmonary;
            document.getElementById("digestive-def").innerHTML = dDigestive;
            document.getElementById("diabetes-def").innerHTML = dDiabetes;
            document.getElementById("kidney-def").innerHTML = dKidney;
            document.getElementById("clottingProblems-def").innerHTML = dClottingProblems;
            document.getElementById("surgical-def").innerHTML = dSurgical;
            document.getElementById("allergies-def").innerHTML = dAllergies;
            document.getElementById("medicines-def").innerHTML = dMedicines;

            if (dAlcohol == 1) {
                document.getElementById("alcohol-def").innerHTML = 'Si';
            } else {
                document.getElementById("alcohol-def").innerHTML = 'No';
            }

            if (dSmoking == 1) {
                document.getElementById("smoking-def").innerHTML = 'Si';
            } else {
                document.getElementById("smoking-def").innerHTML = 'No';
            }

            if (dDope == 1) {
                document.getElementById("dope-def").innerHTML = 'Si';
            } else {
                document.getElementById("dope-def").innerHTML = 'No';
            }

            document.getElementById("familyBackground-def").innerHTML = dFamilyBackground;
            document.getElementById("emotionalBackground-def").innerHTML = dEmotionalBackground;
            document.getElementById("comment-def").innerHTML = dComment;
        })

    </script>
    <script type="text/javascript">
        function isEnabled(id)
        {
            var toggle = document.getElementById('switch'+id);
            var isEnabled = document.getElementById('is-enabled');
            var isEnabledForm = document.getElementById('is-enabled-form');
            var userID = document.getElementById('userID');

            if (toggle.checked === true) {
                isEnabled.value = 1;
            } else {
                isEnabled.value = 0;
            }

            userID.value = id;
            isEnabledForm.submit()
        }
    </script>
@endsection
