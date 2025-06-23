@extends('layout.app')
@section('content')


<div class="container col-md-8">
    <div class="card">



        <h5> List Department
            <a class="float-end" href="{{route("department.create")}}"> Create New </a>
        </h5>
    <div class="card body">
        <table class="table table-dark">
            <tr>
                    <th>ID </th>
                    <th>Name </th>
                    <th>description </th>
                    <th colspan="3"> Action </th>

                    {{-- <th>Department </th> --}}
            </tr>

                    @foreach ($department as $item )
            <tr>
                <th>{{$loop->iteration}}</th>
                <th>{{$item->name}}</th>
                <th>{{$item->description}}</th>
                <th> <a href="{{route('department.show',$item->id)}}"> View</a> </th>
                <th> <a href="{{route('department.edit',$item->id)}}"> Edit</a> </th>
                <th> <a href="{{route('department.destroy',$item->id)}}"> Remove</a> </th>

                {{-- <th>{{$item->department->name}}</th> --}}
            </tr>
                    @endforeach

        </table>
        {{$department->links('pagination::bootstrap-5')}}
    </div>
    </div>
</div>

@endsection
