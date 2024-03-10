@extends('admin-views.layouts.app')
@section('content')
<div class="container">
    <h1>hi Dashboard</h1>
    <hr>

    <br><br>
    <div class="row">
        <div class="col-sm-6">
            <div class="card shadow p-3 mb-5 bg-danger rounded ">
                <div class="card-body">
                    <div class="row">
                        <h5 class="card-title text-white">Patients</h5>
                        <p class="con-text text-white display-flex">62</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-6">
            <div class="card shadow p-3 mb-5 bg-info rounded ">
                <div class="card-body">
                    <div class="row">
                        <h5 class="card-title text-white">Appointments</h5>
                        <p class="con-text text-white display-flex">40</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-6">
            <div class="card shadow p-3 mb-5 bg-success rounded ">
                <div class="card-body">
                    <div class="row">
                        <h5 class="card-title text-white">Technicians</h5>
                        <p class="con-text text-white display-flex">12</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-6">
            <div class="card shadow p-3 mb-5 bg-secondary rounded ">
                <div class="card-body">
                    <div class="row">
                        <h5 class="card-title text-white">Reports</h5>
                        <p class="con-text text-white display-flex">Rs : 12</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection