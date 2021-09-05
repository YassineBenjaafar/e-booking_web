@extends('layouts.admin_layout')
@section('content')
<div class="container">
  <hr> <H2 class="text-muted" align="center">Edit entity <b>{{ $entity->label }}</b></H2><hr> 
  <br><br>
  <form action="{{ route('admin.entities.update',$entity->id) }}" method="POST" enctype="multipart/form-data"  onSubmit="return confirm('Are you sure you wish to update ?');">
    @csrf
    @method('PUT')
  <table class="table table-striped">
    <thead>
        <tr>
            <th >ID</th>
            <th>Label</th>
            <th>Center</th>
            <th>Description</th>
            <th>Details</th>
            <th>Price</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>{{ $entity->id}}</td>
            <td title="last update: {{ $entity->updated_at}}"><input type="text" value="{{ $entity->label}}" name="label" class="form-control"></td>
            <td  title="created at: {{ $entity->created_at}}">
              <select name="center_id" class="form-control" >
                @foreach ($centers as $center)
                @if ($entity->center_id == $center->id )
                  <option selected value="{{ $center->id}}">{{ $center->label }}</option>
                @else
                  <option  value="{{ $center->id}}">{{ $center->label }}</option>
                @endif
                @endforeach
            </select>   
            </td>
            @error('center_id')
              <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <td><textarea name="description" class="form-control">{{ $entity->description}}</textarea></td>
            @error('description')
              <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <td><input type="text" value="{{ $entity->details}}" name="details" class="form-control"></td>
            @error('details')
              <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <td><input type="text" value="{{ $entity->price}}" name="price" class="form-control"></td>
            @error('price')
              <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <td><button type="submit" id="submit" class="btn btn-primary"><i class="fa fa-save"> save</i></button></td>
        </tr>
    </tbody>
</table>
    <a href="{{ route('admin.entities.index')}}" class="btn btn-secondary" style="float:left" ><i class="fa fa-arrow-left topicons"></i>Back</a>
    <br><br>
    <b>Old photos</b>
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


