@extends('layouts.app')
@section('content')
<div class="container">
    <hr> <H2 class="text-muted" align="center">Modification</H2><hr> 
    <br><br>
    <form action="{{ route('admin.centres.update',$centre->id) }}" method="POST" enctype="multipart/form-data"  onSubmit="return confirm('Are you sure you wish to update ?');">
        @csrf
        @method('PUT')
      <table class="table table-striped">
            <thead>
                <tr>
                    <th width="10%">Id centre</th>
                    <th width="20%">Libellé</th>
                    <th width="70%">Description</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>{{ $centre->id}}</td>
                    <td><input type="text" value="{{ $centre->libelle}}" name="libelle" class="form-control"></td>
                    @error('libelle')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    <td><textarea type="text" name="description"  class="@error('description') is-invalid @enderror form-control" id="description">{{ $centre->description}}"</textarea></td>
                    @error('description')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    <td><button type="submit" id="submit" class="btn btn-primary"><i class="fa fa-save"> save</i></button></td>
                </tr>
            </tbody>
        </table>
        <a href="{{ route('admin.centres.index')}}" class="btn btn-secondary" style="float:left" ><i class="fas fa-arrow-left topicons"></i>Back</a>
        
        <br><br>
        <b>Ancien photos</b>
        <hr>
        <br><br>
        <div class="form-group">
        <div>
            <img src=" {{asset($centre->image_url)}}"  style="margin-bottom: 30px"/>
        </div>
        </div>
        <div class="input-group mb-3" style="margin-top:10px">
            <div class="input-group-prepend">
              <span class="input-group-text" id="inputGroup-sizing-default" style="width:150px">Upload new photos</span>
            </div>
            <input type="File" name="mediaDirectory[]" class="@error('mediaDirectory') is-invalid @enderror form-control" id="mediaDirectory" multiple title="uploading new photos will delete the old !">
        </div>
      
      <b>New Uploaded image</b>
      <hr />
      <br><br><div class="row" id="dvPreview"></div>
    </div>
      </form>
    </div>
    
@endsection



