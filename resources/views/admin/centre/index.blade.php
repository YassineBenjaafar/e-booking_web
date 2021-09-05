@extends('layouts.app')
@section('content')
<div class="container">
<table class="table table-striped" id="centreTable">
    <thead>
      <tr>
        <th width="5%"></th>
        <th width="5">Libelle</th>
        <th width="20%"><a class="btn btn-success" href="{{ route('admin.centres.create') }}" ><i class="fas fa-plus"> Nouveau Centre</i></a></th>
        <th width="30%"><input type="text" class="form-control" id="searchInput" onkeyup="SearchTable('centreTable','searchInput','1')" placeholder="Search centre ..." title="Saisi le nom d'un centre"></th>
      </tr>
    </thead>
    <tbody>
    @foreach ($centres as $centre)
      <tr>
        <td><a class="btn btn-link" href="{{ route('admin.centres.show',$centre->id) }}"><i class="fas fa-eye"></i></a></td>
        <td>{{ $centre->libelle }}</td>
        <td>
        </td>
        <td>
          <form action="{{ route('admin.centres.destroy',$centre->id) }}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit" onclick="return confirm('Are you sure you want to delete centre : {{ $centre->libelle }} ?')"  class="btn btn-danger" style="float:right;margin-right:5px;margin-left:5px;" ><i class="fa fa-trash" style='font-size:18px;'></i></button> 
          </form>
          <a class="btn btn-primary" href="{{ route('admin.centres.edit',$centre->id) }}" style="float:right" ><i class="fa fa-edit" style='font-size:18px;'></i></a>
        </td>
      </tr>
    @endforeach
    </tbody>
  </table>
  </div>




  @endsection