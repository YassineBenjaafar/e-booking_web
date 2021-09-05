@extends('layouts.app')
@section('content')
<div class="container">
  <hr> <H2 class="text-muted" align="center">Modification</H2><hr> 
  <br><br>
  <form action="{{ route('admin.maisons.update',$maison->id) }}" method="POST" enctype="multipart/form-data"  onSubmit="return confirm('Are you sure you wish to update ?');">
    @csrf
    @method('PUT')
  <table class="table table-striped">
    <thead>
        <tr>
            <th width="5%">Id maison</th>
            <th width="15%">Libellé</th>
            <th width="15%">centre</th>
            <th width="25%">Description</th>
            <th width="10%">Nombre Piéces</th>
            <th width="10%">Prix par Nuit</th>
            <th width="10%"></th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>{{ $maison->id}}</td>
            <td title="last update: {{ $maison->updated_at}}"><input type="text" value="{{ $maison->libelle}}" name="libelle" class="form-control"></td>
            <td  title="created at: {{ $maison->created_at}}">
              <select name="centre_id" class="form-control" >
                @foreach ($centres as $centre)
                @if ($maison->centre_id == $centre->id )
                  <option selected value="{{ $centre->id}}">{{ $centre->libelle }}</option>
                @else
                  <option  value="{{ $centre->id}}">{{ $centre->libelle }}</option>
                @endif
                @endforeach
            </select>   
            </td>
            @error('centre_id')
              <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <td><textarea name="description" class="form-control">{{ $maison->description}}</textarea></td>
            @error('description')
              <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <td><input type="text" value="{{ $maison->nombre_chambre}}" name="nombre_chambre" class="form-control"></td>
            @error('nombre_chambre')
              <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <td><input type="text" value="{{ $maison->prix_par_nuit}}" name="prix_par_nuit" class="form-control"></td>
            @error('prix_par_nuit')
              <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <td><button type="submit" id="submit" class="btn btn-primary"><i class="fa fa-save"> save</i></button></td>
        </tr>
    </tbody>
</table>
    <a href="{{ route('admin.maisons.index')}}" class="btn btn-secondary" style="float:left" ><i class="fas fa-arrow-left topicons"></i>Back</a>
    <br><br>
    <b>Ancien photos</b>
    <hr>
    <br><br>
    <div class="form-group">
    @foreach ($urls as $url)
    <div>
        <img src=" {{asset($url)}}" style="margin-bottom:30px" />
    </div>
    @endforeach
    </div>
      <div class="input-group mb-3" style="margin-left:10px">
        <div class="input-group-prepend">
          <span class="input-group-text" id="inputGroup-sizing-default" style="width:150px">Upload new photos</span>
        </div>
        <input type="File" name="mediaDirectory[]" class="@error('mediaDirectory') is-invalid @enderror form-control" id="mediaDirectory" multiple title="uploading new photos will delete the old !">
    </div>
  
  <b>New Uploaded photos</b>
  <hr />
  <br><br><div class="row" id="dvPreview"></div>
</div>
  </form>
</div>



@endsection


