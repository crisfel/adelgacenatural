@extends('layouts.dashboard')
@section('content')
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-12">
                <div class="card my-4">
                    <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                        <div class="bg-success bg-gradient shadow-primary rounded-bottom p-1">
                            <h6 class="text-white text-center text-capitalize ps-2 mx-6">
                                <a href="{{route('records.index', ['id' => $id])}}" class="btn btn-block">
                                    <i style="color: white; margin-top: 13px;" class="material-icons opacity-10">keyboard_return</i>
                                </a>Crear registro</h6>
                        </div>
                    </div>
                    <div class="card-body px-0 pb-2">
                        <div class="container">
                            <form method="POST" action="{{route('records.store')}}" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-floating mb-3">
                                            <input type="number" class="form-control border" name="age" id="age" placeholder="Edad" min="1" required>
                                            <label for="age">Edad</label>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-floating mb-3">
                                            <input type="number" class="form-control border" name="size" id="size" placeholder="Talla" min="0" required>
                                            <label for="size">Talla</label>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-floating mb-3">
                                            <input type="number" class="form-control border" name="blood_pressure" id="blood_pressure" placeholder="Presión arterial" min="0" required>
                                            <label for="blood_pressure">Presión arterial</label>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-floating mb-3">
                                            <input type="number" class="form-control border" name="heartbeat" id="heartbeat" placeholder="Pulso" min="0" required>
                                            <label for="heartbeat">Pulso</label>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-floating mb-3">
                                            <input type="number" class="form-control border" name="temperature" id="temperature" placeholder="Temperatura" min="0" required>
                                            <label for="temperature">Temperatura</label>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-floating mb-3">
                                            <input type="number" class="form-control border" name="glucometer" id="glucometer" placeholder="Glucometría" min="0" required>
                                            <label for="glucometer">Glucometría</label>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-floating mb-3">
                                            <input type="text" class="form-control border" name="last_food" id="last_food" placeholder="Última comida" required>
                                            <label for="last_food">Última comida</label>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-floating mb-3">
                                            <input type="number" class="form-control border" name="oximetry" id="oximetry" placeholder="Oximetría" min="0" required>
                                            <label for="oximetry">Oximetría</label>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-floating mb-3">
                                            <input type="number" class="form-control border" name="oximetry_level" id="oximetry_level" placeholder="Nivel de oximetría" min="0" required>
                                            <label for="oximetry_level">Nivel de oximetría</label>
                                        </div>
                                    </div>
                                    <h3 style="font-family:Arial Narrow, sans-serif;" class="mb-5 text-lg mt-5 text-primary text-center"><b>Tabla de medidas</b></h3>
                                    <div class="col-md-4">
                                        <div class="form-floating mb-3">
                                            <input type="number" class="form-control border" name="bust" id="bust" placeholder="Busto" min="0" required>
                                            <label for="bust">Busto</label>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-floating mb-3">
                                            <input type="number" class="form-control border" name="waist" id="waist" placeholder="Cintura" min="0" required>
                                            <label for="waist">Cintura</label>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-floating mb-3">
                                            <input type="number" class="form-control border" name="hip" id="hip" placeholder="Cadera" min="0" required>
                                            <label for="hip">Cadera</label>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-floating mb-3">
                                            <input type="number" class="form-control border" name="left_bicep" id="left_bicep" placeholder="Bicep izq" min="0" required>
                                            <label for="left_bicep">Bicep izq</label>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-floating mb-3">
                                            <input type="number" class="form-control border" name="right_bicep" id="right_bicep" placeholder="Bicep der" min="0" required>
                                            <label for="right_bicep">Bicep der</label>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-floating mb-3">
                                            <input type="number" class="form-control border" name="left_calf" id="left_calf" placeholder="Pantorrilla izq" min="0" required>
                                            <label for="left_calf">Pantorrilla izq</label>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-floating mb-3">
                                            <input type="number" class="form-control border" name="right_calf" id="right_calf" placeholder="Pantorrilla der" min="0" required>
                                            <label for="right_calf">Pantorrilla der</label>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-floating mb-3">
                                            <input type="number" class="form-control border" name="adipometer" id="adipometer" placeholder="Adipometro" min="0" required>
                                            <label for="adipometer">Adipometro</label>
                                        </div>
                                    </div>
                                    <h3 style="font-family:Arial Narrow, sans-serif;" class="mb-5 text-lg mt-5 text-primary text-center"><b>Tanita</b></h3>
                                    <div class="col-md-4">
                                        <div class="form-floating mb-3">
                                            <input type="number" class="form-control border" name="weight" id="weight" placeholder="Peso(kg)" min="0" required>
                                            <label for="weight">Peso(kg)</label>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-floating mb-3">
                                            <input type="number" class="form-control border" name="imc" id="imc" placeholder="IMC" min="0" required>
                                            <label for="imc">IMC</label>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-floating mb-3">
                                            <input type="number" class="form-control border" name="metabolic_age" id="metabolic_age" placeholder="Edad metabólica" min="0" required>
                                            <label for="metabolic_age">Edad metabólica</label>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-floating mb-3">
                                            <input type="number" class="form-control border" name="body_water" id="body_water" placeholder="% Agua corporal" min="0" required>
                                            <label for="body_water">% Agua corporal</label>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-floating mb-3">
                                            <input type="number" class="form-control border" name="visceral_fat" id="visceral_fat" placeholder="Grasa visceral" min="0" required>
                                            <label for="visceral_fat">Grasa visceral</label>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-floating mb-3">
                                            <input type="number" class="form-control border" name="bone_mass" id="bone_mass" placeholder="Masa ósea" min="0" required>
                                            <label for="bone_mass">Masa ósea</label>
                                        </div>
                                    </div>
                                    <div class="col-md-12 mt-3">
                                        <label for="body-photo" class="form-label"><b>Foto de cuerpo:</b></label>
                                        <input class="form-control" type="file" id="body-photo" name="body-photo">
                                    </div>

                                    <div class="col-md-12 d-flex justify-content-center mt-4">
                                        <div class="mb-3 mt-4">
                                            <label for="detox" class="form-label"><b>¿Incluye cuestionario Detox?</b></label>
                                            <div class="form-check">
                                                <input class="border detox" type="radio"
                                                       name="detox" id="detox1" value="1">
                                                <label class="form-check-label" for="detox">
                                                    Si
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="border detox" type="radio"
                                                       name="detox" id="detox1" value="0" checked>
                                                <label class="form-check-label" for="detox">
                                                    No
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="detox" style="display:none" class="justify-content-center mb-4">
                                        <div style="width:70%" class="table-responsive p-0 ms-auto me-auto">
                                            <h3 style="font-family:Arial Narrow, sans-serif;" class="mb-5 text-lg mt-5 text-primary text-center"><b>Cuestinoario Detox</b></h3>
                                            <table id="" class="table align-items-center table-striped table-bordered mb-0">
                                                <tbody>
                                                    <tr class="align-middle text-center text-sm">
                                                        <td><b>Emociones</b></td>
                                                        <td><b>Puntos</b></td>
                                                    </tr>
                                                    <tr class="align-middle text-center text-sm">
                                                        <td>Irritabilidad</td>
                                                        <td>
                                                            <input type="number" class="border bg-white text-center detox-input" name="detox_input[]" min="0" max="4" required disabled>
                                                        </td>
                                                    </tr>
                                                    <tr class="align-middle text-center text-sm">
                                                        <td>Nerviosismo</td>
                                                        <td>
                                                            <input type="number" class="border bg-white text-center detox-input" name="detox_input[]" min="0" max="4" required disabled>
                                                        </td>
                                                    </tr>
                                                    <tr class="align-middle text-center text-sm">
                                                        <td>Inestabilidad del estado de animo</td>
                                                        <td>
                                                            <input type="number" class="border bg-white text-center detox-input" name="detox_input[]" min="0" max="4" required disabled>
                                                        </td>
                                                    </tr>
                                                    <tr class="align-middle text-center text-sm">
                                                        <td>Llanto frecuente</td>
                                                        <td>
                                                            <input type="number" class="border bg-white text-center detox-input" name="detox_input[]" min="0" max="4" required disabled>
                                                        </td>
                                                    </tr>
                                                    <tr class="align-middle text-center text-sm">
                                                        <td>Comportamiento agresivo</td>
                                                        <td>
                                                            <input type="number" class="border bg-white text-center detox-input" name="detox_input[]" min="0" max="4" required disabled>
                                                        </td>
                                                    </tr>
                                                    <tr class="align-middle text-center text-sm">
                                                        <td>Ansiedad</td>
                                                        <td>
                                                            <input type="number" class="border bg-white text-center detox-input" name="detox_input[]" min="0" max="4" required disabled>
                                                        </td>
                                                    </tr>
                                                    <tr class="align-middle text-center text-sm">
                                                        <td>Miedo</td>
                                                        <td>
                                                            <input type="number" class="border bg-white text-center detox-input" name="detox_input[]" min="0" max="4" required disabled>
                                                        </td>
                                                    </tr>
                                                    <tr class="align-middle text-center text-sm">
                                                        <td>Confusión</td>
                                                        <td>
                                                            <input type="number" class="border bg-white text-center detox-input" name="detox_input[]" min="0" max="4" required disabled>
                                                        </td>
                                                    </tr>
                                                    <tr class="align-middle text-center text-sm">
                                                        <td>Depresión</td>
                                                        <td>
                                                            <input type="number" class="border bg-white text-center detox-input" name="detox_input[]" min="0" max="4" required disabled>
                                                        </td>
                                                    </tr>
                                                    <tr class="align-middle text-center text-sm">
                                                        <td>Pensamiento suicida</td>
                                                        <td>
                                                            <input type="number" class="border bg-white text-center detox-input" name="detox_input[]" min="0" max="4" required disabled>
                                                        </td>
                                                    </tr>
                                                    <tr class="align-middle text-center text-sm">
                                                        <td><b>Piel</b></td>
                                                        <td><b>Puntos</b></td>
                                                    </tr>
                                                    <tr class="align-middle text-center text-sm">
                                                        <td>Aumento de la sudoración, cerumen, piel grasa</td>
                                                        <td>
                                                            <input type="number" class="border bg-white text-center detox-input" name="detox_input[]" min="0" max="4" required disabled>
                                                        </td>
                                                    </tr>
                                                    <tr class="align-middle text-center text-sm">
                                                        <td>Exantemas cutáneos</td>
                                                        <td>
                                                            <input type="number" class="border bg-white text-center detox-input" name="detox_input[]" min="0" max="4" required disabled>
                                                        </td>
                                                    </tr>
                                                    <tr class="align-middle text-center text-sm">
                                                        <td>Manchas marrones en manos y cara</td>
                                                        <td>
                                                            <input type="number" class="border bg-white text-center detox-input" name="detox_input[]" min="0" max="4" required disabled>
                                                        </td>
                                                    </tr>
                                                    <tr class="align-middle text-center text-sm">
                                                        <td>Forúnculos</td>
                                                        <td>
                                                            <input type="number" class="border bg-white text-center detox-input" name="detox_input[]" min="0" max="4" required disabled>
                                                        </td>
                                                    </tr>
                                                    <tr class="align-middle text-center text-sm">
                                                        <td>Papilomas cutáneos (verrugas pequeñas que cuelgan)</td>
                                                        <td>
                                                            <input type="number" class="border bg-white text-center detox-input" name="detox_input[]" min="0" max="4" required disabled>
                                                        </td>
                                                    </tr>
                                                    <tr class="align-middle text-center text-sm">
                                                        <td>Acné</td>
                                                        <td>
                                                            <input type="number" class="border bg-white text-center detox-input" name="detox_input[]" min="0" max="4" required disabled>
                                                        </td>
                                                    </tr>
                                                    <tr class="align-middle text-center text-sm">
                                                        <td>Eccema</td>
                                                        <td>
                                                            <input type="number" class="border bg-white text-center detox-input" name="detox_input[]" min="0" max="4" required disabled>
                                                        </td>
                                                    </tr>
                                                    <tr class="align-middle text-center text-sm">
                                                        <td>Calenturas</td>
                                                        <td>
                                                            <input type="number" class="border bg-white text-center detox-input" name="detox_input[]" min="0" max="4" required disabled>
                                                        </td>
                                                    </tr>
                                                    <tr class="align-middle text-center text-sm">
                                                        <td>Verrugas</td>
                                                        <td>
                                                            <input type="number" class="border bg-white text-center detox-input" name="detox_input[]" min="0" max="4" required disabled>
                                                        </td>
                                                    </tr>
                                                    <tr class="align-middle text-center text-sm">
                                                        <td><b>Oído, Nariz y Garganta</b></td>
                                                        <td><b>Puntos</b></td>
                                                    </tr>
                                                    <tr class="align-middle text-center text-sm">
                                                        <td>Aumento de la salivación</td>
                                                        <td>
                                                            <input type="number" class="border bg-white text-center detox-input" name="detox_input[]" min="0" max="4" required disabled>
                                                        </td>
                                                    </tr>
                                                    <tr class="align-middle text-center text-sm">
                                                        <td>Resfriado común</td>
                                                        <td>
                                                            <input type="number" class="border bg-white text-center detox-input" name="detox_input[]" min="0" max="4" required disabled>
                                                        </td>
                                                    </tr>
                                                    <tr class="align-middle text-center text-sm">
                                                        <td>Sinusitis</td>
                                                        <td>
                                                            <input type="number" class="border bg-white text-center detox-input" name="detox_input[]" min="0" max="4" required disabled>
                                                        </td>
                                                    </tr>
                                                    <tr class="align-middle text-center text-sm">
                                                        <td>Dolores de garganta</td>
                                                        <td>
                                                            <input type="number" class="border bg-white text-center detox-input" name="detox_input[]" min="0" max="4" required disabled>
                                                        </td>
                                                    </tr>
                                                    <tr class="align-middle text-center text-sm">
                                                        <td>Infecciones de oído</td>
                                                        <td>
                                                            <input type="number" class="border bg-white text-center detox-input" name="detox_input[]" min="0" max="4" required disabled>
                                                        </td>
                                                    </tr>
                                                    <tr class="align-middle text-center text-sm">
                                                        <td>Fiebre del Heno</td>
                                                        <td>
                                                            <input type="number" class="border bg-white text-center detox-input" name="detox_input[]" min="0" max="4" required disabled>
                                                        </td>
                                                    </tr>
                                                    <tr class="align-middle text-center text-sm">
                                                        <td>Perdida del olfato</td>
                                                        <td>
                                                            <input type="number" class="border bg-white text-center detox-input" name="detox_input[]" min="0" max="4" required disabled>
                                                        </td>
                                                    </tr>
                                                    <tr class="align-middle text-center text-sm">
                                                        <td>Tos</td>
                                                        <td>
                                                            <input type="number" class="border bg-white text-center detox-input" name="detox_input[]" min="0" max="4" required disabled>
                                                        </td>
                                                    </tr>
                                                    <tr class="align-middle text-center text-sm">
                                                        <td><b>Mente y Cerebro </b></td>
                                                        <td><b>Puntos</b></td>
                                                    </tr>
                                                    <tr class="align-middle text-center text-sm">
                                                        <td>Hiperactividad</td>
                                                        <td>
                                                            <input type="number" class="border bg-white text-center detox-input" name="detox_input[]" min="0" max="4" required disabled>
                                                        </td>
                                                    </tr>
                                                    <tr class="align-middle text-center text-sm">
                                                        <td>Tartamudeos o problemas para encontrar palabras</td>
                                                        <td>
                                                            <input type="number" class="border bg-white text-center detox-input" name="detox_input[]" min="0" max="4" required disabled>
                                                        </td>
                                                    </tr>
                                                    <tr class="align-middle text-center text-sm">
                                                        <td>Dificultad para concentrarse</td>
                                                        <td>
                                                            <input type="number" class="border bg-white text-center detox-input" name="detox_input[]" min="0" max="4" required disabled>
                                                        </td>
                                                    </tr>
                                                    <tr class="align-middle text-center text-sm">
                                                        <td>Trastornos del sueño</td>
                                                        <td>
                                                            <input type="number" class="border bg-white text-center detox-input" name="detox_input[]" min="0" max="4" required disabled>
                                                        </td>
                                                    </tr>
                                                    <tr class="align-middle text-center text-sm">
                                                        <td>Dificultad para tomar decisiones</td>
                                                        <td>
                                                            <input type="number" class="border bg-white text-center detox-input" name="detox_input[]" min="0" max="4" required disabled>
                                                        </td>
                                                    </tr>
                                                    <tr class="align-middle text-center text-sm">
                                                        <td>Dolor de cabeza</td>
                                                        <td>
                                                            <input type="number" class="border bg-white text-center detox-input" name="detox_input[]" min="0" max="4" required disabled>
                                                        </td>
                                                    </tr>
                                                    <tr class="align-middle text-center text-sm">
                                                        <td>Mala memoria</td>
                                                        <td>
                                                            <input type="number" class="border bg-white text-center detox-input" name="detox_input[]" min="0" max="4" required disabled>
                                                        </td>
                                                    </tr>
                                                    <tr class="align-middle text-center text-sm">
                                                        <td>Mala coordinación</td>
                                                        <td>
                                                            <input type="number" class="border bg-white text-center detox-input" name="detox_input[]" min="0" max="4" required disabled>
                                                        </td>
                                                    </tr>
                                                    <tr class="align-middle text-center text-sm">
                                                        <td>Comportamiento compulsivo</td>
                                                        <td>
                                                            <input type="number" class="border bg-white text-center detox-input" name="detox_input[]" min="0" max="4" required disabled>
                                                        </td>
                                                    </tr>
                                                    <tr class="align-middle text-center text-sm">
                                                        <td>Trastorno del sueño intenso</td>
                                                        <td>
                                                            <input type="number" class="border bg-white text-center detox-input" name="detox_input[]" min="0" max="4" required disabled>
                                                        </td>
                                                    </tr>
                                                    <tr class="align-middle text-center text-sm">
                                                        <td>Perdida de la memoria</td>
                                                        <td>
                                                            <input type="number" class="border bg-white text-center detox-input" name="detox_input[]" min="0" max="4" required disabled>
                                                        </td>
                                                    </tr>
                                                    <tr class="align-middle text-center text-sm">
                                                        <td><b>Aparato Digestivo</b></td>
                                                        <td><b>Puntos</b></td>
                                                    </tr>
                                                    <tr class="align-middle text-center text-sm">
                                                        <td>Heces blandas</td>
                                                        <td>
                                                            <input type="number" class="border bg-white text-center detox-input" name="detox_input[]" min="0" max="4" required disabled>
                                                        </td>
                                                    </tr>
                                                    <tr class="align-middle text-center text-sm">
                                                        <td>Diarrea</td>
                                                        <td>
                                                            <input type="number" class="border bg-white text-center detox-input" name="detox_input[]" min="0" max="4" required disabled>
                                                        </td>
                                                    </tr>
                                                    <tr class="align-middle text-center text-sm">
                                                        <td>Acidez de estomago</td>
                                                        <td>
                                                            <input type="number" class="border bg-white text-center detox-input" name="detox_input[]" min="0" max="4" required disabled>
                                                        </td>
                                                    </tr>
                                                    <tr class="align-middle text-center text-sm">
                                                        <td>Estreñimiento</td>
                                                        <td>
                                                            <input type="number" class="border bg-white text-center detox-input" name="detox_input[]" min="0" max="4" required disabled>
                                                        </td>
                                                    </tr>
                                                    <tr class="align-middle text-center text-sm">
                                                        <td>Meteorismo</td>
                                                        <td>
                                                            <input type="number" class="border bg-white text-center detox-input" name="detox_input[]" min="0" max="4" required disabled>
                                                        </td>
                                                    </tr>
                                                    <tr class="align-middle text-center text-sm">
                                                        <td>Dolor abdominal</td>
                                                        <td>
                                                            <input type="number" class="border bg-white text-center detox-input" name="detox_input[]" min="0" max="4" required disabled>
                                                        </td>
                                                    </tr>
                                                    <tr class="align-middle text-center text-sm">
                                                        <td>Intolerancia a ciertos alimentos</td>
                                                        <td>
                                                            <input type="number" class="border bg-white text-center detox-input" name="detox_input[]" min="0" max="4" required disabled>
                                                        </td>
                                                    </tr>
                                                    <tr class="align-middle text-center text-sm">
                                                        <td>Nauseas o vómitos</td>
                                                        <td>
                                                            <input type="number" class="border bg-white text-center detox-input" name="detox_input[]" min="0" max="4" required disabled>
                                                        </td>
                                                    </tr>
                                                    <tr class="align-middle text-center text-sm">
                                                        <td>Diarrea intestinal con sangre o mucosidad</td>
                                                        <td>
                                                            <input type="number" class="border bg-white text-center detox-input" name="detox_input[]" min="0" max="4" required disabled>
                                                        </td>
                                                    </tr>
                                                    <tr class="align-middle text-center text-sm">
                                                        <td><b>Riñón</b></td>
                                                        <td><b>Puntos</b></td>
                                                    </tr>
                                                    <tr class="align-middle text-center text-sm">
                                                        <td>Necesidad de levantarse en las noches para orinar</td>
                                                        <td>
                                                            <input type="number" class="border bg-white text-center detox-input" name="detox_input[]" min="0" max="4" required disabled>
                                                        </td>
                                                    </tr>
                                                    <tr class="align-middle text-center text-sm">
                                                        <td>Infecciones urinarias y cistitis</td>
                                                        <td>
                                                            <input type="number" class="border bg-white text-center detox-input" name="detox_input[]" min="0" max="4" required disabled>
                                                        </td>
                                                    </tr>
                                                    <tr class="align-middle text-center text-sm">
                                                        <td>Cálculos renales</td>
                                                        <td>
                                                            <input type="number" class="border bg-white text-center detox-input" name="detox_input[]" min="0" max="4" required disabled>
                                                        </td>
                                                    </tr>
                                                    <tr class="align-middle text-center text-sm">
                                                        <td>Sangre en la orina</td>
                                                        <td>
                                                            <input type="number" class="border bg-white text-center detox-input" name="detox_input[]" min="0" max="4" required disabled>
                                                        </td>
                                                    </tr>
                                                    <tr class="align-middle text-center text-sm">
                                                        <td><b>Articulaciones y Músculos </b></td>
                                                        <td><b>Puntos</b></td>
                                                    </tr>
                                                    <tr class="align-middle text-center text-sm">
                                                        <td>Dolor musculares o articulares pasajeros</td>
                                                        <td>
                                                            <input type="number" class="border bg-white text-center detox-input" name="detox_input[]" min="0" max="4" required disabled>
                                                        </td>
                                                    </tr>
                                                    <tr class="align-middle text-center text-sm">
                                                        <td>Tendinitis (ej. Codo de tenista, codo de golfista)</td>
                                                        <td>
                                                            <input type="number" class="border bg-white text-center detox-input" name="detox_input[]" min="0" max="4" required disabled>
                                                        </td>
                                                    </tr>
                                                    <tr class="align-middle text-center text-sm">
                                                        <td>Gota</td>
                                                        <td>
                                                            <input type="number" class="border bg-white text-center detox-input" name="detox_input[]" min="0" max="4" required disabled>
                                                        </td>
                                                    </tr>
                                                    <tr class="align-middle text-center text-sm">
                                                        <td>Artritis</td>
                                                        <td>
                                                            <input type="number" class="border bg-white text-center detox-input" name="detox_input[]" min="0" max="4" required disabled>
                                                        </td>
                                                    </tr>
                                                    <tr class="align-middle text-center text-sm">
                                                        <td>Fibromialgia</td>
                                                        <td>
                                                            <input type="number" class="border bg-white text-center detox-input" name="detox_input[]" min="0" max="4" required disabled>
                                                        </td>
                                                    </tr>
                                                    <tr class="align-middle text-center text-sm">
                                                        <td><b>Metabolismo</b></td>
                                                        <td><b>Puntos</b></td>
                                                    </tr>
                                                    <tr class="align-middle text-center text-sm">
                                                        <td>Sensación de frio</td>
                                                        <td>
                                                            <input type="number" class="border bg-white text-center detox-input" name="detox_input[]" min="0" max="4" required disabled>
                                                        </td>
                                                    </tr>
                                                    <tr class="align-middle text-center text-sm">
                                                        <td>Hipoglucemia</td>
                                                        <td>
                                                            <input type="number" class="border bg-white text-center detox-input" name="detox_input[]" min="0" max="4" required disabled>
                                                        </td>
                                                    </tr>
                                                    <tr class="align-middle text-center text-sm">
                                                        <td>Ansias por comer ciertos alimentos</td>
                                                        <td>
                                                            <input type="number" class="border bg-white text-center detox-input" name="detox_input[]" min="0" max="4" required disabled>
                                                        </td>
                                                    </tr>
                                                    <tr class="align-middle text-center text-sm">
                                                        <td>Retención de líquidos</td>
                                                        <td>
                                                            <input type="number" class="border bg-white text-center detox-input" name="detox_input[]" min="0" max="4" required disabled>
                                                        </td>
                                                    </tr>
                                                    <tr class="align-middle text-center text-sm">
                                                        <td>Obesidad</td>
                                                        <td>
                                                            <input type="number" class="border bg-white text-center detox-input" name="detox_input[]" min="0" max="4" required disabled>
                                                        </td>
                                                    </tr>
                                                    <tr class="align-middle text-center text-sm">
                                                        <td>Celulitis</td>
                                                        <td>
                                                            <input type="number" class="border bg-white text-center detox-input" name="detox_input[]" min="0" max="4" required disabled>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <div class="mb-3 mt-3">
                                        <label for="news" class="form-label"><b>Novedades:</b></label>
                                        <textarea class="form-control" name="news" id="news" rows="3"></textarea>
                                    </div>
                                    <div class="mb-3">
                                        <label for="recommendations" class="form-label"><b>Recomendaciones:</b></label>
                                        <textarea class="form-control" name="recommendations" id="recommendations" rows="3"></textarea>
                                    </div>
                                </div>
                                <input type="hidden" name="userID" value="{{$id}}">
                                <div class="row">
                                    <div class="col-auto ms-auto me-auto p-0 mt-5 mb-2">
                                        <input type="submit" class="btn btn-primary bg-gradient" value="Guardar">
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
