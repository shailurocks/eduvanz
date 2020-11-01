@extends('layouts.master')
@section('content')
<div class="container">
    <a href="add_participant" class="btn btn-success"  style="margin: 20px 0;">Add Participant</a>
    @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif
    <table  class="table  table-bordered">
        <tr>
            <th>Id</th>
            <th>Name</th>
            <th>Age</th>
            <th>DOB</th>
            <th>Profession</th>
            <th>Locality</th>
            <th>No Of Guest</th>
            <th>Address</th>
            <th>Action</th>
        </tr>
        @foreach ($users as $user)
            <tr>
                <td>{{ $user->id }}</td>
                <td>{{ $user->name }}</td>
                <td>{{ $user->age }}</td>
                <td>{{ $user->DOB }}</td>
                <td>{{ $user->profession }}</td>
                <td>{{ $user->locality }}</td>
                <td>{{ $user->no_of_guest }}</td>
                <td>{{ $user->address }}</td>
                <td><a href="edit_participant/{{$user->id}}" class='glyphicon glyphicon-pencil' aria-hidden='true'></a></td>
            </tr>
        @endforeach
    </table>    
    {{$users->links()}}
</div>
@stop