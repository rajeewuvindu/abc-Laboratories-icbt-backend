@extends('technician-views.layouts.app')
@section('content')
<div>
    <div class="col-md-10 fw-500">
        <h1>Add Report</h1>
    </div>
    <hr>

    @if(session('error'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        {{ session('error') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif
    @if(session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif

    @if($errors->any())
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif


    <form class="row g-3" action="{{ route('technician.add_report') }}" method="post" enctype="multipart/form-data">
        {{csrf_field()}}
        <div class="col-md-4">
            <div class="row">
                <div class="col-12">
                    <label class="form-label">Select User</label>
                    <select class="form-select" name="user_id" id="user_id" required>
                        <option selected disabled value="">Choose...</option>
                        @foreach($patients as $patient)
                        <option value="{{$patient->id}}">
                            {{$patient->name}} ({{$patient->patient_id}})
                        </option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="row">
                <div class="col-12">
                    <label class="form-label">Select Appointment</label>
                    <select class="form-select" name="appointment_id" id="appointment_id" required>
                        <option selected disabled value="">Choose...</option>
                    </select>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <label class="form-label">Report</label>
            <input type="file" class="form-control" name="report_file" accept="application/pdf" required>
        </div>

        <div class="col-12">
            <input type="submit" class="btn btn-primary" value="Add Technician">
        </div>
    </form>

</div>
@endsection