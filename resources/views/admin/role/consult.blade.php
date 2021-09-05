@extends('layouts.app')
@section('content')
<div class="container">
    <hr> <H2 class="text-muted" align="center">Visualisation</H2><hr> 
    <br><br>
@csrf                            
    <table class="table table-striped">
    <thead>
        <tr>
            <th width="10%">ID</th>
            <th width="25%">Name</th>
            <th width="25%">description</th>
            <th width="20%">Created at</th>
            <th width="20%">Updated at</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>{{ $role->id}}</td>
            <td>{{ $role->name}}</td>
            <td>{{ $role->description}}</td>
            <td>{{ $role->created_at}}</td>
            <td>{{ $role->updated_at}}</td>
        </tr>
    </tbody>
    </table>
    <a href="/admin/roles" class="btn btn-secondary" style="float:left" >Back</a>
</div>
@endsection  

 