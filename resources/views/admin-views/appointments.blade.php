@extends('admin-views.layouts.app')
@section('content')
<div>
    <div class="col-md-10 fw-500">
        <h1>Appointments</h1>
    </div>
    <hr>

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
            </tr>
            @endforeach
        </tbody>
    </table>


</div>
@endsection