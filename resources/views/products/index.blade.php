@extends('layouts.app')
  @section('main')
  <div class="container">
        <div class="text-right mt-3">
            <a href="products/create" class="btn  btn-primary">New Products</a>
        </div>
      
        <div class="container mt-3">
        <h2 mb-2>Products</h2>
                
        <table class="table table-dark">
            <thead>
            <tr>
                <th>S.No</th>
                <th>Name</th>
                <th>Description</th>
                <th>Image</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach($products as $product)
            <tr>
                <td>{{ $loop->index+1}}</td>
                <td> <a href="products/show/{{$product->id}}" class="text-light">{{ $product->name}}</a></td>
                <td>{{ $product->description }}</td>
                <td><img src="products/{{$product->image}}" width="50" height="50" class="rounded-circle"></td>
                <td>
                     <a href="products/edit/{{$product->id}}" class="btn  btn-sm btn-primary">Edit</a>
                     <a href="products/delete/{{$product->id}}" class="btn btn-sm btn-danger">Delete</a>
                     <form action="products/delete/{{$product->id}}" class="d-inline">
                        @csrf
                        @method('delete')
                        <button type="submit" class="btn btn-danger btn-sm">Via Delete Method Route</button>
                     </form>   
                </td>
            </tr>
            @endforeach
            </tbody>
        </table>
        {{$products->links()}}
        </div>
    </div>
@endsection