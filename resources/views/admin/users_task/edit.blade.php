@extends('layouts.dashboard')


@section('content')


<div class="container">
    <div class="row">
        <div class="col-lg-10 m-auto">
            <div class="card">
                <div class="card-header">
                    <h3>Edit User</h3>
                </div>
                <div class="card-body">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                     {{-- form start --}}
                        <form class="forms-sample" action="{{route('user.update', $user->id)}}" method="POST">

                            @csrf
                            @method('PUT')
                                <div class="form-group">
                                    <label for="exampleInputUsername1">Name</label>
                                <input value="{{$user->name}}" name="name" type="text" class="form-control " id="exampleInputUsername1" autocomplete="Username" placeholder="Username">
                               
                                 </div>
                                 <div class="form-group">
                                      <label for="exampleInputEmail1">Email address</label>
                                                <input value="{{$user->email}}" name="email" type="email" class="form-control" id="exampleInputEmail1" placeholder="Email">
                                                @error('email')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                           
                                            <button type="submit" class="btn btn-success">Update</button>                                        
                                        </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection