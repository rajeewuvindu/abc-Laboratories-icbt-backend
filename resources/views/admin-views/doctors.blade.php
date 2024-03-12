@extends('admin-views.layouts.app')
@section('content')
<div>
    <div class="col-md-10 fw-500">
        <h1>Doctors</h1>
    </div>
    <hr>
    <div id="toolbar">
        <a href="{{ route('admin.add_doctor_form') }}"><button class="btn btn-primary" id="">Add Doctor</button></a>
    </div>
    <table id="table" data-toolbar="#toolbar" data-filter-control="true" data-toggle="table" data-toolbar="#toolbar" data-height="600" data-pagination="true" data-search="true" class="text-center">

        <thead>
            <tr>

                <th data-sortable="true" data-field="name" data-filter-control="input">Name</th>
                <th data-sortable="true" data-field="email" data-filter-control="input">Email</th>
                <th>Edit</th>

            </tr>
        </thead>
        <tbody>
            @foreach($doctors as $doctor)
            <tr>
                <td class="text-center">{{$doctor->name}}</td>
                <td class="text-end">{{$doctor->email}}</td>
                <td><a href="{{ route('admin.edit_doctor_form', $doctor->id) }}" class="btn btn-primary">Edit</a></td>
            </tr>
            @endforeach

        </tbody>
    </table>


</div>
@endsection