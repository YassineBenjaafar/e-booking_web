@extends('layouts.app')
@section('content')
<div class="container">
<table class="table table-striped" id="salarieTable">
    <thead>
      <tr>
        <th></th>
        <th>Nom</th>
        <th>Prénom</th>
        <th>Grade</th>
        <th>Matricule</th>
        <th></th>
        <th width="20%"><a class="btn btn-success" href="{{ route('admin.salaries.create') }}" ><i class="fas fa-plus"> Nouveau Salarié</i></a></th>
        <th width="30%"><input type="text" class="form-control" id="searchInput" onkeyup="SearchTable('salarieTable','searchInput','1')" placeholder="Search salarié ..." title="Saisi le nom d'une maison"></th>
      </tr>
    </thead>
    <tbody>
        @foreach ($salaries as $salarie)
        <tr>
          <td><a class="btn btn-link" href="{{ route('admin.salaries.show',$salarie->id) }}"><i class="fas fa-eye"></i></a></td>
            <td>{{ $salarie->nom }}</td>
            <td>{{ $salarie->prenom }}</td>
            <td>{{ $salarie->grade }}</td>
            <td>{{ $salarie->matricule }}</td>
            <td></td>
            <td>
              <td>
                <form action="{{ route('admin.salaries.destroy',$salarie->id) }}" method="POST">
                  @csrf
                  @method('DELETE')
                  <button type="submit" onclick="return confirm('Are you sure you want to delete salarié : {{ $salarie->nom . ' ' . $salarie->prenom }} ?')"  class="btn btn-danger" style="float:right;margin-right:5px;margin-left:5px;" ><i class="fa fa-trash" style='font-size:18px;'></i></button> 
                </form>
                <a class="btn btn-primary" href="{{ route('admin.salaries.edit',$salarie->id) }}" style="float:right" ><i class="fa fa-edit" style='font-size:18px;'></i></a>
              </td>
            </td>
            @if ($salarie->client)
            <td><a class="btn btn-primary" href="{{ route('admin.salaries.compte',$salarie->id) }}" ><i class="fas fa-user-edit"></i></a></td>
            @else
            <td><button class="btn btn-link" disabled href=""><i class="fas fa-user-edit"></i></button></td>
            @endif
        </tr>
        @endforeach
    </tbody>
  </table>
  </div>
  @endsection



