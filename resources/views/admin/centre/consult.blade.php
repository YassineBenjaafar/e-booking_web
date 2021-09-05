@extends('layouts.app')
@section('content')
<div class="container">
    <hr> <H2 class="text-muted" align="center">Visualisation</H2><hr> 
    <br><br>
@csrf                            
    <table class="table table-striped">
    <thead>
        <tr>
            <th width="10%">Id centre</th>
            <th width="30%">Libellé</th>
            <th width="70%">Description</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td title="last update: {{ $centre->updated_at}}">{{ $centre->id}}</td>
            <td title="created at: {{ $centre->created_at}}">{{ $centre->libelle}}</td>
            <td>{{ $centre->description}}</td>
        </tr>
    </tbody>
    </table>
    <a href="{{ route('admin.centres.index')}}" class="btn btn-secondary" style="float:left" ><i class="fas fa-arrow-left topicons"></i>Back</a>

    <br><br><br>
<b>Live Preview</b>
<hr />

<br><br>
<div class="form-group">
<div>
    <img src=" {{asset($centre->image_url)}}"/>
</div>
</div>
</div>

@endsection  

 


