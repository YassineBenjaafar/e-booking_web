@extends('layouts.app')

@section('content')
<div class="container">
<hr> <H2 class="text-muted" align="center">Ajouter un nouveau centre</H2><hr> 
<br><br>
<form  id="form" method="POST" action="{{ route('admin.centres.store') }}" enctype="multipart/form-data">
@csrf
    <div class="input-group mb-3">
        <div class="input-group-prepend">
          <span class="input-group-text" id="inputGroup-sizing-default" style="width:150px">Libellé</span>
        </div>
        <input type="text" name="libelle" class="@error('libelle') is-invalid @enderror form-control" id="libelle" aria-describedby="inputGroup-sizing-default">
            
    </div>
    @error('libelle')
              <div class="alert alert-danger">{{ $message }}</div>
            @enderror
    <div class="input-group mb-3">
        <div class="input-group-prepend">
          <span class="input-group-text" id="inputGroup-sizing-default" style="width:150px">Description</span>
        </div>
        <textarea type="text" name="description" class="@error('description') is-invalid @enderror form-control" id="description" aria-describedby="inputGroup-sizing-default" ></textarea>
        
    </div>
    @error('description')
          <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    <div class="input-group mb-3">
        <div class="input-group-prepend">
          <span class="input-group-text" id="inputGroup-sizing-default" style="width:150px">Photos</span>
        </div>
        <input  accept=".gif,.jpg,.png,.jpeg" type="File" name="mediaDirectory[]" class="@error('mediaDirectory') is-invalid @enderror form-control" id="mediaDirectory">
    </div>
    <button id="submit" type="submit" class="btn btn-primary" style="float:right"><i class="fas fa-save"> save</i></button>
    <a href="{{ route('admin.centres.index')}}" class="btn btn-secondary" style="float:left" ><i class="fas fa-arrow-left topicons"></i>Back</a>
    <br><br>
    <br><br><hr />
    <b>Live Preview</b>
    <hr>
    <br><br><div id="dvPreview"></div>



  
</form>

@endsection





