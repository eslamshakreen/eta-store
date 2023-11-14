@extends('layouts.app')

@section('title')
Edit {{$product->name}}
@endsection

@section('content')

<form method="POST" action="{{url('products/'.$product->id)}}" enctype="multipart/form-data">
@method('patch')
@csrf

  <div class="mb-3">
    <label class="form-label">Name</label>
    <input type="text" class="form-control" name="name" value="{{$product->name}}">
  </div>

    <div class="mb-3">
    <label class="form-label">Price</label>
    <input type="number" class="form-control" name="price" value="{{$product->price}}">
  </div>

      <div class="mb-3">
    <label class="form-label">Description</label>

    <textarea class="form-control" name="description">{{$product->description}}</textarea>
  </div>

  <div class="mb-3">
    <label class="form-label">image</label>
    <input type="file" class="form-control" name="image">
    @if ($product->image)
    <img height="100" src="{{ url('storage/'.$product->image) }}">
    @endif
  </div>
  <div class="mb-3">
    <label class="form-label">Category</label>
    <select class="form-control" name="category_id">
    <option disabled selected>-- Select Category --</option>
      @foreach ($categories as $category)
        <option value="{{ $category->id }}"@if ($category->id == $product->category_id) selected @endif>{{ $category->name }}</option>
        </option>
      @endforeach
    </select>
  </div>  
  
  <button type="submit" class="btn btn-primary">Submit</button>
</form>

@endsection