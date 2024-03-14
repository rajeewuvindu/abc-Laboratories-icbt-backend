@extends('technician-views.layouts.app')
@section('content')
<div>
    <div class="col-md-10 fw-500">
        <h1>Reports</h1>
    </div>
    <hr>
    <div id="toolbar">
        <a href="{{ route('technician.add_report_form') }}"><button class="btn btn-primary" id="">Add Report</button></a>
    </div>
    <table id="table" data-toolbar="#toolbar" data-filter-control="true" data-toggle="table" data-toolbar="#toolbar" data-height="600" data-pagination="true" data-search="true" class="text-center">
        <thead>
            <tr>
                <th data-sortable="true" data-field="patient_id" data-filter-control="input">Patient ID</th>
                <th data-sortable="true" data-field="name" data-filter-control="input">Name</th>
                <th>Report</th>
            </tr>
        </thead>
        <tbody>
            @foreach($reports as $report)
            <tr>
                <td class="text-center">{{$report->user['patient_id']}}</td>
                <td class="text-center">{{$report->user['name']}}</td>
                <td><a href="{{ route('technician.view_report', $report->id) }}" class="btn btn-primary">View</a></td>
            </tr>
            @endforeach
        </tbody>
    </table>


</div>
@endsection