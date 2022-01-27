@extends('layouts.admin')

@section('content')
    <div class="container">
        <h1 class="text-center py-4">Admin Dashboard</h1>

        <div class="row justify-content-center my-4">

            <div class="col-md-8">

                <div class="card">
                    <div class="card-header">{{ __('Dashboard') }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        {{ __('You are logged in!') }}
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
