@extends('layouts.app')
@section('content')
<div class="container">
    <hr> <H2 class="text-muted" align="center">Modification</H2><hr> 
<br><br>
<form action="{{ route('admin.salaries.update',$salarie->id) }}" method="POST" enctype="multipart/form-data"  onSubmit="return confirm('Are you sure you wish to update ?');">
    @csrf
    @method('PUT')                           
    <table class="table table-striped">
    <thead>
        <tr>
            <th width="12%">Nom</th>
            <th width="12%">Prenom</th>
            <th width="15%">Matricule</th>
            <th width="15%">grade</th>
            <th width="15%">Situation</th>
            <th width="5%">Enfant</th>
            <th width="16%">Date Prise Fonction</th>
            <th width="5%">User ID</th>  
            <th width="5%"></th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td><input type="text" name="nom" class="form-control" value="{{ $salarie->nom}}" title="last update: {{ $salarie->updated_at}}"></td>
            @error('nom')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <td><input type="text" name="prenom" class="form-control" value="{{ $salarie->prenom}}" title="created at: {{ $salarie->created_at}}"></td>
            @error('prenom')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <td><input type="text" name="matricule" class="form-control" value="{{ $salarie->matricule}}"></td>
            @error('matricule')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <td>
                <select name="grade" class="form-control">
                    @if ($salarie->grade  == 'agent')
                    <option value="agent" selected>Agent</option>
                    @else 
                    <option value="agent">Agent</option>
                    @endif
                    @if ($salarie->grade == 'directeur')
                    <option value="directeur" selected>Directeur</option>
                    @else 
                    <option value="directeur">Directeur</option>
                    @endif
                    @if($salarie->grade == 'cadre')
                    <option value="cadre" selected>Cadre</option>
                    @else
                    <option value="cadre">Cadre</option>
                    @endif
                </select>
            </td>
            @error('grade')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <td>
                <select name="situation_famillial" class="form-control">
                    @if ($salarie->situation_famillial  == 'celibataire') 
                    <option value="celibataire" selected>Célibataire</option>
                    @else 
                    <option value="celibataire">Célibataire</option>
                    @endif
                    @if ($salarie->situation_famillial == 'marie(e)')
                    <option value="marie(e)" selected>Marié</option>
                    @else 
                    <option value="marie(e)">Marié</option>
                    @endif
                    @if($salarie->situation_famillial == 'marie(e) avec enfants')
                    <option value="marie(e) avec enfants" selected>Marié avec enfants</option>
                    @else
                    <option value="marie(e) avec enfants">Marié avec enfants</option>
                    @endif
                </select>
            </td>
            @error('situation_famillial')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <td><input type="text" name="nombre_enfant" class="form-control" value="{{ $salarie->nombre_enfant}}"/></td>
            @error('nombre_enfant')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <td><input type="text" class="form-control" name="date_prise_fonction" value="{{ $salarie->date_prise_fonction}}" readonly></td>
            @if ($salarie->client)
            <td>{{$salarie->client->id}}</td>
            @else
            <td><a class="btn btn-link"><i class="fas fa-user-slash"></i></a></td>
            @endif
            <td></td>
            <td><button type="submit" id="submit" class="btn btn-primary"><i class="fa fa-save"> save</i></button></td>      
        </tr>
    </tbody>
    </table>
</form>
    <a href="{{ route('admin.salaries.index') }}" class="btn btn-secondary" style="float:left" ><i class="fas fa-arrow-left topicons"></i>Back</a>
    <br><br>
    <hr>
</div>
@endsection  

 
