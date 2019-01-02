@extends('admin.master')

@section('title')
Manage User
@endsection

@section('content')

<hr/>
<h4 class="text-center text-success">{{Session::get('message')}}</h4>
<hr/>
<table class="table table-hover table-bordered">
    <thead>
        <tr>
            <th>ID</th>
            <th>User Name</th>
            <th>User Email</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        <?php $i = 1; ?>
        @foreach($users as $user)
        <tr>
            <td>{{$i++}}</td>
            <td>{{$user->name}}</td>
            <td>{{$user->email}}</td>
            <td>
                <a href="{{url('/user/edit/'.$user->id)}}" class="btn btn-success">
                    <span class="glyphicon glyphicon-edit"></span>
                </a>
                <a href="{{url('/user/delete/'.$user->id)}}" class="btn btn-danger" onclick="return confirm('Are you sure to delete this?')">
                    <span class="glyphicon glyphicon-trash"></span>
                </a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
{{$users->links()}}

@endsection


