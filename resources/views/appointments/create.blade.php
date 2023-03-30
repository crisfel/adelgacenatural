@extends('layouts.dashboard')
@section('content')
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-12">
                <div class="card my-4">
                    <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                        <div class="bg-success bg-gradient shadow-primary rounded-bottom p-1">
                            <h6 class="text-white text-center text-capitalize ps-2 mx-6"><a href="{{route('appointments.index')}}" class="btn btn-block"><i style="color: white; margin-top: 13px;" class="material-icons opacity-10">keyboard_return</i></a>Solicitar cita</h6>
                        </div>
                    </div>
                    <div class="card-body px-0 pb-2">
                        <div class="container">
                            <form method="POST" action="{{route('appointments.store')}}" enctype="multipart/form-data">
                                @csrf
                                <div class="row justify-content-center">
                                    <div class="col-md-6 text-center justify-content-center mt-4 mb-4">
                                        <h2 style="font-family:Arial Narrow, sans-serif; font-weight: bold;" class="mb-5 text-primary text-center">Seleccione una fecha</h2>
                                        <input style="display:none" type="text" class="form-control w-25 mx-auto mb-3" id="result" name="result" placeholder="Select date" disabled="">
                                        <input type="hidden" class="form-control w-25 mx-auto mb-3" id="date" name="date">
                                        <div class="col-md-12">
                                                <div id="inline_cal"></div>
                                            </div>
                                    </div>
                                    <div class="form-group col-md-6 ms-auto me-auto mt-4 mb-5">
                                        <div class="col-auto ms-auto me-auto w-75">
                                            <h2 style="font-family:Arial Narrow, sans-serif; font-weight: bold;" class="mb-5 text-primary text-center">Seleccione una hora</h2>
                                            <input class="form-control border" type="time" name="time" id="time" required>
                                        </div>
                                    </div>
                                    <div class="form-group col-md-12 ms-auto me-auto mt-5">
                                        <div class="ms-auto me-auto w-75">
                                            <h2 style="font-family:Arial Narrow, sans-serif; font-weight: bold;" class="mb-5 text-primary text-center">Comentario</h2>
                                            <textarea class="form-control" name="comment" id="comment" rows="3"></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-auto ms-auto me-auto p-0 mt-5 mb-4">
                                        <input type="submit" class="btn btn-primary bg-gradient" value="Solicitar">
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>

@endsection
