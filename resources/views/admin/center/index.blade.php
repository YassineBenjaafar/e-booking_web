@extends('layouts.admin_layout')
@section('content')
<div class="container">
<table class="table table-striped" id="centerTable">
    <thead>
      <tr>
        <th></th>
        <th>Label</th>
        <th>Description</th>
        <th><input type="text" class="form-control" id="searchInput" onkeyup="SearchTable('centerTable','searchInput','1')" placeholder="Search center ..."></th>
      </tr>
    </thead>
    <tbody>
    @foreach ($centers as $center)
      <tr>
        <td><a class="btn btn-link" href="{{ route('admin.centers.show',$center->id) }}"><i class="fa fa-eye"></i></a></td>
        <td>{{ $center->label }}</td>
        <td>{{ $center->description}}</td>
        <td>
          <div class="btn-group float-right">
             @if ($loop->iteration === 1)
              <a class="btn btn-success mr-2" href="{{ route('admin.centers.create') }}" ><i class="fa fa-plus fa-lg"></i></a>
          @endif
            <form action="{{ route('admin.centers.destroy',$center->id) }}" method="POST">
              @csrf
              @method('DELETE')
              <button type="submit" onclick="return confirm('Are you sure you want to delete center : {{ $center->label }} ?')"  class="btn btn-danger mr-2" >
                <i class="fa fa-trash"></i>
              </button> 
            </form>
            <a class="btn btn-primary mr-2" href="{{ route('admin.centers.edit',$center->id) }}"  ><i class="fa fa-edit"></i></a>
          </div>
        </td>
      </tr>
    @endforeach
    </tbody>
  </table>
  </div>




  @endsection