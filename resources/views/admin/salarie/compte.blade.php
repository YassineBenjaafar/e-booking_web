@extends('layouts.app')
@section('content')
<div class="container">
    <hr> <H2 class="text-muted" align="center">Compte</H2><hr> 
    <br><br>
    <form action="{{ route('admin.clients.update',$client->id) }}" method="POST" enctype="multipart/form-data"  onSubmit="return confirm('Are you sure you wish to update ?');">
        @csrf
        @method('PUT')
      <table class="table table-striped">
            <thead>
                <tr>
                    <th width="10%">Id</th>
                    <th width="20%">name</th>
                    <th width="25%">email</th>
                    <th width="20%">Created at</th>
                    <th width="20%">Updated at</th>
                    <th width="15%"></th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>{{ $client->id}}</td>
                    <td><input type="text" value="{{ $client->name}}" name="name" class="form-control"></td>
                    <td><input type="email" value="{{ $client->email}}" name="email" class="form-control"></td>
                    <td>{{ $client->created_at}}</td>
                    <td>{{ $client->updated_at}}</td>
                    <td><button type="submit" id="submit" class="btn btn-primary"><i class="fa fa-save"> save</i></button></td>
                </tr>
            </tbody>
        </table>
    </form>
    <a href="/admin/salaries" class="btn btn-secondary" style="float:left" ><i class="fas fa-arrow-left topicons"></i>Back</a>
</div>
@endsection