@extends('layouts.dashboard')


@section('content')

<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{asset('home')}}">Home</a></li>
    <li class="breadcrumb-item"><a href="{{asset('category')}}">Edit Category</a></li>
  </ol>
</nav>

<div class="container">
    <div class="row">
        <div class="col-lg-8 m-auto">
            <div class="card">
                <div class="card-header">
                    <h4>Edit Category</h4>
                    @if('edit_success')
                        <strong class="text-success">
                            {{session('edit_success')}}
                        </strong>
                    @endif
                </div>
                <div class="card-body">
                    {{-- edit form --}}
                    <form class="forms-sample" action="{{route('category.update')}}" method="POST" enctype="multipart/form-data">
					@csrf
					<div class="form-group">
						<label for="exampleInputUsername1">Category Name</label>
                        <input type="hidden" name="category_id" value="{{$category_info->id}}">
						<input  name="category_name" type="text" class="form-control" id="exampleInputUsername1" autocomplete="off" placeholder="Category Name" value="{{$category_info->category_name}}">
                        @error('category_name')
                        <strong class="text-danger">{{$message}}</strong>
                        @enderror
                    </div>

					<div class="form-group">
						<label for="exampleInputImg">Category Image</label>
						<input class="form-control" name="category_img" type="file" id="exampleInputImg" onchange="document.getElementById('blah').src = window.URL.createObjectURL(this.files[0])"><br>
                        @error('category_img')
                        <strong class="text-danger">{{$message}}</strong>
                        @enderror
                        <img width="100" src="{{asset('upload/category')}}/{{$category_info->category_img}}" id="blah" alt="">
					</div>
                    
									
					<button type="submit" class="btn btn-primary mr-2">Edit Category</button>
				</form>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection