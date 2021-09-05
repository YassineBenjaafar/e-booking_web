@extends('layouts.admin_layout')

@section('content')
    <div class="container">

        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Client</th>
                    <th>Code</th>
                    <th>Created_at</th>
                    <th>Subject</th>
                    <th>Message</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td title="read at : {{ $ticket->read_at }}">{{ $ticket->id }}</td>
                    <td>{{ $ticket->client->fullName }}</td>
                    <td>{{ $ticket->client->employee->ecode }}</td>
                    <td>{{ $ticket->created_at }}</td>
                    <td>{{ $ticket->subject }}</td>
                    <td>{{ $ticket->message }}</td>
                </tr>
            </tbody>
        </table>
        <a href="{{ route('admin.tickets.index') }}" class="btn btn-secondary" style="float:left"><i
                class="fa fa-arrow-left topicons"></i>Back</a>
    </div>
@endsection
