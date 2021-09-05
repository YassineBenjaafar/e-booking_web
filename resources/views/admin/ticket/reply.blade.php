@extends('layouts.app')
@section('content')
<div class="container">
<hr> <H2 class="text-muted" align="center">Ticket N° {{$ticket->id}}</H2><hr> 
    <br><br>
<form  id="form" method="POST" action="{{ route('admin.ticket.reply',$ticket)}}" enctype="multipart/form-data">
    @csrf
        <div class="input-group mb-3">
            <div class="input-group-prepend">
              <span class="input-group-text" id="inputGroup-sizing-default" style="width:150px">Sujet</span>
            </div>
            <input type="text" name="sujet" class="@error('sujet') is-invalid @enderror form-control" id="sujet" aria-describedby="inputGroup-sizing-default">
                
        </div>
        @error('libelle')
                  <div class="alert alert-danger">{{ $message }}</div>
                @enderror
        <div class="input-group mb-3">
            <div class="input-group-prepend">
              <span class="input-group-text" id="inputGroup-sizing-default" style="width:150px">Message</span>
            </div>
            <textarea type="text" name="message" class="@error('message') is-invalid @enderror form-control" id="description" aria-describedby="inputGroup-sizing-default" ></textarea>
            
        </div>
        @error('message')
              <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        <button id="submit" type="submit" class="btn btn-primary" style="float:right"><i class="fa fa-paper-plane topicons"></i>Envoyer</button>
        <a href="{{ route('admin.centres.index')}}" class="btn btn-secondary" style="float:left" ><i class="fas fa-arrow-left topicons"></i>Back</a>
@endsection