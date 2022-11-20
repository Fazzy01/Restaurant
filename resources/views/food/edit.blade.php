@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @if(Session::has('message'))
                <div class="alert alert-success">
                    {{Session::get('message')}}
                </div>
                

            @endif
            <form action="{{route('food.update', [$food->id])}}" method="post" enctype="multipart/form-data">@csrf  {{method_field('PUT')}}
                <div class="card">
                    <div class="card-header">Make Changes to the Food</div>

                    <div class="card-body">
                        <div class="form-group">
                            @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div> <br>
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" name="food_update_name" class="form-control @error('food_update_name') is-invalid @enderror" value="{{$food->name}}">

                            @error('food_update_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror                            
                        </div>
                        <div class="form-group">
                            <label for="description">Description</label>
                            <textarea type="text" name="description" class="form-control @error('description') is-invalid @enderror">{{$food->description}}</textarea>
                            @error('description')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="price">Price</label>
                            <input type="number" name="price" class="form-control @error('price') is-invalid @enderror" value="{{$food->price}}">
                            @error('price')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="category">Category</label>
                            <select name="category" class="form-control @error('category') is-invalid @enderror">
                                <option value="">Select Category</option>
                                @foreach(App\Models\Category::all() as $category)

                                    <option value="{{$category->id}}">{{$category->name}}</option>
                                @endforeach

                            </select>
                            @error('category')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div> <br>
                        <div class="form-control">
                            <label for="image">Image</label>
                            <input type="file" name="image" class="form-control @error('image') is-invalid @enderror">
                            @error('image')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                        <br>

                        <div class="form-group">
                            <button class="btn btn-outline-primary">Update</button>
                        </div> 

                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
