@extends('layouts.admin_layout')
@section('content')

<div class="container">
    <hr> <H2 class="text-muted" align="center">Visualisation user <b>{{ $user->fullName}}</b></H2><hr> 
    <br><br>
@csrf                            
    <table class="table table-striped">
    <thead>
        <tr>
            <th>ID</th>
            <th>Full Name</th>
            <th>Email</th>
            <th>Email verified at</th>
            <th>Created at</th>
            <th>Updated at</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>{{ $user->id}}</td>
            <td>{{ $user->fullName}}</td>
            <td>{{ $user->email}}</td>
            <td>{{ $user->email_verified_at}}</td>
            <td>{{ $user->created_at}}</td>
            <td>{{ $user->updated_at}}</td>
        </tr>
    </tbody>
    </table>
    <a href="{{ route('admin.users.index')}}" class="btn btn-secondary" style="float:left" ><i class="fa fa-arrow-left topicons"></i>Back</a>
</div>
@endsection  
