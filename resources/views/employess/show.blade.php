@extends('layout.app')
@section('content')


<div class="container col-md-8">
    <div class="card">



        <h5> View Employees
            <a class="float-end" href="{{route("employee.index")}}"> Back</a>
        </h5>
        @if ($employee->image !=null)
            <img src="{{asset("upload/$employee->image")}}" alt="" class="card-top img-fluid">
    @else
            <img src="{{asset('placeholder.webp')}}" alt="" class="card-top img-fluid">
        @endif
    <div class="card body">
        <h2> name:{{$employee->name}} </h2>
        <h2> salary:{{$employee->salary}} </h2>
        <h2> department:{{$employee->department->name}} </h2>

    </div>
    </div>
</div>

@endsection
