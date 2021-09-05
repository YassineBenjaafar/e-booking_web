@extends('layouts.app')
@section('content')
<div class="container">
    <hr> <H2 class="text-muted" align="center">Visualisation</H2><hr> 
    <br><br>
@csrf                            
    <table class="table table-striped">
    <thead>
        <tr>
            <th width="15%">Nom</th>
            <th width="15%">Prenom</th>
            <th width="15%">Matricule</th>
            <th width="15%">grade</th>
            <th width="15%">Situation</th>
            <th width="5%">Enfant</th>
            <th width="10%">Date Prise Fonction</th>
            <th width="5%">User ID</th>  
            <th width="5%"></th>
        </tr>
    </thead>
    <tbody>
        <tr>
        <td title="last update: {{ $salarie->updated_at}}">{{ $salarie->nom}}</td>
            <td title="created at: {{ $salarie->created_at}}">{{ $salarie->prenom}}</td>
            <td>{{ $salarie->grade}}</td>
            <td>{{ $salarie->matricule}}</td>
            <td>{{ $salarie->situation_famillial}}</td>
            <td>{{ $salarie->nombre_enfant}}</td>
            <td>{{ $salarie->date_prise_fonction}}</td>
            @if ($salarie->client)
            <td>{{$salarie->client->id}}</td>
            @else
            <td><a class="btn btn-link"><i class="fas fa-user-slash"></i></a></td>
            @endif
        </tr>
    </tbody>
    </table>
    <a href="{{ route('admin.salaries.index') }}" class="btn btn-secondary" style="float:left" ><i class="fas fa-arrow-left topicons"></i>Back</a>
    <br><br>
    <hr>
</div>
@endsection  

 


