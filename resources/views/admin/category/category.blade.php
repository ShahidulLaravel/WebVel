@extends('layouts.dashboard')


@section('content')

<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{asset('home')}}">Home</a></li>
    <li class="breadcrumb-item"><a href="{{asset('category')}}">Category</a></li>
  </ol>
</nav>

<div class="container">
    <div class="row">
        <div class="col-lg-8">

        </div>
        <div class="col-lg-4">
            <div class="grid-margin stretch-card">
            <div class="card">
              <div class="card-body">

				<h6 class="card-title">Add Category</h6>
        @if(session('success'))
        <div class="alert alert-success">
          {{session('success')}}
        </div>
        @endif
				<form class="forms-sample" action="{{route('category.store')}}" method="POST" enctype="multipart/form-data">
					@csrf
					<div class="form-group">
						<label for="exampleInputUsername1">Category Name</label>
						<input name="category_name" type="text" class="form-control" id="exampleInputUsername1" autocomplete="off" placeholder="Category Name">
              @error('category_name')
                <strong class="text-danger">{{$message}}</strong>
              @enderror
					</div>

					<div class="form-group">
						<label for="exampleInputImg">Category Image</label>
						<input name="category_img" type="file" id="exampleInputImg">
            @error('category_img')
              <strong class="text-danger">{{$message}}</strong>
            @enderror
					</div>
									
					<button type="submit" class="btn btn-primary mr-2">Add</button>
				</form>

              </div>
            </div>
		 </div>
        </div>
    </div>
</div>













@endsection