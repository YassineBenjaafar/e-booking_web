@extends('layouts.admin_layout')
@section('content')
    <div class="container">
        <hr>
        <H2 class="text-muted" align="center">Edit employee <b>{{ $employee->first_name . " " . $employee->last_name  }}</b> </H2>
        <hr>
        <br><br>
        <form action="{{ route('admin.employees.update', $employee->id) }}" method="POST" enctype="multipart/form-data"
            onSubmit="return confirm('Are you sure you wish to update ?');">
            @csrf
            @method('PUT')
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Last Name</th>
                        <th>First Name</th>
                        <th>Code</th>
                        <th>Rank</th>
                        <th>Situation</th>
                        <th>Children</th>
                        <th>Starting Date</th>
                        <th>User ID</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><input type="text" name="last_name" class="form-control" value="{{ $employee->last_name }}"
                                title="last update: {{ $employee->updated_at }}"></td>
                        @error('last_name')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        <td><input type="text" name="first_name" class="form-control" value="{{ $employee->first_name }}"
                                title="created at: {{ $employee->created_at }}"></td>
                        @error('first_name')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        <td><input type="text" name="ecode" class="form-control" value="{{ $employee->ecode }}">
                        </td>
                        @error('ecode')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        <td>
                            <select name="rank" class="form-control">
                                    <option value="agent" @php echo $employee->rank == 'agent' ? "selected" : ""; @endphp >Agent</option>
                                    <option value="director" @php echo $employee->rank == 'director' ? "selected" : ""; @endphp >Director</option>
                                    <option value="executive officer" @php echo $employee->rank == 'executive officer' ? "selected" : ""; @endphp >Executive Officer</option>
                            </select>
                        </td>
                        @error('rank')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        <td>
                            <select name="family_situation" class="form-control">
                                    <option value="single"  @php echo $employee->family_situation == 'single' ? "selected" : ""; @endphp >Single</option>
                                    <option value="married" @php echo $employee->family_situation == 'married' ? "selected" : "" @endphp >Married</option>
                                    <option value="married with children" @php echo $employee->family_situation == 'married with children' ? "selected" : "" ; @endphp>Married with Children</option>
                            </select>
                        </td>
                        @error('family_situation')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        <td><input type="text" name="number_of_children" class="form-control"
                                value="{{ $employee->number_of_children }}" /></td>
                        @error('number_of_children')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        <td><input type="text" class="form-control" name="starting_date_in_office"
                                value="{{ $employee->starting_date_in_office }}" readonly></td>
                        @if ($employee->client)
                            <td>{{ $employee->client->id }}</td>
                        @else
                            <td><a class="btn btn-link"><i class="fa fa-user-slash"></i></a></td>
                        @endif
                        <td><button type="submit" id="submit" class="btn btn-primary"><i class="fa fa-save">
                                    save</i></button></td>
                    </tr>
                </tbody>
            </table>
        </form>
        <a href="{{ route('admin.employees.index') }}" class="btn btn-secondary" style="float:left"><i
                class="fa fa-arrow-left topicons"></i>Back</a>
        <br><br>
        <hr>
    </div>
@endsection
