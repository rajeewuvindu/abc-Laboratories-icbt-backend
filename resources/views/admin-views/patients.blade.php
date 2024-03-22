@extends('admin-views.layouts.app')
@section('content')
<div>
    <div class="col-md-10 fw-500">
        <h1>Patients</h1>
    </div>
    <hr>

    <table id="table" data-toolbar="#toolbar" data-filter-control="true" data-toggle="table" data-toolbar="#toolbar" data-height="600" data-pagination="true" data-search="true" class="text-center">

        <thead>
            <tr>
                <th data-sortable="true" data-field="id" data-filter-control="input">Patient ID</th>
                <th data-sortable="true" data-field="name" data-filter-control="input">Name</th>
                <th data-sortable="true" data-field="email" data-filter-control="input">Email</th>
                <th data-sortable="true" data-field="street_code" data-filter-control="input">Street Code</th>
                <th data-sortable="true" data-field="street" data-filter-control="input">Street</th>
                <th data-sortable="true" data-field="city" data-filter-control="input">City</th>
                <th data-sortable="true" data-field="postal_code" data-filter-control="input">Postal Code</th>
                <th data-sortable="true" data-field="phone" data-filter-control="input">Phone</th>
                <th>View Appointments</th>
            </tr>
        </thead>
        <tbody>
            @foreach($patients as $patient)
            <tr>
                <td class="text-center">{{$patient->patient_id}}</td>
                <td class="text-center">{{$patient->name}}</td>
                <td class="text-center">{{$patient->email}}</td>
                <td class="text-center">{{$patient->street_code}}</td>
                <td class="text-center">{{$patient->street}}</td>
                <td class="text-center">{{$patient->city}}</td>
                <td class="text-center">{{$patient->postal_code}}</td>
                <td class="text-center">{{$patient->contact_number}}</td>
                <td><a href="{{ route('admin.patient_appointments', $patient->id) }}" class="btn btn-primary">View</a></td>
            </tr>
            @endforeach
        </tbody>
    </table>


</div>
@endsection