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
                     @if (Auth::user()->photo == null)
                        <img style="margin-bottom:20px;width:110px;height:110px;border-radius:50%;" src="{{ Avatar::create(Auth::user()->name)->toBase64() }}" />
                    @else
                        <img style="margin-bottom:20px;width:160px;height:160px;border-radius:50%;" src="{{asset('upload/user')}}/{{Auth::user()->photo}}"> 
                    @endif
                    <br>
                    <strong class="mt-3 text-muted">{{Auth::user()->name}}</strong>
                    <br>
                    <strong class="text-muted">{{Auth::user()->email}}</strong>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection