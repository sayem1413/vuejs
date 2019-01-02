@extends('admin.master')

@section('title')
Manage Manufacturers
@endsection

@section('content')

<hr/>
<h4 class="text-center text-success">{{Session::get('message')}}</h4>
<hr/>
<table class="table table-hover table-bordered">
    <thead>
        <tr>
            <th>ID</th>
            <th>Category Name</th>
            <th>Category Description</th>
            <th>Publication Status</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach($manufacturers as $manufacturer)
        <tr>
            <td scope="row">{{$manufacturer->id}}</td>
            <td>{{$manufacturer->manufacturerName}}</td>
            <td>{{$manufacturer->manufacturerDescription}}</td>
            <td>{{$manufacturer->publicationStatus == 1 ? 'Published':'Unpublished' }}</td>
            <td>
                <a href="{{url('/manufacturer/edit/'.$manufacturer->id)}}" class="btn btn-success">
                    <span class="glyphicon glyphicon-edit"></span>
                </a>
                <a href="{{url('/manufacturer/delete/'.$manufacturer->id)}}" class="btn btn-danger" onclick="return confirm('Are you sure to delete this?')">
                    <span class="glyphicon glyphicon-trash"></span>
                </a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>


@endsection