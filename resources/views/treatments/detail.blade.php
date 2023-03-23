@extends('layouts.dashboard')
@section('content')
    <div class="container-fluid py-4">
        <div class="card">
            <div class="card-header p-0 position-relative z-index-2">
                <div class="bg-success bg-gradient shadow-primary rounded-bottom p-1 mx-2">
                    <h6 class="text-white text-center text-capitalize ps-2 mx-6">
                        <a href="{{route('treatments.index')}}" class="btn btn-block">
                            <i style="color: white; margin-top: 13px;" class="material-icons opacity-10">keyboard_return</i>
                        </a>Detalle del tratamiento</h6>
                </div>
            </div>
            <div class="card-body">
                <div class="row mb-5">
                <div class="col-md-2"></div>
                    <div style="background-color: rgb(220, 213, 211, 1)" class="col-md-8 col-sm-8 border rounded-2">
                        <div class="row d-flex justify-content-center">
                            <div class="col-md-8">
                                <ul class="list-group mt-2 mb-2">
                                    <li style="background-color: rgb(220, 213, 211, 1); text-align:justify;" class="list-group-item border-0"><b>Título: </b><spam class="text-justify">{{$treatment->title}}</spam></li>
                                    <li style="background-color: rgb(220, 213, 211, 1); text-align:justify;" class="list-group-item border-0"><b>Descripción: </b><spam class="text-justify">{{$treatment->description}}</spam></li>
                                </ul>
                            </div>
                            <div class="col-md-4 d-flex">
                                <div class="ms-auto me-auto mt-3 mb-3">
                                    <a target="_blank" href="https://adelgacenatural.com{{$treatment->urlFile}}" class="btn btn-primary bg-gradient">Ver documento</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 mt-5">
                        <h3 style="font-family:Arial Narrow, sans-serif;" class="mb-5 text-lg mt-5 text-center"><b>Contenido del documento</b></h3>
                    </div>
                    <div class="col-md-12">
                        <iframe width="100%" height="900px" src="https://adelgacenatural.com{{$treatment->urlFile}}"></iframe>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
