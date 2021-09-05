@extends('layouts.admin_layout')

@section('content')
<div class="container">
<hr> <H2 class="text-muted" align="center">Create a new entity</H2><hr> 
<br><br>
<form  id="form" method="POST" action="{{ route('admin.entities.store') }}" enctype="multipart/form-data">
@csrf
    <div class="input-group mb-3">
        <div class="input-group-prepend">
          <span class="input-group-text" id="inputGroup-sizing-default" style="width:120px">Centers</span>
        </div>
        <select name="center" id="center" class="@error('center') is-invalid @enderror form-control" aria-describedby="inputGroup-sizing-default">
            @foreach ($centers as $center)
            <option value="{{ $center->id}}">{{ $center->label }}</option>
            @endforeach
        </select>
      </div>
    @error('center')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror
    <div class="input-group mb-3">
        <div class="input-group-prepend">
          <span class="input-group-text" id="inputGroup-sizing-default" style="width:120px">Label</span>
        </div>
        <input type="text" name="label" class="@error('label') is-invalid @enderror form-control" id="label" aria-describedby="inputGroup-sizing-default">
    </div>
    @error('label')
    <div class="alert alert-danger">{{ $message }}</div>
@enderror
    <div class="input-group mb-3">
        <div class="input-group-prepend">
          <span class="input-group-text" id="inputGroup-sizing-default" style="width:120px">Description</span>
        </div>
        <textarea type="text" name="description" class="@error('description') is-invalid @enderror form-control" id="description" aria-describedby="inputGroup-sizing-default" aria-multiline="true" maxlength ="256"></textarea>
    </div>
    @error('description')
    <div class="alert alert-danger">{{ $message }}</div>
@enderror
    <div class="input-group mb-3">
        <div class="input-group-prepend">
          <span class="input-group-text" id="inputGroup-sizing-default" style="width:120px">Details</span>
        </div>
        <input type="text" name="details" class="@error('details') is-invalid @enderror form-control" id="details" aria-describedby="inputGroup-sizing-default" aria-multiline="true">
    </div>
    @error('details')
    <div class="alert alert-danger">{{ $message }}</div>
@enderror
    <div class="input-group mb-3">
        <div class="input-group-prepend">
          <span class="input-group-text" id="inputGroup-sizing-default" style="width:120px">Price</span>
        </div>
        <input type="number"  name="price" class="@error('price') is-invalid @enderror form-control" id="details" aria-describedby="inputGroup-sizing-default" aria-multiline="true">
    </div>
    @error('price')
    <div class="alert alert-danger">{{ $message }}</div>
@enderror
      <div class="form-group">
            <input type="File" name="mediaDirectory[]"
                class="@error('mediaDirectory') is-invalid @enderror form-control-file" id="mediaDirectory" multiple
                title="uploading new photos will delete the old !" accept=".gif,.jpg,.png,.jpeg">
    </div>
    <br>
    <div class="btn-group">
<button id="submit" type="submit" class="btn btn-primary mr-3"><i class="fa fa-save"> save</i></button>
  <a href="{{ route('admin.entities.index')}}" class="btn btn-secondary"><i class="fa fa-arrow-left topicons"></i>Back</a>
    </div>
  

  <br><br><hr />
    <b>Live Preview</b>
    <br><br><div id="dvPreview"></div>

  
</form>
@endsection





