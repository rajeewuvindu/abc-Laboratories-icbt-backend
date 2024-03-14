@extends('technician-views.layouts.app')
@extends('technician-views.assign-doctor-modal')
@extends('technician-views.assign-doctor-edit-modal')
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
                <th data-sortable="true" data-field="status" data-filter-control="input">Status</th>
                <th data-sortable="true" data-field="id" data-filter-control="input">Patient ID</th>
                <th data-sortable="true" data-field="name" data-filter-control="input">Patient Name</th>
                <th data-sortable="true" data-field="test_type" data-filter-control="input">Test Type</th>
                <th data-sortable="true" data-field="date" data-filter-control="input">Date</th>
                <th data-sortable="true" data-field="time" data-filter-control="input">Time</th>
                <th data-sortable="true" data-field="doctor" data-filter-control="input">Doctor Assigned</th>
                <th>Assign to Doctor</th>
                <th>Mark as Completed</th>
                <th>View Details</th>
            </tr>
        </thead>
        <tbody>
            @foreach($appointments as $appointment)
            <tr>

                <td class="text-center">{{str_replace('_', ' ', Str::title($appointment->status))}}</td>

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

                @if($appointment->doctor_id == null)
                <td>Not Assigned</td>
                @else
                <td class="text-center">{{$appointment->doctor['name']}}</td>
                @endif

                @if($appointment->doctor_id == null)
                <td><button type="button" class="btn btn-primary assignDoctor" data-bs-toggle="modal" data-bs-target="#assignDoctorModal" value="{{$appointment->id}}">Assign</button></td>
                @else
                <td><button type="button" class="btn btn-primary editAppointment" data-bs-toggle="modal" data-bs-target="#editAppointmentModal" value="{{$appointment->id}}">Change Settings</button></td>
                @endif

                <td><a href="{{ route('technician.complete_appointment', $appointment->id) }}" class="btn btn-primary">Mark as Completed</a></td>
                <td><a href="" class="btn btn-primary">View</a></td>
            </tr>
            @endforeach
        </tbody>
    </table>


</div>
@endsection