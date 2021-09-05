@extends('layouts.app')
@section('content')


<style>
a{
display: inline-block;}
.switch {
  position: relative;
  display: inline-block;
  width: 60px;
  height: 34px;
}

.switch input { 
  opacity: 0;
  width: 0;
  height: 0;
}

.slider {
  position: absolute;
  cursor: pointer;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  background-color: #ccc;
  -webkit-transition: .4s;
  transition: .4s;
}

.slider:before {
  position: absolute;
  content: "";
  height: 26px;
  width: 26px;
  left: 4px;
  bottom: 4px;
  background-color: white;
  -webkit-transition: .4s;
  transition: .4s;
}

input:checked + .slider {
  background-color: #2196F3;
}

input:focus + .slider {
  box-shadow: 0 0 1px #2196F3;
}

input:checked + .slider:before {
  -webkit-transform: translateX(26px);
  -ms-transform: translateX(26px);
  transform: translateX(26px);
}
</style>
<div class="container">
<table class="table table-striped" id="reservationTable">
    <thead>
      <tr>
        <th width="5%">ID</th>
        <th width="10%">Salarié</th>
        <th width="10%">Matricule</th>
        <th width="10%">Maison</th>
        <th width="10%">Date debut</th>
        <th width="10%">Date fin</th>
        <th width="5%">Etat</th>
        <th width="20%"><input type="text" class="form-control" id="searchInput" onkeyup="SearchTable('reservationTable','searchInput','6')" placeholder="Search reservation ..." title="Saisi le nom d'une maison"></th>
        <th width="20%"> <a class="btn btn-primary"  href="{{ route('admin.reservations.affecter') }}" ><i class="fas fa-tasks" style="font-size:20px;margin-right:10px;"></i>Executer la selection</a></th>
      </tr>
    </thead>
    <tbody>
    @foreach ($reservations as $reservation)
        <tr>
            <td>{{ $reservation->id }}</td>
            <td>{{ $reservation->salarie->nom}} {{$reservation->salarie->prenom}}</td>
            <td>{{ $reservation->salarie->matricule}}</td>
            <td>{{ $reservation->maison->libelle }}</td>
            <td>{{ $reservation->date_debut }}</td>
            <td>{{ $reservation->date_fin }}</td>
            <td>{{ $reservation->etat->name }}</td>
            <td></td> 
            <td></td>
        </tr>
    @endforeach
    </tbody>
  </table>
  </div>
  @endsection