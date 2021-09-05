@extends('layouts.admin_layout')
@section('content')
<div class="container">
    <hr> <H2 class="text-muted" align="center">Visualization entity <b>{{ $entity->label  }}</b></H2><hr> 
    <br><br>
@csrf                            
    <table class="table table-striped">
    <thead>
        <tr>
            <th>ID</th>
            <th>Label</th>
            <th>Center</th>
            <th>Created at</th>
            <th>Updated at</th>
            <th>Description</th>
            <th>Details</th>
            <th>Price</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>{{ $entity->id}}</td>
            <td>{{ $entity->label}}</td>
            <td>{{ $entity->center->label}}</td>
            <td>{{ $entity->created_at}}</td>
            <td>{{ $entity->updated_at}}</td>
            <td>{{ $entity->description}}</td>
            <td>{{ $entity->details}}</td>
            <td>{{ $entity->price}} MAD</td>
        </tr>
    </tbody>
    </table>
       <a href="{{ route('admin.entities.index')}}" class="btn btn-secondary" style="float:left" ><i class="fa fa-arrow-left topicons"></i>Back</a>
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

 


