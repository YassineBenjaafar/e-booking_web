@extends('layouts.app')
@section('content')
<div class="container">
    <hr> <H2 class="text-muted" align="center">Modification</H2><hr> 
    <br><br>
    <form action="{{ route('admin.users.update',$user->id) }}" method="POST" enctype="multipart/form-data"  onSubmit="return confirm('Are you sure you wish to update ?');">
        @csrf
        @method('PUT')
      <table class="table table-striped">
        <thead>
            <tr>
                <th width="5%">ID</th>
                <th width="15%">Name</th>
                <th width="20%">Email</th>
                <th width="20%">Email verified at</th>
                <th width="15%">Created at</th>
                <th width="15%">Updated at</th>
                <th width="10%"></th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>{{ $user->id}}</td>
                <td><input type="text" value="{{ $user->name}}" name="name" class="form-control"></td>
                <td><input type="email" value="{{ $user->email}}" name="email" class="form-control"></td>
                <td>{{ $user->email_verified_at}}</td>
                <td>{{ $user->created_at}}</td>
                <td>{{ $user->updated_at}}</td>
                <td><button type="submit" id="submit" class="btn btn-primary"><i class="fa fa-save"> save</i></button></td>
            </tr>
        </tbody>
    </table>
    <br>
    
    <div class="form-group">
            <label><b>Roles</b></label>
            <hr>
            @foreach ($roles as $role)   
            <div class="col-auto my-1">
                <div class="custom-control custom-checkbox mr-sm-2">
                    <input type="checkbox" name="roles[]" value="{{$role->id}}" class="custom-control-input" id="{{$role->name}}" {{$user->hasRole($role->name)?'checked':''}}>
                    <label class="custom-control-label" style="color:#3490dc" for="{{$role->name}}"><b>{{$role->name}}</b></label>
                </div>
            </div>
            @endforeach
            <hr>
    </div>
    </form>
    <a href="{{ route('admin.users.index')}}" class="btn btn-secondary" style="float:left" ><i class="fas fa-arrow-left topicons"></i>Back</a>
</div>

@endsection