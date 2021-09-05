@extends('layouts.app')

@section('content')
<div class="container">

<table class="table table-striped">
    <thead>
      <tr>
      <th width="10%">Ticket ID</th>
        <th width="15%">Client</th>
        <th width="15%">Matricule</th>
        <th width="10%">Date de création</th>
        <th width="15%">Sujet</th>
        <th width="35%">message</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td  title="read at : {{$ticket->read_at}}">{{ $ticket->id }}</td>
        <td>{{ $ticket->client->name}}</td>
        <td>{{ $ticket->client->salarie->matricule}}</td>
        <td>{{ $ticket->created_at}}</td>
        <td>{{ $ticket->sujet}}</td>
        <td>{{ $ticket->message}}</td>
      </tr>
    </tbody>
  </table>
  <a href="{{ route('admin.tickets.index') }}" class="btn btn-secondary" style="float:left" ><i class="fas fa-arrow-left topicons"></i>Back</a>
  </div>
@endsection