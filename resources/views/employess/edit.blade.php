@extends('layout.app')
@section('content')


<div class="container col-md-8">
    <div class="card">



        <h5> Edit Employees
            <a class="float-end" href="{{route("employee.index")}}"> Back </a>
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
    <form action="{{route('employee.update',$employee->id)}}" method="POST" enctype="multipart/form-data">
        @csrf
    <div class="form-group">
        <label for="">Employee Name</label>
        <input type="text" value="{{$employee->name}}" class="form-control @error('name') is_invalid @enderror" placeholder="Name" name="name">
    </div>
        <div class="form-group">
        <label for="">Employee salary</label>
        <input type="number" value="{{$employee->salary}}" class="form-control" placeholder="Salary" name="salary">
    </div>
        <div class="form-group">
        <label for="">Employee image :
                    @if ($employee->image !=null)
            <img width="30" src="{{asset("upload/$employee->image")}}" alt="" class="card-top img-fluid">
    @else
            <img width="30" src="{{asset('placeholder.webp')}}" alt="" class="card-top img-fluid">
        @endif
        </label>
        <input type="file" class="form-control" name="image">
    </div>
    <div class="form-group">
        <label for="">Employee Department</label>
        <select name="department_id" class="form-control my-3" id="">
            <option disabled selected>Select Department</option>
            @foreach ($departments as $item )
            @if ($employee->department_id ==$item->id)
                <option selected value="{{$item->id}}">{{$item->name}}</option>
            @else
                <option  value="{{$item->id}}">{{$item->name}}</option>

            @endif
            @endforeach
        </select>
    </div>
    <div class="d-grid">
        <button class="btn btn-info">Submit</button>
    </div>
    </form>
    </div>
    </div>
    </div>

@endsection
