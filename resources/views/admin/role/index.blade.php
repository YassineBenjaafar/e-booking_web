@extends('layouts.admin_layout')
@section('content')
<div class="container">
<table class="table table-striped" id="roleTable">
    <thead>
      <tr>
        <th></th>
        <th>Role name</th>
        <th>Description</th>
        <th><input type="text" class="form-control" id="searchInput" onkeyup="SearchTable('roleTable','searchInput','1')" placeholder="Search role ..." title="Saisi le nom d'un role"></th>
      </tr>
    </thead>
    <tbody>
    @foreach ($roles as $role)
      <tr>
        <td><a class="btn btn-link" href="{{ route('admin.roles.show',$role->id) }}"><i class="fa fa-eye"></i></a></td>
        <td>{{ $role->name }}</td>
        <td>{{ $role->description }}</td>
        <td>
        </td>
        <td>
          <div class="btn-group float-right">
          @if ($loop->iteration === 1)
               <a class="btn btn-success mr-2" href="{{ route('admin.roles.create') }}" ><i class="fa fa-plus fa-lg"></i></a></th>
          @endif
          <form action="{{ route('admin.roles.destroy',$role->id) }}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit" onclick="return confirm('Are you sure you want to delete role : {{ $role->label }} ?')"  class="btn btn-danger mr-2">
              <i class="fa fa-trash"></i>
            </button> 
          </form>
          <a class="btn btn-primary" href="{{ route('admin.roles.edit',$role->id) }}"><i class="fa fa-edit"></i></a>
          </div>
        </td>
      </tr>
    @endforeach
    </tbody>
  </table>
  </div>

  @endsection