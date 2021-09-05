@extends('layouts.app')
@section('content')
<div class="container">
<table class="table table-striped" id="roleTable">
    <thead>
      <tr>
        <th width="5%"></th>
        <th width="15">Role name</th>
        <th width="30">Description</th>
        <th width="20%"><a class="btn btn-success" href="{{ route('admin.roles.create') }}" ><i class="fas fa-plus"> Nouveau Role</i></a></th>
        <th width="30%"><input type="text" class="form-control" id="searchInput" onkeyup="SearchTable('roleTable','searchInput','1')" placeholder="Search role ..." title="Saisi le nom d'un role"></th>
      </tr>
    </thead>
    <tbody>
    @foreach ($roles as $role)
      <tr>
        <td><a class="btn btn-link" href="{{ route('admin.roles.show',$role->id) }}"><i class="fas fa-eye"></i></a></td>
        <td>{{ $role->name }}</td>
        <td>{{ $role->description }}</td>
        <td>
        </td>
        <td>
          <form action="{{ route('admin.roles.destroy',$role->id) }}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit" onclick="return confirm('Are you sure you want to delete role : {{ $role->libelle }} ?')"  class="btn btn-danger" style="float:right;margin-right:5px;margin-left:5px;" ><i class="fa fa-trash" style='font-size:18px;'></i></button> 
          </form>
          <a class="btn btn-primary" href="{{ route('admin.roles.edit',$role->id) }}" style="float:right" ><i class="fa fa-edit" style='font-size:18px;'></i></a>
        </td>
      </tr>
    @endforeach
    </tbody>
  </table>
  </div>

  @endsection