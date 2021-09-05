@extends('layouts.admin_layout')
@section('content')
    <div class="container">
        <hr>
        <H2 class="text-muted" align="center">Visualization employee <b>{{ $employee->first_name . " " . $employee->last_name}}</b></H2>
        <hr>
        <br><br>
        @csrf
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Last Name</th>
                    <th>First Name</th>
                    <th>Code</th>
                    <th>Rank</th>
                    <th>Situation</th>
                    <th>N° Of Children</th>
                    <th>Starting Date</th>
                    <th>User ID</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td title="last update: {{ $employee->updated_at }}">{{ $employee->last_name }}</td>
                    <td title="created at: {{ $employee->created_at }}">{{ $employee->first_name }}</td>
                    <td>{{ $employee->rank }}</td>
                    <td>{{ $employee->ecode }}</td>
                    <td>{{ $employee->family_situation }}</td>
                    <td>{{ $employee->number_of_children }}</td>
                    <td>{{ $employee->starting_date_in_office }}</td>
                    @if ($employee->client)
                        <td>{{ $employee->client->id }}</td>
                    @else
                        <td><a class="btn btn-link"><i class="fa fa-user-slash"></i></a></td>
                    @endif
                </tr>
            </tbody>
        </table>
        <a href="{{ route('admin.employees.index') }}" class="btn btn-secondary" style="float:left"><i
                class="fa fa-arrow-left topicons"></i>Back</a>
        <br><br>
        <hr>
    </div>
@endsection
