@extends('layouts.admin_layout')

@section('content')
    <div class="container">
        <hr>
        <H2 class="text-muted" align="center">Create new Employee</H2>
        <hr>
        <br><br>
        <form id="form" method="POST" action="{{ route('admin.employees.store') }}" enctype="multipart/form-data">
            @csrf
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="inputGroup-sizing-default" style="width:150px">Last Name</span>
                </div>
                <input type="text" name="last_name" class="@error('last_name') is-invalid @enderror form-control" id="last_name"
                    aria-describedby="inputGroup-sizing-default">
            </div>
            @error('last_name')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="inputGroup-sizing-default" style="width:150px">First Name</span>
                </div>
                <input type="text" name="first_name" class="@error('first_name') is-invalid @enderror form-control" id="first_name"
                    aria-describedby="inputGroup-sizing-default">
            </div>
            @error('first_name')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="inputGroup-sizing-default" style="width:150px">Rank</span>
                </div>
                <select name="rank" class="@error('rank') is-invalid @enderror form-control" id="rank">
                    <option value="">-- Select option --</option>
                    <option value="agent">Agent</option>
                    <option value="director">Director</option>
                    <option value="executive officer">Executive Officer</option>
                </select>
            </div>
            @error('rank')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="inputGroup-sizing-default" style="width:150px">Code</span>
                </div>
                <input type="text" name="ecode" class="@error('ecode') is-invalid @enderror form-control"
                    id="ecode" aria-describedby="inputGroup-sizing-default">
            </div>
            @error('ecode')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="inputGroup-sizing-default" style="width:150px">Family situation</span>
                </div>
                <select name="family_situation" class="@error('family_situation') is-invalid @enderror form-control"
                    id="family_situation">
                    <option value="">-- Select option --</option>
                    <option value="single">Single</option>
                    <option value="married">Married</option>
                    <option value="married with children">Married with Children</option>
                </select>
            </div>
            @error('family_situation')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="inputGroup-sizing-default" style="width:150px">N° of Children</span>
                </div>
                <input type="number" name="number_of_children" class="@error('number_of_children') is-invalid @enderror form-control"
                    id="number_of_children" aria-describedby="inputGroup-sizing-default">
            </div>
            @error('number_of_children')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="inputGroup-sizing-default" style="width:150px">Starting Date</span>
                </div>
                <input type="date" name="starting_date_in_office"
                    class="@error('starting_date_in_office') is-invalid @enderror form-control" id="starting_date_in_office"
                    aria-describedby="inputGroup-sizing-default">
            </div>
            @error('starting_date_in_office')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <div class="btn-group">
                <button id="submit" type="submit" class="btn btn-primary mr-3"><i class="fa fa-save">
                    save</i></button>
            <a href="{{ route('admin.employees.index') }}" class="btn btn-secondary"><i class="fa fa-arrow-left topicons"></i>Back</a>
            </div>
            <br><br>
            <hr>

        </form>


        <script>
            $('#family_situation').on('change', function(e) {
                var optionSelected = $("option:selected", this);
                var valueSelected = this.value;
                if (valueSelected == 'married' || valueSelected == 'single') {
                    $('#number_of_children').val(0);
                    $('#number_of_children').prop("readonly", true);
                } else {
                    $('#number_of_children').prop("readonly", false);
                    $('#number_of_children').val('');
                }
            });
        </script>
    @endsection
