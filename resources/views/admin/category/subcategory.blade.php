@extends('layouts.dashboard')


@section('content')

<div class="container">
    <div class="row">
        <div class="col-lg-8">
            <div class="card">
                <div class="card-header">
                    <h4>Show Sub Category</h4>
                </div>
                <div class="card-body">
                    <table class="table table-bordered">
                        <tr>
                            <th>SL</th>
                            <th>Subcategory Name</th>
                            <th>Subcategory Image</th>
                            <th>Main Category</th>
                            <th>Action</th>
                        </tr>
                        @foreach ($subcategories as $sl=> $subcategory )
                            <tr>
                                <td>{{$sl + 1 }}</td>
                                <td>{{$subcategory->subcategory_name}}</td>
                                <td>
                                    <img width="150" src="{{asset('upload/subcategory')}}/{{$subcategory->subcategory_image}}" alt="">
                                </td>
                                <td>
                                    {{$subcategory->rel_to_category->category_name}}
                                </td>
                                <td>
                                    <button class="btn btn-sm btn-danger">Delete</button>
                                </td>
                            </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="card">
                <div class="card-header">
                    <h4>Add Subcategory</h4>
                </div>
                <div class="card-body">
                    <form action="{{route('subcategory.store')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                       <div class="mb-3">
                         <label class="form-label" for="">Subcategory Name</label>
                        <input type="text" name="subcategory_name" class="form-control">
                       </div>
                       <div class="mb-3">
                        <label for="" class="form-label">Select Category</label>
                        <select name="category_id" class="form-control">
                            @foreach ($categories as $category )
                                <option value="{{$category->id}}">{{$category->category_name}}</option>
                            @endforeach
                        </select>
                       </div>

                        <div class="mb-3">
                            <label for="">Subcategory Image</label>
                            <input type="file" class="form-control" name="subcategory_image">
                        </div>

                       <div class="mb-3">
                        <button class="btn btn-primary" type="submit">Add Subcategory</button>
                       </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>



@endsection