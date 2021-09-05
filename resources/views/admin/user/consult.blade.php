@extends('layouts.app')
@section('content')
<div class="container">
    <hr> <H2 class="text-muted" align="center">Visualisation</H2><hr> 
    <br><br>
@csrf                            
    <table class="table table-striped">
    <thead>
        <tr>
            <th width="5%">ID</th>
            <th width="15%">Name</th>
            <th width="20%">Email</th>
            <th width="20%">Email verified at</th>
            <th width="20%">Created at</th>
            <th width="20%">Updated at</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>{{ $user->id}}</td>
            <td>{{ $user->name}}</td>
            <td>{{ $user->email}}</td>
            <td>{{ $user->email_verified_at}}</td>
            <td>{{ $user->created_at}}</td>
            <td>{{ $user->updated_at}}</td>
        </tr>
    </tbody>
    </table>
    <a href="{{ route('admin.users.index')}}" class="btn btn-secondary" style="float:left" ><i class="fas fa-arrow-left topicons"></i>Back</a>
</div>
@endsection  
