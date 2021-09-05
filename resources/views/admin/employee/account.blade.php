@extends('layouts.admin_layout')
@section('content')
    <div class="container">
        <hr>
        <H2 class="text-muted" align="center">Account <b>{{ $client->fullName }}</b></H2>
        <hr>
        <br><br>
        <form action="{{ route('admin.clients.update', $client->id) }}" method="POST"
            onSubmit="return confirm('Are you sure you wish to update ?');">
            @csrf
            @method('PUT')
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Full Name</th>
                        <th>Email</th>
                        <th>Created at</th>
                        <th>Updated at</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>{{ $client->id }}</td>
                        <td><input type="text" value="{{ $client->fullName }}" name="fullName" id="fullName" class="form-control"></td>
                        <td><input type="email" value="{{ $client->email }}" name="email" id="email" class="form-control"></td>
                        <td>{{ $client->created_at }}</td>
                        <td>{{ $client->updated_at }}</td>
                        <td><button type="submit" id="submit" class="btn btn-primary"><i class="fa fa-save">  save</i></button></td>
                    </tr>
                </tbody>
            </table>
        </form>
        <a href="/admin/employees" class="btn btn-secondary" style="float:left"><i
                class="fa fa-arrow-left topicons"></i>Back</a>
    </div>
@endsection
