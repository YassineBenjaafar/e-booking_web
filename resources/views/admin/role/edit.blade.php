@extends('layouts.admin_layout')
@section('content')
<div class="container">
<hr> <H2 class="text-muted" align="center">Edit role <b>{{ $role->name}}</b></H2><hr> 
<br><br>
    <form action="{{ route('admin.roles.update',$role->id) }}" method="POST" onSubmit="return confirm('Are you sure you wish to update ?');">
        @csrf
        @method('PUT')
      <table class="table table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Role name</th>
                <th>Description</th>
                <th>Created at</th>
                <th>Updated at</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>{{ $role->id}}</td>
                <td>{{ $role->name}}</td>
                <td><input type="text" value="{{ $role->description}}" name="description" class="form-control"></td>
                <td>{{ $role->created_at}}</td>
                <td>{{ $role->updated_at}}</td>
                <td><button type="submit" id="submit" class="btn btn-primary"><i class="fa fa-save"> save</i></button></td>
            </tr>
        </tbody>
    </table>
    </form>
    <a href="/admin/roles" class="btn btn-secondary" style="float:left" >Back</a>
</div>
@endsection