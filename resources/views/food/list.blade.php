@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        @if(count($categories)>0)
            @foreach($categories as $category)

                <div class="col-md-12">
                    <h2 style="color: blue;">{{$category->name}}</h2>
                    <div class="jumbotron">
                        <div class="row"> 
                        @foreach(App\Models\Food::where('category_id',$category->id)->get() as $food)
                            @if(!empty($food->get('image')) )
                            <div class="col-md-3">
                                <img src="{{asset('images')}}/{{$food->image}}" width="200" height="155" alt="food_image">
                                <p class="text-center"> {{$food->name}}
                                    <span>#{{$food->price}}</span>
                                </p>
                                <p class="text-center">
                                    <a href="">
                                        <button class="btn btn-primary">View More</button>
                                    </a>
                                </p>
                            </div>
                            @else
                            <p>this is empty</p>
                            @endif

                        @endforeach
                        </div>

                    </div>
                </div>
        
            @endforeach
        @else
        <p>No category found</p>
        @endif
    </div>


</div>







@endsection
