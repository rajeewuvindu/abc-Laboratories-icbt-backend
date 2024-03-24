@extends('doctor-views.layouts.app')
@section('content')
<div>
    <div class="col-md-10 fw-500">
        <h1>Appointments</h1>
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
    <table id="table" data-toolbar="#toolbar" data-filter-control="true" data-toggle="table" data-toolbar="#toolbar" data-height="600" data-pagination="true" data-search="true" class="text-center">

        <thead>
            <tr>
                <th data-sortable="true" data-field="id" data-filter-control="input">Patient ID</th>
                <th data-sortable="true" data-field="name" data-filter-control="input">Patient Name</th>
                <th data-sortable="true" data-field="test_type" data-filter-control="input">Test Type</th>
                <th data-sortable="true" data-field="date" data-filter-control="input">Date</th>
                <th data-sortable="true" data-field="time" data-filter-control="input">Time</th>
            </tr>
        </thead>
        <tbody>
            @foreach($appointments as $appointment)
            <tr>
                <td class="text-center">{{$appointment->user['patient_id']}}</td>
                <td class="text-center">{{$appointment->user['name']}}</td>
                <td class="text-center">{{$appointment->testType['test_type']}}</td>

                @if($appointment->date == null)
                <td>Not Assigned</td>
                @else
                <td class="text-center">{{$appointment->date}}</td>
                @endif

                @if($appointment->time == null)
                <td>Not Assigned</td>
                @else
                <td class="text-center">{{$appointment->time}}</td>
                @endif

            </tr>
            @endforeach
        </tbody>
    </table>


</div>
@endsection