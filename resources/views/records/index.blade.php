@extends('layouts.dashboard')
@section('content')
    @if(Session::has('SuccessfulRecordsStore'))
        <div class="alert alert-success" role="alert">
            <p class="text-center text-white">{{ Session::get('SuccessfulRecordsStore') }}</p>
        </div>
    @endif
    @if(Session::has('FailedRecordsStore'))
        <div class="alert alert-warning" role="alert">
            <p class="text-center text-white">{{ Session::get('FailedRecordsStore') }}</p>
        </div>
    @endif
    @if(Session::has('SuccessfulRecordsUpdate'))
        <div class="alert alert-success" role="alert">
            <p class="text-center text-white">{{ Session::get('SuccessfulRecordsUpdate') }}</p>
        </div>
    @endif
    @if(Session::has('FailedRecordsUpdate'))
        <div class="alert alert-warning" role="alert">
            <p class="text-center text-white">{{ Session::get('FailedRecordsUpdate') }}</p>
        </div>
    @endif
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-12">
                <div class="card my-4">
                    <div class="card-header p-0 position-relative mt-n4 mx-2 z-index-2">
                        <div class="bg-success bg-gradient shadow-primary rounded-bottom pt-1 pb-0">
                            <h6 class="text-white text-center text-capitalize ps-2 mx-6 p-3">
                                <a href="{{route('users.index', ['id' => 'patient'])}}" class="btn btn-block">
                                    <i style="color: white; margin-top: 13px;" class="material-icons opacity-10">keyboard_return</i>
                                </a>
                                Historial
                                <a href="{{route('records.create', ['id' => $id])}}" class="btn btn-block btn-Secondary"><i style="color: white; margin-top: 13px;" class="material-icons opacity-10">library_add</i></a></h6>
                        </div>
                    </div>
                    <div class="card-body px-0 pb-2">
                        <div class="w-75 ms-auto me-auto">
                            <select id="categoryChart" class="form-select mt-6 mb-5 bg-white text-center" onchange="showChart()">
                                <option>Seleccione una categoría</option>
                                @foreach ($chartData['categories'] as $category)
                                    <option value="{{$category}}">
                                        @if ($category == 'weight')
                                            Peso
                                        @endif
                                            @if ($category == 'size')
                                                Talla
                                            @endif
                                            @if ($category == 'blood_pressure')
                                                Presión arterial
                                            @endif
                                            @if ($category == 'heartbeat')
                                                Pulso
                                            @endif
                                            @if ($category == 'temperature')
                                                Temperatura
                                            @endif
                                            @if ($category == 'glucometer')
                                                Glucometría
                                            @endif
                                            @if ($category == 'oximetry')
                                                Oximetría
                                            @endif
                                            @if ($category == 'bust')
                                                Busto
                                            @endif
                                            @if ($category == 'waist')
                                                Cintura
                                            @endif
                                            @if ($category == 'hip')
                                                Cadera
                                            @endif
                                            @if ($category == 'left_bicep')
                                                Bicep izquierdo
                                            @endif
                                            @if ($category == 'right_bicep')
                                                Bicep derecho
                                            @endif
                                            @if ($category == 'left_calf')
                                                Pantorrilla izquierda
                                            @endif
                                            @if ($category == 'right_calf')
                                                Pantorrilla derecha
                                            @endif
                                            @if ($category == 'adipometer')
                                                Adipómetro
                                            @endif
                                            @if ($category == 'imc')
                                                IMC
                                            @endif
                                            @if ($category == 'metabolic_age')
                                                Edad metabólica
                                            @endif
                                            @if ($category == 'body_water')
                                                % Agua corporal
                                            @endif
                                            @if ($category == 'visceral_fat')
                                                Grasa visceral
                                            @endif
                                            @if ($category == 'bone_mass')
                                                Masa osea
                                            @endif
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        {!! $chartData['htmlContainers'] !!}
                        <div class="table-responsive p-0">
                            <table id="my_table" class="table align-items-center table-striped table-bordered mb-0">
                                <thead>
                                <tr>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Foto</th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Fecha</th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Edad</th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Peso</th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Talla</th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Presión arterial</th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Acción</th>
                                </tr>
                                </thead>
                                <tbody>
                                    @foreach($records as $record)
                                        <tr class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            <td>
                                                <a class="image-link" href="https://adelgacenatural.com{{$record->body_photo_url}}">
                                                    <img class="rounded-2" width="100px" src="https://adelgacenatural.com{{$record->body_photo_url}}" onError="this.onerror=null;this.src='https://app.adelgacenatural.com/img/human-body.png';">
                                                </a>
                                            </td>
                                            <td>{{$record->created_at}}</td>
                                            <td>{{$record->age}} años</td>
                                            <td>{{$record->weight}} kg</td>
                                            <td>{{$record->size}} cm</td>
                                            <td>{{$record->blood_pressure}}</td>
                                            <td>
                                                <div class="d-flex justify-content-center">
                                                    <div class="d-inline">
                                                        <a style="color: darkgreen;" href="{{route('records.edit', ['id' => $record->id])}}" title="Editar" class="btn btn-link px-1 mb-0"><i style="color: darkgreen; font-size: 25px !important;" class="material-icons opacity-10">edit</i></a>
                                                    </div>
                                                    <div class="d-inline">
                                                        <button type="button" class="btn btn-white p-1" data-bs-toggle="modal" data-bs-target="#recordModal" title="Detalle"
                                                                data-created_at="{{$record->created_at}}"
                                                                data-age="{{$record->age}}"
                                                                data-weight ="{{$record->weight}}"
                                                                data-size="{{$record->size}}"
                                                                data-blood_pressure="{{$record->blood_pressure}}"
                                                                data-heartbeat="{{$record->heartbeat}}"
                                                                data-temperature="{{$record->temperature}}"
                                                                data-glucometer="{{$record->glucometer}}"
                                                                data-last_food="{{$record->last_food}}"
                                                                data-oximetry="{{$record->oximetry}}"
                                                                data-oximetry_level="{{$record->oximetry_level}}"
                                                                data-bust="{{$record->bust}}"
                                                                data-waist="{{$record->waist}}"
                                                                data-hip="{{$record->hip}}"
                                                                data-left_bicep="{{$record->left_bicep}}"
                                                                data-right_bicep="{{$record->right_bicep}}"
                                                                data-left_calf="{{$record->left_calf}}"
                                                                data-right_calf="{{$record->right_calf}}"
                                                                data-adipometer="{{$record->adipometer}}"
                                                                data-imc="{{$record->imc}}"
                                                                data-metabolic_age="{{$record->metabolic_age}}"
                                                                data-body_water="{{$record->body_water}}"
                                                                data-visceral_fat="{{$record->visceral_fat}}"
                                                                data-bone_mass="{{$record->bone_mass}}"
                                                                data-detox="{{$record->detox}}"
                                                                data-recommendations="{{$record->recommendations}}"
                                                                data-news="{{$record->news}}">
                                                            <a style="color: darkgreen;" ><i style="color: darkblue; font-size: 25px !important;" class="material-icons opacity-10">add</i></a></button>
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
    <div class="modal fade" id="recordModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalMessageTitle" aria-hidden="true">
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
                        <tbody class="text-center">
                        <tr>
                            <td>
                                <b>Fecha</b>
                            </td>
                            <td>
                                <p style="color:black;" id="created_at-def"></p>
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
                                <b>Peso</b>
                            </td>
                            <td>
                                <p style="color:black;" id="weight-def"></p>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <b>Talla</b>
                            </td>
                            <td>
                                <p style="color:black;" id="size-def"></p>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <b>Presión arterial</b>
                            </td>
                            <td>
                                <p style="color:black;" id="blood_pressure-def"></p>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <b>Pulso</b>
                            </td>
                            <td>
                                <p style="color:black;" id="heartbeat-def"></p>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <b>Temperatura</b>
                            </td>
                            <td>
                                <p style="color:black;" id="temperature-def"></p>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <b>Glucometría</b>
                            </td>
                            <td>
                                <p style="color:black;" id="glucometer-def"></p>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <b>Última comida</b>
                            </td>
                            <td>
                                <p style="color:black;" id="last_food-def"></p>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <b>Oximetría</b>
                            </td>
                            <td>
                                <p style="color:black;" id="oximetry-def"></p>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <b>Nivel de oximetría</b>
                            </td>
                            <td>
                                <p style="color:black;" id="oximetry_level-def"></p>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <b>Busto</b>
                            </td>
                            <td>
                                <p style="color:black;" id="bust-def"></p>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <b>Cintura</b>
                            </td>
                            <td>
                                <p style="color:black;" id="waist-def"></p>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <b>Cadera</b>
                            </td>
                            <td>
                                <p style="color:black;" id="hip-def"></p>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <b>Bicep izquierdo</b>
                            </td>
                            <td>
                                <p style="color:black;" id="left_bicep-def"></p>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <b>Bicep derecho</b>
                            </td>
                            <td>
                                <p style="color:black;" id="right_bicep-def"></p>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <b>Pantorrilla izquierda</b>
                            </td>
                            <td>
                                <p style="color:black;" id="left_calf-def"></p>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <b>Pantorrilla derecha</b>
                            </td>
                            <td>
                                <p style="color:black;" id="right_calf-def"></p>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <b>Adipómetro</b>
                            </td>
                            <td>
                                <p style="color:black;" id="adipometer-def"></p>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <b>IMC</b>
                            </td>
                            <td>
                                <p style="color:black;" id="imc-def"></p>
                            </td>
                        </tr>

                        <tr>
                            <td>
                                <b>Edad metabólica</b>
                            </td>
                            <td>
                                <p style="color:black;" id="metabolic_age-def"></p>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <b>% Agua corporal</b>
                            </td>
                            <td>
                                <p style="color:black;" id="body_water-def"></p>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <b>Grasa visceral</b>
                            </td>
                            <td>
                                <p style="color:black;" id="visceral_fat-def"></p>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <b>Masa osea</b>
                            </td>
                            <td>
                                <p style="color:black;" id="bone_mass-def"></p>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <b>Detox</b>
                            </td>
                            <td>
                                <p style="color:black;" id="detox-def"></p>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <b>Recomendaciones</b>
                            </td>
                            <td>
                                <p style="color:black;" id="recommendations-def"></p>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <b>Novedades</b>
                            </td>
                            <td>
                                <p style="color:black;" id="news-def"></p>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <script>
        $('#recordModal').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget)
            var created_at = button.data('created_at');
            var age = button.data('age');
            var weight = button.data('weight');
            var size = button.data('size');
            var blood_pressure = button.data('blood_pressure');
            var heartbeat = button.data('heartbeat');
            var temperature = button.data('temperature');
            var glucometer = button.data('glucometer');
            var last_food = button.data('last_food');
            var oximetry = button.data('oximetry');
            var oximetry_level = button.data('oximetry_level');
            var bust = button.data('bust');
            var waist = button.data('waist');
            var hip = button.data('hip');
            var left_bicep = button.data('left_bicep');
            var right_bicep = button.data('right_bicep');
            var left_calf = button.data('left_calf');
            var right_calf = button.data('right_calf');
            var adipometer = button.data('adipometer');
            var imc = button.data('imc');
            var metabolic_age = button.data('metabolic_age');
            var body_water = button.data('body_water');
            var visceral_fat = button.data('visceral_fat');
            var bone_mass = button.data('bone_mass');
            var detox = button.data('detox');
            var recommendations = button.data('recommendations');
            var news = button.data('news');

            document.getElementById("created_at-def").innerHTML = created_at;
            document.getElementById("age-def").innerHTML = age+' años';
            document.getElementById("weight-def").innerHTML = weight+' kg';
            document.getElementById("size-def").innerHTML = size+' cm';
            document.getElementById("blood_pressure-def").innerHTML = blood_pressure;
            document.getElementById("heartbeat-def").innerHTML = heartbeat;
            document.getElementById("temperature-def").innerHTML = temperature+' °C';
            document.getElementById("glucometer-def").innerHTML = glucometer;
            document.getElementById("last_food-def").innerHTML = last_food;
            document.getElementById("oximetry-def").innerHTML = oximetry;
            document.getElementById("oximetry_level-def").innerHTML = oximetry_level;
            document.getElementById("bust-def").innerHTML = bust;
            document.getElementById("waist-def").innerHTML = waist;
            document.getElementById("hip-def").innerHTML = hip;
            document.getElementById("left_bicep-def").innerHTML = left_bicep;
            document.getElementById("right_bicep-def").innerHTML = right_bicep;
            document.getElementById("left_calf-def").innerHTML = left_calf;
            document.getElementById("right_calf-def").innerHTML = right_calf;
            document.getElementById("adipometer-def").innerHTML = adipometer;
            document.getElementById("imc-def").innerHTML = imc;
            document.getElementById("metabolic_age-def").innerHTML = metabolic_age;
            document.getElementById("body_water-def").innerHTML = body_water;
            document.getElementById("visceral_fat-def").innerHTML = visceral_fat;
            document.getElementById("bone_mass-def").innerHTML = bone_mass;
            document.getElementById("detox-def").innerHTML = detox;
            document.getElementById("recommendations-def").innerHTML = recommendations
            document.getElementById("news-def").innerHTML = news;
        });
    </script>
    <script type="text/javascript">
        function showChart()
        {
            let categoryChartSelect = document.getElementById('categoryChart');
            let chartContainer = document.getElementById('container'+categoryChartSelect.value);
            let containers = document.querySelectorAll('.chart-container');

            containers.forEach(container => {
               container.style.display = 'none';
            });

            chartContainer.style.display = 'block';
        }

    </script>
    <script type="text/javascript">
        var dates = {{str_replace('"', '', json_encode($chartData['dates']))}}
            .map(fecha => {
                fecha = fecha.toString();
                return fecha.slice(0, 4) + "-" + fecha.slice(4, 6) + "-" + fecha.slice(6, 8) });
        /*
        if (strlen(dates.length) === 2) {

            var chartWidth = 1500;

        } elseif (strlen(dates.length) === )
        */
        @for($i = 0; $i < count($chartData['categories']); $i++)

            Highcharts.chart('container{{$chartData['categories'][$i]}}', {
                chart: {
                    type: 'area',
                    scrollablePlotArea: {
                        minWidth: 2500,
                        scrollPositionX: 1,
                    },
                },
                responsive: {
                    rules: [{
                        condition: {
                            maxWidth: 500
                        }
                    }]
                },
                title: {
                    text: '{{$chartData['categories'][$i]}}'
                },
                xAxis: {
                    categories: dates,
                    scrollbar: {
                        enabled: true,
                        max: 30 // máximo de 20 puntos de datos visibles en la gráfica
                    }
                },
                yAxis: {
                    title: {
                        text: 'Cantidad'
                    }
                },
                plotOptions: {
                    series: {
                        allowPointSelect: true
                    }
                },
                series: [{
                    name: '{{$chartData['categories'][$i]}}',
                    data: {{str_replace('"', "", json_encode($chartData['quantities'][$i]))}}
                }]
            });

        @endfor
    </script>

@endsection
