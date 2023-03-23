@extends('layouts.dashboard')
@section('content')
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-12">
                <div class="card my-4">
                    <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                        <div class="bg-success bg-gradient shadow-primary rounded-bottom p-1">
                            <h6 class="text-white text-center text-capitalize ps-2 mx-6"><a href="{{route('users.index', ['id' => $role])}}" class="btn btn-block"><i style="color: white; margin-top: 13px;" class="material-icons opacity-10">keyboard_return</i></a>Crear
                                @if ($role == 'therapist')
                                    Terapista
                                @elseif ($role == 'patient')
                                    Paciente
                                @elseif ($role == 'administrator')
                                    Administrador
                                @endif
                            </h6>
                        </div>
                    </div>
                    <div class="card-body px-0 pb-2">
                        <div class="container">
                            <form method="POST" action="{{route('users.store')}}" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-floating mb-3">
                                            <input type="text" class="form-control border" name="name" id="name" placeholder="Nombre" required>
                                            <label for="name">Nombre</label>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-floating mb-3">
                                            <input type="email" class="form-control border" name="email" id="email" placeholder="Email" required>
                                            <label for="email">Email</label>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-floating mb-3">
                                            <input type="text" class="form-control border" name="cellphone" id="cellphone" placeholder="Celular" required>
                                            <label for="cellphone">Celular</label>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-floating mb-3">
                                            <input type="password" class="form-control border" name="password" id="password" placeholder="Contraseña" required>
                                            <label for="password">Contraseña</label>
                                        </div>
                                    </div>
                                    <div class="col-md-5">
                                        <label for="img-user" class="form-label">
                                            @if ($role == 'therapist')
                                                Foto del terapeuta
                                            @else
                                                Foto del paciente
                                            @endif
                                        </label>
                                        <input class="form-control" type="file" id="user_img" name="user_img">
                                    </div>
                                    @if ($role == 'patient')
                                        <div class="w-100 mb-4"></div>
                                    <div class="col-md-4">
                                        <div class="form-floating mb-3">
                                            <input type="number" class="form-control border" name="age" id="age" placeholder="Edad" min="1" required>
                                            <label for=age">Edad</label>
                                        </div>
                                    </div>
                                        <div class="col-md-4">
                                            <div class="form-floating mb-3">
                                                <input type="text" class="form-control border" name="occupation" id="occupation" placeholder="Ocupación" required>
                                                <label for="occupation">Ocupación</label>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-floating mb-3">
                                                <input type="text" class="form-control border" name="marital_status" id="marital_status" placeholder="Estado civil" required>
                                                <label for="marital_status">Estado civil</label>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-floating mb-3">
                                                <input type="text" class="form-control border" name="religion" id="religion" placeholder="Religión" required>
                                                <label for="religion">Religión</label>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-floating mb-3">
                                                <input type="text" class="form-control border" name="locality" id="locality" placeholder="Localidad" required>
                                                <label for="locality">Localidad</label>
                                            </div>
                                        </div>
                                        <div class="w-100"></div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="pathological_history" class="form-label"><b>Antecedentes patológicos</b></label>
                                                <textarea class="form-control" id="pathological_history" rows="3" name="pathological_history" required></textarea>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="cardiovascular" class="form-label"><b>Cardiovasculares</b></label>
                                                <textarea class="form-control" id="cardiovascular" name="cardiovascular" rows="3" required></textarea>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="pulmonary" class="form-label"><b>Pulmonares</b></label>
                                                <textarea class="form-control" id="pulmonary" name="pulmonary" rows="3" required></textarea>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="digestive" class="form-label"><b>Digestivos</b></label>
                                                <textarea class="form-control" id="digestive" name="digestive" rows="3" required></textarea>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="diabetes" class="form-label"><b>Diabetes</b></label>
                                                <textarea class="form-control" id="diabetes" name="diabetes" rows="3" required></textarea>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="kidney" class="form-label"><b>Renales</b></label>
                                                <textarea class="form-control" id="kidney" name="kidney" rows="3" required></textarea>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="clotting_problems" class="form-label"><b>Problemas de coagulación</b></label>
                                                <textarea class="form-control" id="clotting_problems" name="clotting_problems" rows="3" required></textarea>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="surgical" class="form-label"><b>Quirúrgicos</b></label>
                                                <textarea class="form-control" id="surgical" name="surgical" rows="3" required></textarea>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="allergies" class="form-label"><b>Alérgicos</b></label>
                                                <textarea class="form-control" id="allergies" name="allergies" rows="3" required></textarea>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="medicines" class="form-label"><b>Medicamentos</b></label>
                                                <textarea class="form-control" id="medicines" name="medicines" rows="3" required></textarea>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="family_background" class="form-label"><b>Antecedentes familiares</b></label>
                                                <textarea class="form-control" id="family_background" name="family_background" rows="3" required></textarea>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="emotional_background" class="form-label"><b>Antecedentes emocionales</b></label>
                                                <textarea class="form-control" id="emotional_background" name="emotional_background" rows="3" required></textarea>
                                            </div>
                                        </div>
                                        <div class="col-xs-4 col-sm-4 col-md-4">
                                                <div class="mb-3">
                                            <p class="mb-2"><b>Alcohol</b></p>
                                                    <div class="form-check">
                                                        <input class="border" type="radio"
                                                               name="alcohol" id="alcohol" value="1">
                                                        <label class="form-check-label" for="alcohol">
                                                            Si
                                                        </label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="border" type="radio"
                                                               name="alcohol" id="alcohol" value="0" checked>
                                                        <label class="form-check-label" for="alcohol">
                                                            No
                                                        </label>
                                                    </div>
                                                </div>
                                        </div>
                                        <div class="col-xs-4 col-sm-4 col-md-4">
                                            <div class="mb-3">
                                                <p class="mb-2"><b>Tabaquismo</b></p>
                                                <div class="form-check">
                                                    <input class="border" type="radio"
                                                           name="smoking" id="smoking" value="1">
                                                    <label class="form-check-label" for="smoking">
                                                        Si
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="border" type="radio"
                                                           name="smoking" id="smoking" value="0" checked>
                                                    <label class="form-check-label" for="smoking">
                                                        No
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xs-4 col-sm-4 col-md-4">
                                            <div class="mb-3">
                                                <p class="mb-2"><b>Drogas</b></p>
                                                <div class="form-check">
                                                    <input class="border" type="radio"
                                                           name="dope" id="dope" value="1">
                                                    <label class="form-check-label" for="dope">
                                                        Si
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="border" type="radio"
                                                           name="dope" id="dope" value="0" checked>
                                                    <label class="form-check-label" for="dope">
                                                        No
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="mb-3">
                                                <label for="comment" class="form-label"><b>Comentarios</b></label>
                                                <textarea class="form-control" id="comment" name="comment" rows="3" required></textarea>
                                            </div>
                                        </div>
                                    @endif
                                </div>
                                <input type="hidden" value="{{$role}}" name="role">
                                <div class="row">
                                    <div class="col-auto ms-auto me-auto p-0 mt-5 mb-2">
                                        <input type="submit" class="btn btn-primary bg-gradient" value="Guardar">
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>

@endsection
