@extends('layout.app')
@section('content')


<div class="container col-md-8">
    <div class="card">



        <h5> View Department
            <a class="float-end" href="{{route("department.index")}}"> Back</a>
        </h5>

    <div class="card body">
        <h2> name:{{$department->name}} </h2>
        <h2> description:{{$department->description}} </h2>
    </div>
    </div>
</div>

@endsection
