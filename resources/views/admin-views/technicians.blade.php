@extends('admin-views.layouts.app')
@section('content')
<div>
    <div class="col-md-10 fw-500">
        <h1>Technicians</h1>
    </div>
    <hr>
    <div id="toolbar">
        <a href="{{ route('admin.add_technician_form') }}"><button class="btn btn-primary" id="">Add Technician</button></a>
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
            @foreach($technicians as $technician)
            <tr>
                <td class="text-center">{{$technician->name}}</td>
                <td class="text-end">{{$technician->email}}</td>
                <td><a href="{{ route('admin.edit_technician_form', $technician->id) }}" class="btn btn-primary">Edit</a></td>
            </tr>
            @endforeach

        </tbody>
    </table>


</div>
@endsection