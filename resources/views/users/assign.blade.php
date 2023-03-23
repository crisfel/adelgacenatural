@extends('layouts.dashboard')
@section('content')

    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-12">
                <div class="card my-4">
                    <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                        <div class="bg-success bg-gradient shadow-primary rounded-bottom p-1">
                            <h6 class="text-white text-center text-capitalize ps-2 mx-6">
                                <a href="{{route('users.index', ['id' => 'patient'])}}" class="btn btn-block">
                                    <i style="color: white; margin-top: 13px;" class="material-icons opacity-10">keyboard_return</i>
                                </a>Asignar tratamientos</h6>
                        </div>
                    </div>
                    <div class="card-body px-0 pb-2">
                        <div class="container">
                            <form method="POST" action="{{route('store.assignments')}}" enctype="multipart/form-data">
                                @csrf
                                <div class="row mb-2">
                                    @foreach($treatments as $treatment)
                                        <div class="col-md-4 form-check mt-4 justify-content-center d-flex">
                                            <input type="checkbox" style="width:5%" class="form-check-input border me-2"
                                                   name="treatmentID[]" value="{{$treatment->id}}"
                                                @foreach ($patientTreatments as $pTreatment)
                                                        @if($pTreatment->treatment_id == $treatment->id)
                                                            checked
                                                            @break
                                                        @endif
                                                @endforeach
                                            >
                                            <label class="form-check-label" for="treatmentID[]">{{$treatment->title}}</label>
                                        </div>
                                    @endforeach
                                </div>
                                <input type="hidden" name="userID" value="{{$userID}}">
                                <div class="row">
                                    <div class="col-md-12 mt-5 mb-3 d-flex justify-content-center">
                                        <input type="submit" class="btn btn-primary bg-gradient" value="Asignar">
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
