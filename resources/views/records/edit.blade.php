@extends('layouts.dashboard')
@section('content')
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-12">
                <div class="card my-4">
                    <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                        <div class="bg-success bg-gradient shadow-primary rounded-bottom p-1">
                            <h6 class="text-white text-center text-capitalize ps-2 mx-6">
                                <a href="{{route('records.index', ['id' => $record->user->id])}}" class="btn btn-block">
                                    <i style="color: white; margin-top: 13px;" class="material-icons opacity-10">keyboard_return</i>
                                </a>Editar registro</h6>
                        </div>
                    </div>
                    <div class="card-body px-0 pb-2">
                        <div class="container">
                            <form method="POST" action="{{route('records.update')}}" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-floating mb-3">
                                            <input type="number" class="form-control border" name="age" id="age" placeholder="Edad" min="1" value="{{$record->age}}" required>
                                            <label for="age">Edad</label>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-floating mb-3">
                                            <input type="number" class="form-control border" name="size" id="size" placeholder="Talla" min="0" value="{{$record->size}}" required>
                                            <label for="size">Talla</label>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-floating mb-3">
                                            <input type="number" class="form-control border" name="blood_pressure" id="blood_pressure" placeholder="Presión arterial" min="0"  value="{{$record->blood_pressure}}" required>
                                            <label for="blood_pressure">Presión arterial</label>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-floating mb-3">
                                            <input type="number" class="form-control border" name="heartbeat" id="heartbeat" placeholder="Pulso" min="0"  value="{{$record->heartbeat}}" required>
                                            <label for="heartbeat">Pulso</label>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-floating mb-3">
                                            <input type="number" class="form-control border" name="temperature" id="temperature" placeholder="Temperatura" min="0" value="{{$record->temperature}}" required>
                                            <label for="temperature">Temperatura</label>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-floating mb-3">
                                            <input type="number" class="form-control border" name="glucometer" id="glucometer" placeholder="Glucometría" min="0" value="{{$record->glucometer}}" required>
                                            <label for="glucometer">Glucometría</label>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-floating mb-3">
                                            <input type="text" class="form-control border" name="last_food" id="last_food" placeholder="Última comida" value="{{$record->last_food}}" required>
                                            <label for="last_food">Última comida</label>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-floating mb-3">
                                            <input type="number" class="form-control border" name="oximetry" id="oximetry" placeholder="Oximetría" min="0" value="{{$record->oximetry}}" required>
                                            <label for="oximetry">Oximetría</label>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-floating mb-3">
                                            <input type="number" class="form-control border" name="oximetry_level" id="oximetry_level" placeholder="Nivel de oximetría" min="0" value="{{$record->oximetry_level}}" required>
                                            <label for="oximetry_level">Nivel de oximetría</label>
                                        </div>
                                    </div>
                                    <h3 style="font-family:Arial Narrow, sans-serif;" class="mb-5 text-lg mt-5 text-primary text-center"><b>Tabla de medidas</b></h3>
                                    <div class="col-md-4">
                                        <div class="form-floating mb-3">
                                            <input type="number" class="form-control border" name="bust" id="bust" placeholder="Busto" min="0" value="{{$record->bust}}" required>
                                            <label for="bust">Busto</label>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-floating mb-3">
                                            <input type="number" class="form-control border" name="waist" id="waist" placeholder="Cintura" min="0" value="{{$record->waist}}" required>
                                            <label for="waist">Cintura</label>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-floating mb-3">
                                            <input type="number" class="form-control border" name="hip" id="hip" placeholder="Cadera" min="0" value="{{$record->hip}}" required>
                                            <label for="hip">Cadera</label>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-floating mb-3">
                                            <input type="number" class="form-control border" name="left_bicep" id="left_bicep" placeholder="Bicep izq" min="0" value="{{$record->left_bicep}}" required>
                                            <label for="left_bicep">Bicep izq</label>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-floating mb-3">
                                            <input type="number" class="form-control border" name="right_bicep" id="right_bicep" placeholder="Bicep der" min="0" value="{{$record->right_bicep}}" required>
                                            <label for="right_bicep">Bicep der</label>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-floating mb-3">
                                            <input type="number" class="form-control border" name="left_calf" id="left_calf" placeholder="Pantorrilla izq" min="0" value="{{$record->left_calf}}" required>
                                            <label for="left_calf">Pantorrilla izq</label>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-floating mb-3">
                                            <input type="number" class="form-control border" name="right_calf" id="right_calf" placeholder="Pantorrilla der" min="0" value="{{$record->right_calf}}" required>
                                            <label for="right_calf">Pantorrilla der</label>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-floating mb-3">
                                            <input type="number" class="form-control border" name="adipometer" id="adipometer" placeholder="Adipometro" min="0" value="{{$record->adipometer}}" required>
                                            <label for="adipometer">Adipometro</label>
                                        </div>
                                    </div>
                                    <h3 style="font-family:Arial Narrow, sans-serif;" class="mb-5 text-lg mt-5 text-primary text-center"><b>Tanita</b></h3>
                                    <div class="col-md-4">
                                        <div class="form-floating mb-3">
                                            <input type="number" class="form-control border" name="weight" id="weight" placeholder="Peso(kg)" min="0" value="{{$record->weight}}" required>
                                            <label for="weight">Peso(kg)</label>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-floating mb-3">
                                            <input type="number" class="form-control border" name="imc" id="imc" placeholder="IMC" min="0" value="{{$record->imc}}" required>
                                            <label for="imc">IMC</label>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-floating mb-3">
                                            <input type="number" class="form-control border" name="metabolic_age" id="metabolic_age" placeholder="Edad metabólica" min="0" value="{{$record->metabolic_age}}" required>
                                            <label for="metabolic_age">Edad metabólica</label>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-floating mb-3">
                                            <input type="number" class="form-control border" name="body_water" id="body_water" placeholder="% Agua corporal" min="0" value="{{$record->body_water}}" required>
                                            <label for="body_water">% Agua corporal</label>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-floating mb-3">
                                            <input type="number" class="form-control border" name="visceral_fat" id="visceral_fat" placeholder="Grasa visceral" min="0" value="{{$record->visceral_fat}}" required>
                                            <label for="visceral_fat">Grasa visceral</label>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-floating mb-3">
                                            <input type="number" class="form-control border" name="bone_mass" id="bone_mass" placeholder="Masa ósea" min="0" value="{{$record->bone_mass}}" required>
                                            <label for="bone_mass">Masa ósea</label>
                                        </div>
                                    </div>
                                    <div class="mb-3 mt-3">
                                        <label for="news" class="form-label"><b>Novedades:</b></label>
                                        <textarea class="form-control" name="news" id="news" rows="3">{{$record->news}}</textarea>
                                    </div>
                                    <div class="mb-3">
                                        <label for="recommendations" class="form-label"><b>Recomendaciones:</b></label>
                                        <textarea class="form-control" name="recommendations" id="recommendations" rows="3">{{$record->recommendations}}</textarea>
                                    </div>
                                </div>
                                <input type="hidden" name="recordID" value="{{$record->id}}">
                                <div class="row">
                                    <div class="col-auto ms-auto me-auto p-0 mt-5 mb-2">
                                        <input type="submit" class="btn btn-primary bg-gradient" value="Modificar">
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script type="text/javascript">
        $('.detox').on('change', function() {
            if ($('#detox1').is(':checked')) {
                $('#detox').children().prop('disabled', false);
                $('.detox-input').prop('disabled', false);
                $('#detox').css('display', 'block');
            } else {
                $('#detox').children().prop('disabled', true);
                $('#detox').css('display', 'none');
                $('.detox-input').prop('disabled', true);
            }
        });

    </script>


@endsection
