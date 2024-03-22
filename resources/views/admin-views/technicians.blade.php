@extends('admin-views.layouts.app')
@section('content')
<div>
    <div class="col-md-10 fw-500">
        <h1>Technicians</h1>
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

    <div id="toolbar">
        <a href="{{ route('admin.add_technician_form') }}"><button class="btn btn-primary" id="">Add Technician</button></a>
    </div>
    <table id="table" data-toolbar="#toolbar" data-filter-control="true" data-toggle="table" data-toolbar="#toolbar" data-height="600" data-pagination="true" data-search="true" class="text-center">

        <thead>
            <tr>

                <th data-sortable="true" data-field="name" data-filter-control="input">Name</th>
                <th data-sortable="true" data-field="email" data-filter-control="input">Email</th>
                <th data-sortable="true" data-field="status" data-filter-control="input">Status</th>
                <th>Edit</th>
                <th>Delete</th>

            </tr>
        </thead>
        <tbody>
            @foreach($technicians as $technician)
            <tr>
                <td class="text-center">{{$technician->name}}</td>
                <td class="text-end">{{$technician->email}}</td>

                @if($technician->status == "deleted")
                <td class="text-center text-danger fw-bolder">{{str_replace('_', ' ', Str::title($technician->status))}}</td>
                @else
                <td class="text-center text-success fw-bolder">{{str_replace('_', ' ', Str::title($technician->status))}}</td>
                @endif

                @if($technician->status == "active")
                <td><a href="{{ route('admin.edit_technician_form', $technician->id) }}" class="btn btn-primary">Edit</a></td>
                <td><a href="{{ route('admin.remove_technician', $technician->id) }}" class="btn btn-primary">Delete</a></td>
                @else
                <td><a class="btn btn-secondary">Edit</a></td>
                <td><a class="btn btn-secondary">Delete</a></td>
                @endif

            </tr>
            @endforeach

        </tbody>
    </table>


</div>
@endsection