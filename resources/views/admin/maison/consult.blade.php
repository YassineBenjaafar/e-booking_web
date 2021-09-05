@extends('layouts.app')
@section('content')
<div class="container">
    <hr> <H2 class="text-muted" align="center">Visualisation</H2><hr> 
    <br><br>
@csrf                            
    <table class="table table-striped">
    <thead>
        <tr>
            <th width="10%">ID</th>
            <th width="10%">Libellé</th>
            <th width="10%">Id centre</th>
            <th width="15%">Created at</th>
            <th width="15%">Updated at</th>
            <th width="15%">Description</th>
            <th width="10%">Nombre Piéces</th>
            <th width="10%">Prix par Nuit</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>{{ $maison->id}}</td>
            <td>{{ $maison->libelle}}</td>
            <td>{{ $maison->centre_id}}</td>
            <td>{{ $maison->created_at}}</td>
            <td>{{ $maison->updated_at}}</td>
            <td>{{ $maison->description}}</td>
            <td>{{ $maison->nombre_chambre}}</td>
            <td>{{ $maison->prix_par_nuit}} MAD</td>
        </tr>
    </tbody>
    </table>
       <a href="{{ route('admin.maisons.index')}}" class="btn btn-secondary" style="float:left" ><i class="fas fa-arrow-left topicons"></i>Back</a>
    <br><br><br>
   
    <b>Live Preview</b>
    <hr />
    <br><br>
    <div class="form-group">
    @foreach ($urls as $url)
    <div>
        <img src=" {{asset($url)}}"/>
    </div>
    @endforeach
    </div>
</div>
@endsection  

 


