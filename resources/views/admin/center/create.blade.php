@extends('layouts.admin_layout')

@section('content')
<div class="container">
<hr> <H2 class="text-muted" align="center">Create a new center</H2><hr> 
<br><br>
<form  id="form" method="POST" action="{{ route('admin.centers.store') }}" enctype="multipart/form-data">
@csrf
    <div class="input-group mb-3">
        <div class="input-group-prepend">
          <span class="input-group-text" id="inputGroup-sizing-default" style="width:150px">Label</span>
        </div>
        <input type="text" name="label" class="@error('label') is-invalid @enderror form-control" id="label" aria-describedby="inputGroup-sizing-default">
            
    </div>
    @error('label')
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
    <div class="form-group">
            <input type="File" name="mediaDirectory[]"
                class="@error('mediaDirectory') is-invalid @enderror form-control-file" id="mediaDirectory" multiple
                title="uploading new photos will delete the old !" accept=".gif,.jpg,.png,.jpeg">
    </div>
    <div class="btn-group">
      <a href="{{ route('admin.centers.index')}}" class="btn btn-secondary mr-3"><i class="fa fa-arrow-left topicons"></i>Back</a>
       <button id="submit" type="submit" class="btn btn-primary"><i class="fa fa-save"> save</i></button>
    </div>

    <br><br>
    <br><br><hr />
    <b>Live Preview</b>
    <hr>
    <br><br><div id="dvPreview"></div>
</form>

@endsection





