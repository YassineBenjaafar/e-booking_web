@extends('layouts.app')
@section('content')
<div class="container">
<table class="table table-striped" id="maisonTable">
    <thead>
      <tr>
        <th width="5%"></th>
        <th width="10%">Libelle</th>
        <th width="20%">Description</th>
        <th width="5%">Piéces</th>
        <th width="10%">Prix par Nuit</th>
        <th width="20%"><a class="btn btn-success" href="{{ route('admin.maisons.create') }}" ><i class="fas fa-plus"> Nouvelle Maison</i></a></th>
        <th width="30%"><input type="text" class="form-control" id="searchInput" onkeyup="SearchTable('maisonTable','searchInput','1')" placeholder="Search maison ..." title="Saisi le nom d'une maison"></th>
      </tr>
    </thead>
    <tbody>
    @foreach ($maisons as $maison)
      <tr>
        <td><a class="btn btn-link" href="{{ route('admin.maisons.show',$maison->id) }}"><i class="fas fa-eye"></i></a></td>
        <td>{{ $maison->libelle }}</td>
        <td>{{ $maison->description }}</td>
        <td>{{ $maison->nombre_chambre }}</td>
        <td>{{ $maison->prix_par_nuit }} MAD</td>
        <td></td>
        <td>
          <a class="btn btn-success" href="{{ route('admin.agendas.edit',$maison) }}" style="float:right"><i class="fas fa-calendar-alt" style='font-size:18px;'></i></a>
          <form action="{{ route('admin.maisons.destroy',$maison->id) }}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit" onclick="return confirm('Are you sure you want to delete maison : {{ $maison->libelle }} ?')"  class="btn btn-danger" style="float:right;margin-right:5px;margin-left:5px;" ><i class="fa fa-trash" style='font-size:18px;'></i></button> 
          </form>
          <a class="btn btn-primary" href="{{ route('admin.maisons.edit',$maison->id) }}" style="float:right" ><i class="fa fa-edit" style='font-size:18px;'></i></a>
        </td>
      </tr>
    @endforeach
    </tbody>
  </table>
  </div>


  @endsection