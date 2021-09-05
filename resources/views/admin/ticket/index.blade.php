@extends('layouts.app')

@section('content')
<div class="container">

<table class="table table-striped">
    <thead>
      <tr>
        <th></th>
        <th width="10%">Ticket ID</th>
        <th width="20%">Client</th>
        <th width="15%">Matricule</th>
        <th width="25%">Sujet</th>
        <th width="10%">Date de création</th>
        <th width="20%"></th>
      </tr>
    </thead>
    <tbody>
    @foreach ($tickets as $ticket)
      <tr>
        @if ($ticket->read_at != null)
        <td><a class="btn btn-link"  href="{{ route('admin.tickets.show',$ticket->id) }}"><i class="fas fa-eye"></i></a></td>
        @else 
        <td><a class="btn btn-link"  href="{{ route('admin.tickets.show',$ticket->id) }}"><i class="fas fa-eye-slash"></i></a></td>
        @endif
        <td>{{ $ticket->id }}</td>
        <td>{{ $ticket->client->name}}</td>
        <td>{{ $ticket->client->salarie->matricule}}</td>
        <td>{{ $ticket->sujet}}</td>
        <td>{{ $ticket->created_at}}</td>
        <td>
          <form action="{{ route('admin.tickets.destroy',$ticket->id) }}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit" onclick="return confirm('Are you sure you want to delete this ticket ?')"  class="btn btn-danger" style="float:right;margin-right:5px;margin-left:5px;" ><i class="fa fa-trash" style='font-size:18px;'></i></button> 
          </form>
        <a class="btn btn-success" href="{{ route('admin.tickets.edit', $ticket)}}" style="float:right" ><i class="fas fa-reply" style='font-size:18px;'></i></a>
        </td>
      </tr>
    @endforeach
    </tbody>
  </table>
  </div>
@endsection

