@extends('layouts.admin_layout')
@section('content')
    <div class="container">
        <table class="table table-striped" id="employeeTable">
            <thead>
                <tr>
                    <th></th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Rank</th>
                    <th>eCode</th>
                    <th><input type="text" class="form-control" id="searchInput"
                            onkeyup="SearchTable('employeeTable','searchInput','1')" placeholder="Search employee ..."
                            title="Enter an employee name ..."></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($employees as $employee)
                    <tr>
                        <td><a class="btn btn-link" href="{{ route('admin.employees.show', $employee->id) }}"><i
                                    class="fa fa-eye"></i></a></td>
                        <td>{{ $employee->last_name }}</td>
                        <td>{{ $employee->first_name }}</td>
                        <td>{{ $employee->rank }}</td>
                        <td>{{ $employee->ecode }}</td>
                        <td>
                            <div class="btn-group float-right">
                                @if ($loop->iteration === 1)
                                     <a class="btn btn-success mr-2" href="{{ route('admin.employees.create') }}">
                                    <i class="fa fa-plus fa-lg"></i>
                                </a>
                                @endif
                                <form action="{{ route('admin.employees.destroy', $employee->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                    onclick="return confirm('Are you sure you want to delete salarié : {{ $employee->last_name . ' ' . $employee->first_name }} ?')"
                                    class="btn btn-danger mr-2"><i
                                        class="fa fa-trash"></i></button>
                                </form>
                                <a class="btn btn-primary mr-2" href="{{ route('admin.employees.edit', $employee->id) }}">
                                    <i class="fa fa-edit"></i>
                                </a>
                                @if ($employee->client)
                                    <a class="btn btn-primary" href="{{ route('admin.employees.account', $employee->id) }}"><i
                                        class="fa fa-user"></i></a>
                                @else
                                    <button class="btn btn-link" disabled><i class="fa fa-user"></i></button>
                                 @endif
                            </div>   
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
