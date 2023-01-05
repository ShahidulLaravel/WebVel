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

                    <h3 class="text-capitalize">Hi ! Welcome Back <strong class="text-primary">{{Auth::user()->name}}</strong></h3>
                    <br>
                    <img style="width: 150px;height:150px;border-radius:50%;" class="mb-3"  src="{{asset('upload/user')}}/{{Auth::user()->photo}}" alt="image here">
                    <br>
                    <strong class="text-muted">{{Auth::user()->name}}</strong>
                    <br>
                    <strong class="text-muted">{{Auth::user()->email}}</strong>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection