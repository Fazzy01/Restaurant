@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @if(Session::has('update_message'))
                <div class="alert alert-success">
                    {{Session::get('update_message')}}
                </div>
            @elseif(Session::has('delete_message'))
                <div class="alert alert-danger">
                    {{Session::get('delete_message')}}
                </div>
            @endif
            <div class="card">
                <div class="card-header">All Food  </div>
                

                <div class="card-body">
                    <table class="table">
                        <thead class="table-dark">
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Image</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Description</th>
                                    <th scope="col">Price</th>
                                    <th scope="col">Category</th>
                                    <th scope="col">Edit</th>
                                    <th scope="col">Delete</th>
                                </tr>
                        </thead>
                        <tbody>
                            @if(count($foods)>0)
                                @foreach($foods as $key=>$food)
                                    <tr>
                                        <th scope="row">{{$key +1}}</th>
                                        <td><img src="{{asset('images')}}/{{$food->image}}" alt="food_image" width="100"></td>
                                        <td>{{$food->name}}</td>
                                        <td>{{$food->description}}</td>
                                        <td>#{{$food->price}}</td>
                                        <td>{{$food->category?->name}}</td>
                                        <td><a href="{{route('food.edit',[$food->id])}}"><button class="btn btn-outline-success">Edit</button></a></td>
                                        
                                        <td>
                                                <!-- Button trigger modal -->
                                            <button type="button" class="btn btn-outline-danger" data-bs-toggle="modal" data-bs-target="#exampleModal{{$food->id}}">
                                              Delete
                                            </button>
                                            
                                        
                                    
                                                                                <!-- Modal -->
                                        <div class="modal fade" id="exampleModal{{$food->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                            
                                                    <form action="{{route('food.destroy', [$food->id])}}" method="post">@csrf {{method_field('DELETE')}}
                                                    
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">You are trying to delete a record</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            Are sure you want to delete this record ?
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                            <button type="submit" class="btn btn-outline-danger">Delete</button>
                                                        </div>
                                
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                        

                                    </tr>
                                @endforeach
                            @else
                                <td>No food to display</td>
                            @endif

                        </tbody>

                    </table>
               
                    {{$foods->links()}}
                   
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
