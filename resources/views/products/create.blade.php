@extends('layouts.app')

@section('title')
Create Products
@endsection

@section('content')

<form method="POST" action="/store-product" enctype="multipart/form-data">
@csrf

  <div class="mb-3">
    <label class="form-label">Name</label>
    <input type="text" class="form-control" name="name">
  </div>

    <div class="mb-3">
    <label class="form-label">Price</label>
    <input type="number" class="form-control" name="price">
  </div>

      <div class="mb-3">
    <label class="form-label">Description</label>

    <textarea class="form-control" name="description"></textarea>
  </div>

  <div class="mb-3">
    <label class="form-label">image</label>
    <input type="file" class="form-control" name="image">
  </div>
  <div class="mb-3">
    <label class="form-label">Category</label>
    <select class="form-control" name="category_id">
    <option disabled selected>-- Select Category --</option>
      @foreach ($categories as $category)
        <option value="{{ $category->id }}">{{ $category->name }}</option>
      @endforeach
    </select>
  </div>  
  
  <button type="submit" class="btn btn-primary">Submit</button>
</form>

@endsection