@extends('layouts.dashboard')

@section('content')
    @if(Session::has('SuccessfulTreatmentStore'))
        <div class="alert alert-success" role="alert">
            <p class="text-center text-white">{{ Session::get('SuccessfulTreatmentStore') }}</p>
        </div>
    @endif
    @if(Session::has('FailedTreatmentStore'))
        <div class="alert alert-warning" role="alert">
            <p class="text-center text-white">{{ Session::get('FailedTreatmentStore') }}</p>
        </div>
    @endif
    @if(Session::has('SuccessfulTreatmentUpdate'))
        <div class="alert alert-success" role="alert">
            <p class="text-center text-white">{{ Session::get('SuccessfulTreatmentUpdate') }}</p>
        </div>
    @endif
    @if(Session::has('FailedTreatmentUpdate'))
        <div class="alert alert-warning" role="alert">
            <p class="text-center text-white">{{ Session::get('FailedTreatmentUpdate') }}</p>
        </div>
    @endif

    @if(Session::has('SuccessfulTreatmentDelete'))
        <div class="alert alert-success" role="alert">
            <p class="text-center text-white">{{ Session::get('SuccessfulTreatmentDelete') }}</p>
        </div>
    @endif
    @if(Session::has('FailedTreatmentDelete'))
        <div class="alert alert-warning" role="alert">
            <p class="text-center text-white">{{ Session::get('FailedTreatmentDelete') }}</p>
        </div>
    @endif

    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-12">
                <div class="card mt-4">
                    <div class="card-header p-0 position-relative mt-n4 mx-2 z-index-2">
                        <div class="bg-success bg-gradient shadow-primary rounded-bottom pt-1 pb-0">
                            <h6 class="text-white text-center text-capitalize ps-2 mx-6 p-3">Tratamientos
                                <a href="{{route('treatments.create')}}" class="btn btn-block btn-Secondary"><i style="color: white; margin-top: 13px;" class="material-icons opacity-10">library_add</i></a>
                            </h6>
                        </div>
                    </div>
                    <div class="card-body px-0">
                        <div class="container m-0 p-0">
                            <div style="width:100%" class="row ms-auto me-auto">
                                @foreach ($treatments as $treatment)
                                    <div class="col-md-3 m-2 ms-auto me-auto d-flex">
                                        <div class="card card-profile p-0 m-0">
                                            <h3 style="font-family:Arial Narrow, sans-serif;" class="text-primary text-center mb-2">{{$treatment->title}}</h3>
                                            <div class="position-relative">
                                                <img src="https://app.adelgacenatural.com/img/nature-banner2.jpg" alt="Image placeholder" class="card-img-top">
                                                <a href="{{route('treatments.detail', ['id' => $treatment->id])}}"><img style="width:40%; height:80%; top: 10%; left: 30%; right:0;" src="https://adelgacenatural.com{{$treatment->urlImage}}" onError="this.onerror=null;this.src='/assets/images/imagen-fallo.jpg';" class="treatmentIMG rounded-circle img-fluid border position-absolute"></a>
                                            </div>
                                            <div class="card-body text-center border-0 p-0">
                                                <div class="d-flex justify-content-center">
                                                    @hasanyrole('administrator|therapist')
                                                    <div class="d-inline">
                                                        <a style="color: darkgreen;" href="{{route('treatments.edit', ['id'=>$treatment->id])}}" title="Editar" class="btn btn-link px-1 mb-0"><i style="color: darkgreen; font-size: 25px !important;" class="material-icons opacity-10">edit</i></a>
                                                    </div>
                                                    <div class="d-inline">
                                                        <a style="color: darkred;" href="{{route('treatments.delete', ['id'=>$treatment->id])}}" title="Eliminar" class="btn btn-link px-1 mb-0" onclick="return confirm('¿Está seguro que quiere eliminar este usuario?');"><i style="color: darkred; font-size: 25px !important;" class="material-icons opacity-10">delete</i></a>
                                                    </div>
                                                    @endhasanyrole
                                                    <div class="d-inline">
                                                        <a style="color: darkblue;" href="{{route('treatments.detail', ['id' => $treatment->id])}}" title="Detalle" class="btn btn-link px-1 mb-0"><i style="color: darkblue; font-size: 25px !important;" class="material-icons opacity-10">add</i></a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        $(document).ready(function() {
            $('.treatmentIMG').mouseenter(function () {
                $(this).css({
                    'width': '50%',
                    'height': '90%',
                    'left': '25%',
                    'top': '5%'
                });
            }).mouseleave(function () {
                $(this).css({
                    'width': '40%',
                    'height': '80%',
                    'left': '30%',
                    'top': '10%'
                });
            });
        });

    </script>
@endsection
