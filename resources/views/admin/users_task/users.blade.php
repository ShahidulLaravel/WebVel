@extends('layouts.dashboard')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-lg-11 m-auto">
            <div class="card">
                <div class="card-header">
                    <h4>Show Users List Here <span class="float-right">Currently active User : <strong class="text-primary">{{$total_user - 1}}</strong></span></h4>
                </div>

                @if(session('success'))
                <strong class="alert alert-success">{{session('success')}}</strong>
                @endif

                <div class="card-body">

                    <table class="table table-striped">
                        <tr>
                            <th>SL</th>
                            <th>Profile Photo</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Created at</th>
                            <th>Action</th>
                        </tr>
                        @foreach($users as $sl=> $user)
                        <tr>
                            <td>{{$sl+1}}</td>
                            <td>
                            @if ($user->photo == null)
                                <img src="{{ Avatar::create($user->name)->toBase64() }}"/> 
                            @else
                                <img src="{{asset('upload/user')}}/{{$user->photo}}"> 
                            @endif
                            </td>
                            <td>{{$user->name}}</td>
                            <td>{{$user->email}}</td>
                            <td>{{$user->created_at->diffForHumans()}}</td>
                            <td>
                                 <a  href="{{route('user.delete', $user->id)}}" class="btn btn-danger btn-sm">Delete</a>
                            </td>
                        </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection