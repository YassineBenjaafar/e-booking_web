@extends('layouts.admin_layout')
@section('content')
    <div class="container">
        <hr>
        <H2 class="text-muted" align="center">Edit Center <b>{{ $center->label }}</b></H2>
        <hr>
        <br><br>
        <form action="{{ route('admin.centers.update', $center->id) }}" method="POST" enctype="multipart/form-data"
            onSubmit="return confirm('Are you sure you wish to update ?');">
            @csrf
            @method('PUT')
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Label</th>
                        <th>Description</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>{{ $center->id }}</td>
                        <td><input type="text" value="{{ $center->label }}" name="label" class="form-control"></td>
                        @error('label')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        <td><textarea type="text" name="description"
                                class="@error('description') is-invalid @enderror form-control"
                                id="description">{{ $center->description }}"</textarea></td>
                        @error('description')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        <td><button type="submit" id="submit" class="btn btn-primary"><i class="fa fa-save">
                                    save</i></button></td>
                    </tr>
                </tbody>
            </table>
            <a href="{{ route('admin.centers.index') }}" class="btn btn-secondary" style="float:left"><i
                    class="fa fa-arrow-left topicons"></i>Back</a>

            <br><br>
            <b>Old photos</b>
            <hr>
            <div class="form-group">
                @foreach ($urls as $url)
                    <div>
                        <img src=" {{ asset($url) }}" />
                    </div>
                @endforeach
            </div>
            <div class="form-group">
                <input type="File" name="mediaDirectory[]"
                    class="@error('mediaDirectory') is-invalid @enderror form-control-file" id="mediaDirectory" multiple
                    title="uploading new photos will delete the old !">
            </div>
            <b>New Uploaded image</b>
            <hr />
            <br><br>
            <div class="row" id="dvPreview"></div>
    </div>
    </form>
    </div>

@endsection
