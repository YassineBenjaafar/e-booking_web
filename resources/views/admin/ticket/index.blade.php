@extends('layouts.admin_layout')

@section('content')
    <div class="container">

        <table class="table table-striped">
            <thead>
                <tr>
                    <th></th>
                    <th>ID</th>
                    <th>Client</th>
                    <th>Code</th>
                    <th>Subject</th>
                    <th>Created_at</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($tickets as $ticket)
                    <tr>
                        @if ($ticket->read_at != null)
                            <td><a class="btn btn-link" href="{{ route('admin.tickets.show', $ticket->id) }}"><i
                                        class="fa fa-eye"></i></a></td>
                        @else
                            <td><a class="btn btn-link" href="{{ route('admin.tickets.show', $ticket->id) }}"><i
                                        class="fa fa-eye-slash"></i></a></td>
                        @endif
                        <td>{{ $ticket->id }}</td>
                        <td>{{ $ticket->client->fullName }}</td>
                        <td>{{ $ticket->client->employee->ecode }}</td>
                        <td>{{ $ticket->subject }}</td>
                        <td>{{ $ticket->created_at }}</td>
                        <td>
                            <div class="btn-group">
                                <a class="btn btn-success mr-3" href="{{ route('admin.tickets.edit', $ticket) }}">
                                    <i class="fa fa-reply"></i></a>
                                <form action="{{ route('admin.tickets.destroy', $ticket->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                    onclick="return confirm('Are you sure you want to delete this ticket ?')"
                                    class="btn btn-danger"><i
                                        class="fa fa-trash"></i></button>
                                </form> 
                            </div>
                        </td>   
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
