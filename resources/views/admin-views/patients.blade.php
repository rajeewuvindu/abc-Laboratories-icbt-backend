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
                <th data-sortable="true" data-field="status" data-filter-control="input">Status</th>
                <th data-sortable="true" data-field="emp_number" data-filter-control="input">EPF Number</th>
                <th data-sortable="true" data-field="auth_level" data-filter-control="input">Authorization Level</th>
                <th data-sortable="true" data-field="user_id" data-filter-control="input">User ID</th>
                <th data-sortable="true" data-field="vendor_code" data-filter-control="input">Vendor Code</th>
                <th data-sortable="true" data-field="user" data-filter-control="input">User</th>
                <th data-sortable="true" data-field="email" data-filter-control="input">Email</th>
                <th data-sortable="true" data-field="phone" data-filter-control="input">Phone</th>
                <th data-sortable="true" data-field="department" data-filter-control="select">Department</th>
                <th data-sortable="true" data-field="designation" data-filter-control="input">Designation</th>
                <th>Edit</th>
                <th>Enable/Disable</th>
                <th>View Details</th>

            </tr>
        </thead>
        <tbody>
            <tr>
             
                <td class="text-center">hygiuy</td>

                <td class="text-end">rthyytj</td>
                <td>fdgfdgfdg_level_name</td>
                <td>fdgfdgfdg</td>

                <td>sdfvnj uuu</td>

                <td>fdg</td>
                <td>dsf</td>

                <td>dsfdsdsvcdf</td>


                <td>erwwef</td>
                <td>sdsd</td>

                <td><button type="button" class="btn btn-primary">Edit</button></td>
                <td><button type="button" class="btn btn-primary">Enable/Disable</button></td>
                <td><a href="" class="btn btn-primary">View</a></td>
            </tr>
        </tbody>
    </table>


</div>
@endsection