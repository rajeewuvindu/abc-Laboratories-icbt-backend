@extends('admin-views.layouts.app')
@section('content')
<div>
    <div class="col-md-10 fw-500">
        <h1>Add Technician</h1>
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


    <form class="row g-3" action="{{ route('admin.save_technician') }}" method="post">
        {{csrf_field()}}
        <div class="col-md-4">
            <label class="form-label">Name</label>
            <input type="text" class="form-control" name="name" required>
            
        </div>

        <div class="col-md-4">
            <labe class="form-label">Email</label>
                <input type="email" class="form-control" name="email" required>
                
        </div>

        <div class="col-12">
            <input type="submit" class="btn btn-primary" value="Add Technician">
        </div>
    </form>

</div>
@endsection