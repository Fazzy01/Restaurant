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
                <div class="card-header">All Category
                <span class="float-right"><a href="{{route('food.create')}}"><button class="btn btn-outline-primary">add food</button></a></span>
                </div>
                <div class="card-body">
                    <table class="table">
                        <thead class="table-dark">
                            <tr>
                                <td>#</td>
                                <td>Name</td>
                                <td>Edit</td>
                                <td>Delete</td>
                            </tr>
                        </thead>
                        <tbody>
                            @if(count($categories)>0)
                                @foreach($categories as $key=>$category)
                                    <tr>
                                        <th scope="row">{{$key+1}}</th>
                                        <td>{{$category->name}}</td>
                                        <td><a href="{{route('category.edit', [$category->id])}}"><button class="btn btn-outline-success">Edit</button></a> </td>
                                        <td>
                                                <!-- Button trigger modal -->
                                            <button type="button" class="btn btn-outline-danger" data-bs-toggle="modal" data-bs-target="#exampleModal{{$category->id}}">
                                              Delete
                                            </button>
                                            
                                        
                                    
                                                                                <!-- Modal -->
                                        <div class="modal fade" id="exampleModal{{$category->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                            
                                                    <form action="{{route('category.destroy', [$category->id])}}" method="post">@csrf {{method_field('DELETE')}}
                                                    
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
                                <td>No column found</td>
                            @endif
                        
                        </tbody>
                    </table>
                    </div>
            </div>
        </div>
    </div>
</div>
@endsection
