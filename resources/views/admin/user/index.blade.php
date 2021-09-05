@extends('layouts.admin_layout')
@section('content')

<div class="container">
<table class="table table-striped" id="userTable">
    <thead>
      <tr>
        <th></th>
        <th>Full Name</th>
        <th>Email</th>
        <th></th>
        <th><input type="text" class="form-control" id="searchInput" onkeyup="SearchTable('userTable','searchInput','1')" placeholder="Search user ..." title="Saisi le nom d'un user"></th>
      </tr>
    </thead>
    <tbody>
        @foreach ($users as $user)
        <tr>
          <td><a class="btn btn-link" href="{{ route('admin.users.show',$user->id) }}"><i class="fa fa-eye"></i></a></td>
            <td>{{ $user->fullName }}</td>
            <td>{{ $user->email }}</td>
            <td>
              <td>
                <form action="{{ route('admin.users.destroy',$user->id) }}" method="POST">
                  @csrf
                  @method('DELETE')
                  <button type="submit" onclick="return confirm('Are you sure you want to delete user : {{ $user->name }} ?')"  class="btn btn-danger" style="float:right;margin-right:5px;margin-left:5px;" ><i class="fa fa-trash" style='font-size:18px;'></i></button> 
                </form>
                <a class="btn btn-primary" href="{{ route('admin.users.edit',$user->id) }}" style="float:right" ><i class="fa fa-edit" style='font-size:18px;'></i></a>
              </td>
            </td>
        </tr>
        @endforeach
    </tbody>
  </table>
  </div>
  @endsection



