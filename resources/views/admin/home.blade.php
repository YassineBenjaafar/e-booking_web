@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        {{-- @if (!Auth::user()->active && Auth::user()->hasRole('user'))
                        <form  method="POST" action="{{ route('salarie.setuser')}}">
                            @csrf
                              <div class="form-group">
                                  <label for="matricule">Veuillez saisir votre matricule:</label>
                                  <input type="text" name="matricule" class="form-control">
                              </div>
                              <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                                <button type="submit" class="btn btn-primary">Submit</button>
                              </div>
                        </form>
                        @endif --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
