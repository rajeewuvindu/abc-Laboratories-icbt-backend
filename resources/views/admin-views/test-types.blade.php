@extends('admin-views.layouts.app')
@section('content')
<div>
    <div class="col-md-10 fw-500">
        <h1>Test Types</h1>
    </div>
    <hr>
    <div id="toolbar">
        <a href="{{ route('admin.add_test_type_form') }}"><button class="btn btn-primary" id="">Add Test Type</button></a>
    </div>
    <table id="table" data-toolbar="#toolbar" data-filter-control="true" data-toggle="table" data-toolbar="#toolbar" data-height="600" data-pagination="true" data-search="true" class="text-center">

        <thead>
            <tr>

                <th data-sortable="true" data-field="id" data-filter-control="input">ID</th>
                <th data-sortable="true" data-field="name" data-filter-control="input">Test Type</th>
                <th data-sortable="true" data-field="status" data-filter-control="input">Status</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
        </thead>
        <tbody>
            @foreach($test_types as $test_type)
            <tr>
                <td class="text-center">{{$test_type->id}}</td>
                <td class="text-end">{{$test_type->test_type}}</td>

                @if($test_type->status == "deleted")
                <td class="text-center text-danger fw-bolder">{{str_replace('_', ' ', Str::title($test_type->status))}}</td>
                @else
                <td class="text-center text-success fw-bolder">{{str_replace('_', ' ', Str::title($test_type->status))}}</td>
                @endif 

                <td><a href="{{ route('admin.edit_test_type_form', $test_type->id) }}" class="btn btn-primary">Edit</a></td>
                <td><a href="{{ route('admin.remove_test_type', $test_type->id) }}" class="btn btn-primary">Delete</a></td>
            </tr>
            @endforeach

        </tbody>
    </table>


</div>
@endsection