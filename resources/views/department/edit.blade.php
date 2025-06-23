@extends('layout.app')
@section('content')


<div class="container col-md-8">
    <div class="card">



        <h5> Edit Department
            <a class="float-end" href="{{route("department.index")}}"> Back </a>
        </h5>
        @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
        <div class="card body">
    <form action="{{route('department.update', $department->id)}}" method="POST" enctype="multipart/form-data">
        @csrf
    <div class="form-group">
        <label for="">Department Name</label>
        <input type="text"class="form-control @error('name') is_invalid @enderror" placeholder="Name" name="name">
    </div>
        <div class="form-group">
        <label for="">Department description</label>
        <input type="text" class="form-control" placeholder="description" name="description">
    <div class="d-grid">
        <button class="btn btn-info">Submit</button>
    </div>
    </form>
    </div>
    </div>
    </div>

@endsection
