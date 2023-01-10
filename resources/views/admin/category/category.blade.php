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
          <div class="card">
            <div class="card-header">
              <h4>Show All Category</h4>
              @if (session('deleted'))
                <strong class="text-success">{{session('deleted')}}</strong>
              @endif
            </div>
            <div class="card-body">
              <table class="table table-striped">
                <tr>
                  <th>SL</th>
                  <th>Category Name</th>
                  <th>Category Image</th>
                  <th>Action</th>
                </tr>
                @foreach ($all_category as $sl=>$category )
                  <tr>
                    <td>{{$sl + 1}}</td>
                    <td>{{$category->category_name}}</td>
                    <td><img width="75" src="{{asset('upload/category')}}/{{$category->category_img}}" alt=""></td>
                    <td>
                      <div class="dropdown">
                                    <button class="btn dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        Steps
                                    </button>
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                        <a class="dropdown-item" href="{{route('category.edit', $category->id)}}">Edit</a>

                                        <a class="dropdown-item" href="{{route('category.delete', $category->id)}}">Delete</a>

                                    </div>
                                    </div> 
                    </td>
                  </tr>
                @endforeach
              </table>
            </div>
          </div>
          @if($trash_category->count() >= 1)
          <div class="card mt-5">
            <div class="card-header">
              <h4>Trash Category</h4>
              @if (session('trash_deleted'))
                <strong class="text-success">{{session('trash_deleted')}}</strong>
              @endif
              
              @if (session('trash_p_deleted'))
                <strong class="text-success">{{session('trash_p_deleted')}}</strong>
              @endif
            </div>
            <div class="card-body">
              <table class="table table-striped">
                <tr>
                  <th>SL</th>
                  <th>Category Name</th>
                  <th>Category Image</th>
                  <th>Action</th>
                </tr>
                @foreach ($trash_category as $sl=>$category )
                  <tr>
                    <td>{{$sl + 1}}</td>
                    <td>{{$category->category_name}}</td>
                    <td><img width="75" src="{{asset('upload/category')}}/{{$category->category_img}}" alt=""></td>
                    <td>
                      <div class="dropdown">
                                    <button class="btn dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        Steps
                                    </button>
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                        <a class="dropdown-item" href="{{route('category.restore', $category->id)}}">Restore</a>

                                        <a class="dropdown-item" href="{{route('category.del', $category->id)}}">Delete Permanently </a>

                                    </div>
                                    </div> 
                    </td>
                  </tr>
                @endforeach
              </table>
            </div>
          </div>
          @else
          <div class="mt-5 p-1">
            <h5 class="text-danger">No Trash Addedd Till Now </h5>
          </div>
          @endif
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
				<form class="forms-sample" action="{{route('category.insert')}}" method="POST" enctype="multipart/form-data">
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
									
					<button type="submit" class="btn btn-primary mr-2">Add Category</button>
				</form>

              </div>
            </div>
		 </div>
        </div>
    </div>
</div>













@endsection