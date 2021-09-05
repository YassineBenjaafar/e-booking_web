@extends('layouts.admin_layout')
@section('content')
    <style>
        a {
            display: inline-block;
        }

        .switch {
            position: relative;
            display: inline-block;
            width: 60px;
            height: 34px;
        }

        .switch input {
            opacity: 0;
            width: 0;
            height: 0;
        }

        .slider {
            position: absolute;
            cursor: pointer;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: #ccc;
            -webkit-transition: .4s;
            transition: .4s;
        }

        .slider:before {
            position: absolute;
            content: "";
            height: 26px;
            width: 26px;
            left: 4px;
            bottom: 4px;
            background-color: white;
            -webkit-transition: .4s;
            transition: .4s;
        }

        input:checked+.slider {
            background-color: #2196F3;
        }

        input:focus+.slider {
            box-shadow: 0 0 1px #2196F3;
        }

        input:checked+.slider:before {
            -webkit-transform: translateX(26px);
            -ms-transform: translateX(26px);
            transform: translateX(26px);
        }

    </style>
    <div class="container">
        <table class="table table-striped" id="bookingTable">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Employee</th>
                    <th>eCode</th>
                    <th>Entity</th>
                    <th>Start Date</th>
                    <th>End Date</th>
                    <th>State</th>
                    <th><input type="text" class="form-control" id="searchInput"
                            onkeyup="SearchTable('bookingTable','searchInput','6')" placeholder="Search booking ..."
                            title="Enter an entity name ...."></th>
                    <th width="20%"> <a class="btn btn-primary" href="{{ route('admin.bookings.affect') }}"><i
                                class="fa fa-tasks" style="font-size:20px;margin-right:10px;"></i>Execute selection</a></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($bookings as $booking)
                    <tr>
                        <td>{{ $booking->id }}</td>
                        <td>{{ $booking->employee->last_name . " " . $booking->employee->first_name }}</td>
                        <td>{{ $booking->employee->ecode }}</td>
                        <td>{{ $booking->entity->label }}</td>
                        <td>{{ $booking->start_date }}</td>
                        <td>{{ $booking->end_date }}</td>
                        <td>{{ $booking->state->name }}</td>
                        <td></td>
                        <td></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
