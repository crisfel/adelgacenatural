@extends('layouts.dashboard')
@section('content')
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-12">
                <div class="card my-4">
                    <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                        <div class="bg-success bg-gradient shadow-primary rounded-bottom p-1">
                            <h6 class="text-white text-center text-capitalize ps-2 mx-6">
                                <a href="{{route('treatments.index')}}" class="btn btn-block">
                                    <i style="color: white; margin-top: 13px;" class="material-icons opacity-10">keyboard_return</i>
                                </a>Crear Tratamiento</h6>
                        </div>
                    </div>
                    <div class="card-body px-0 pb-2">
                        <div class="container">
                            <form method="POST" action="{{route('treatments.update')}}" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-floating mb-3">
                                            <input type="text" class="form-control border" name="title" id="title" placeholder="Titulo" value="{{$treatment->title}}" required>
                                            <label for="name">Título</label>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <label for="treatment_img" class="form-label"><b>Foto del tratamiento</b></label>
                                        <input class="form-control" type="file" id="treatment_img" name="treatment_img">
                                    </div>
                                    <div class="col-md-4">
                                        <label for="treatment_file" class="form-label"><b>Pdf del tratamiento</b></label>
                                        <input class="form-control" type="file" id="treatment_file" name="treatment_file">
                                    </div>
                                    <div class="col-md-4">
                                        <div class="mb-3">
                                            <label for="description" class="form-label"><b>Descripción</b></label>
                                            <textarea class="form-control" id="description" name="description" rows="3" required>{{$treatment->description}}</textarea>
                                        </div>
                                    </div>
                                </div>
                                <input type="hidden" name="treatmentID" value="{{$treatment->id}}">
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
@endsection
