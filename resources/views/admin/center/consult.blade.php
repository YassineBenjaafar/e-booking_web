@extends('layouts.admin_layout')
@section('content')
    <div class="container">
        <hr>
        <H2 class="text-muted" align="center">Visualization center <b>{{ $center->label }}</b></H2>
        <hr>
        <br><br>
        @csrf
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Id</th>
                    <th width="30%">Label</th>
                    <th width="70%">Description</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td title="last update: {{ $center->updated_at }}">{{ $center->id }}</td>
                    <td title="created at: {{ $center->created_at }}">{{ $center->label }}</td>
                    <td>{{ $center->description }}</td>
                </tr>
            </tbody>
        </table>
        <a href="{{ route('admin.centers.index') }}" class="btn btn-secondary" style="float:left"><i
                class="fa fa-arrow-left topicons"></i>Back</a>

        <br><br><br>
        <b>Live Preview</b>
        <hr />

        <br><br>
        <div class="form-group">
            @foreach ($urls as $url)
                <div>
                    <img src=" {{ asset($url) }}" />
                </div>
            @endforeach
        </div>
    </div>

@endsection
