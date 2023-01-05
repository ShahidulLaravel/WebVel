@extends('layouts.dashboard')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-lg-4">
           <div class="card">
                <div class="card-header">
                    <h4>Edit Your Profile</h4>
                </div>
               
                <div class="card-body">
                     @if(Session::has('success'))
                        <div class="alert alert-success">
                            {{Session::get('success')}}
                        </div>
                    @endif
                    <form style="height:260px" class="forms-sample" action="{{route('update.profile.info')}}" method="POST">
                        @csrf 
									<div class="form-group">
										<label for="exampleInputUsername1">Username</label>
										<input name="name" type="text" class="form-control" id="exampleInputUsername1" autocomplete="off" value="{{Auth::user()->name}}">
									</div>

									<div class="form-group">
										<label for="exampleInputEmail1">Email address</label>
										<input name="email" type="email" class="form-control" id="exampleInputEmail1" value="{{Auth::user()->email}}">
									</div>
									
									<button type="submit" class="mt-5 btn btn-primary mr-2">Update Profile</button>
									
								</form>
                </div>
            </div> 
        </div>
        <div class="col-lg-4">
            <div class="card">
                <div class="card-header">
                    <h4>Update Password</h4>
                </div>
                <div class="card-body">
                    @if(Session::has('pass_success'))
                        <div class="alert alert-success">
                            {{Session::get('pass_success')}}
                        </div>
                    @endif
                    <form class="forms-sample" action="{{route('update.password')}}" method="POST">
                        @csrf 

									<div class="form-group">
										<label for="exampleInputUsername1">Old Password</label>
                                        @if(Session::has('error'))
                                            <div class="alert alert-danger">
                                                {{Session::get('error')}}
                                            </div>
                                        @endif
										<input type="password" class="form-control" id="exampleInputUsername1" autocomplete="off" name="old_password" placeholder="Your old Password">
                                        @error('old_password')
                                            <strong class="text-danger">{{$message}}</strong>
                                        @enderror
									</div>

									<div class="form-group">
										
                                    
                                        <label for="exampleInputUsername1">New Password</label>
										<input type="password" class="form-control" id="exampleInputUsername1" autocomplete="off" name="password" placeholder="New Password">
                                        
                                         @error('password')
                                            <strong class="text-danger">{{$message}}</strong>
                                        @enderror
									</div>

                                    <div class="form-group">
										<label for="exampleInputUsername1">Confirm New Password</label>
										<input type="password" class="form-control" id="exampleInputUsername1" autocomplete="off" name="password_confirmation" placeholder="Confirm Password">
                                         @error('password_confirmation')
                                            <strong class="text-danger">{{$message}}</strong>
                                        @enderror
									</div>

									
									<button type="submit" class="btn btn-primary mr-2">Update Password</button>
									
								</form>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="card">
                <div class="card-header">
                    <h4>Update Profile Image</h4> 
                    @error('photo')
                        <strong class="text-danger">{{$message}}</strong>                   
                    @enderror

                    @if(session('img_success'))
                    <div class="alert alert-success">
                        {{session('img_success')}}
                    </div>
                    @endif
                </div>
                <div class="card-body">
                    <form  class="forms-sample" action="{{route('update.image')}}" method="POST" enctype="multipart/form-data">
                        @csrf 

									<div class="form-group">
										<label for="exampleInputUsername1">Image Upload</label>
										<input type="file" class="" id="exampleInputUsername1" autocomplete="off" name="photo" onchange="document.getElementById('blah').src = window.URL.createObjectURL(this.files[0])">
                                        <div class="my-2">
                                            <img src="" id="blah" width="200" alt="">
                                        </div>
									</div>
									
									<button type="submit" class="mt-3 btn btn-primary mr-2">Upload Image</button>
									
								</form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection