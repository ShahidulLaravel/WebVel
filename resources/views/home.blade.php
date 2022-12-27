@extends('layouts.dashboard')


@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif

                    <h3 class="text-capitalize">you are successfully loggin <strong>{{Auth::user()->name}}</strong></h3>
                    <br>
                    <span>Profile Photo: <strong>{{Auth::user()->photo ? Auth::user()->photo:'This user not upload the profile'}}</strong></span>
                    <br>
                    <span>User Name: <strong>{{Auth::user()->name}}</strong></span>
                    <br>
                    <span>User Email: <strong>{{Auth::user()->email}}</strong></span>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection