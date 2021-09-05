@extends('layouts.admin_layout')
@section('content')
<div class="container">
<table class="table table-striped" id="entityTable">
    <thead>
      <tr>
        <th></th>
        <th>Label</th>
        <th>Description</th>
        <th>Details</th>
        <th>Price</th>
        <th><input type="text" class="form-control" id="searchInput" onkeyup="SearchTable('entityTable','searchInput','1')" placeholder="Search entity ..." title="Enter an entity name ..."></th>
      </tr>
    </thead>
    <tbody>
    @foreach ($entities as $entity)
      <tr>
        <td><a class="btn btn-link" href="{{ route('admin.entities.show',$entity->id) }}"><i class="fa fa-eye"></i></a></td>
        <td>{{ $entity->label }}</td>
        <td>{{ $entity->description }}</td>
        <td>{{ $entity->details }}</td>
        <td>{{ $entity->price }} MAD</td>
        <td>
          <div class="btn-group float-right">
             @if ($loop->iteration === 1 )
                <a class="btn btn-success mr-2" href="{{ route('admin.entities.create') }}" ><i class="fa fa-plus fa-lg"></i></a>
            @endif
            <form action="{{ route('admin.entities.destroy',$entity->id) }}" method="POST">
              @csrf
              @method('DELETE')
              <button type="submit" onclick="return confirm('Are you sure you want to delete entity : {{ $entity->libelle }} ?')"  class="btn btn-danger mr-2" >
                <i class="fa fa-trash"> </i>
              </button> 
            </form>
            <a class="btn btn-primary mr-2" href="{{ route('admin.entities.edit',$entity->id) }}"  ><i class="fa fa-edit"></i></a>
            <a class="btn btn-success" href="{{ route('admin.agendas.edit',$entity) }}"><i class="fa fa-calendar" ></i></a>
          </div>
        </td>
      </tr>
    @endforeach
    </tbody>
  </table>
  </div>


  @endsection