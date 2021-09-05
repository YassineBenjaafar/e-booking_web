@extends('layouts.admin_layout')

@section('content')
<div class="container">
<hr> <H2 class="text-muted" align="center">Create a new Role</H2><hr> 
<br><br>
<form  id="form" method="POST" action="{{ route('admin.roles.store') }}">
@csrf
    <div class="input-group mb-3">
        <div class="input-group-prepend">
          <span class="input-group-text" id="inputGroup-sizing-default" style="width:150px">Role name</span>
        </div>
        <input type="text" name="name" class="@error('name') is-invalid @enderror form-control" id="name" aria-describedby="inputGroup-sizing-default">
        @error('name')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
    </div>
    <div class="input-group mb-3">
      <div class="input-group-prepend">
        <span class="input-group-text" id="inputGroup-sizing-default" style="width:150px">Description</span>
      </div>
      <input type="text" name="description" class="@error('description') is-invalid @enderror form-control" id="description" aria-describedby="inputGroup-sizing-default">
       @error('description')
                <div class="alert alert-danger">{{ $message }}</div>
          @enderror
    </div>
    <button id="submit" type="submit" class="btn btn-primary" style="float:right"><i class="fa fa-save"> save</i></button>
    <br><br>
    <hr>

</form>

@endsection

