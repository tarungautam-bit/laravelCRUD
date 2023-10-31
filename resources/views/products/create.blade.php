@extends('layouts.app')
@section('main')
    <div class="container">
        <div class="row justify-content-center mt-3">
            <div class="col-md-8">
                <div class="card p-3">
                    <form action="/products/store" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" name="name" id="name" class="form-control" placeholder="Name" value="{{old('name')}}">
                             @if($errors->has('name'))
                                <span class="text-danger">{{$errors->first('name')}}</span>
                             @endif
                        </div>
                        <div class="mb-3">
                            <label for="description" class="form-label">Description</label>
                            <textarea name="description" id="description" class="form-control" rows="4" placeholder="Description">{{old('description')}}</textarea>
                            @if($errors->has('description'))
                               <span  class="text-danger">{{$errors->first('description')}}</span>
                            @endif
                        </div>
                        <div class="mb-3">
                            <label for="image" class="form-label">Image</label>
                            <input type="file" name="image" id="image" class="form-control" value="{{old('image')}}">
                            @if($errors->has('image'))
                                <span class="text-danger">{{$errors->first('image')}}</span>
                            @endif
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection