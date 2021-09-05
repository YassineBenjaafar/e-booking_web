@extends('layouts.app')
@section('content')
<div class="container">
<hr> <H2 class="text-muted" align="center">Modification</H2><hr> 
<br><br>
    <form action="{{ route('admin.roles.update',$role->id) }}" method="POST" enctype="multipart/form-data"  onSubmit="return confirm('Are you sure you wish to update ?');">
        @csrf
        @method('PUT')
      <table class="table table-striped">
        <thead>
            <tr>
                <th width="10%">Id centre</th>
                <th width="20%">Role name</th>
                <th width="30%">Description</th>
                <th width="15%">Created at</th>
                <th width="15%">Updated at</th>
                <th width="10%"></th>
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