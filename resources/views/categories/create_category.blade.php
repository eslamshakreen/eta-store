@extends('layouts.app')

@section('title')
Create category
@endsection

@section('content')

<form method="POST" action="/store-category" enctype="multipart/form-data">
@csrf

  <div class="mb-3">
    <label class="form-label">Name</label>
    <input type="text" class="form-control" name="name">
  </div>



  <div class="mb-3">
    <label class="form-label">image</label>
    <input type="file" class="form-control" name="image">
  </div>
  
  <button type="submit" class="btn btn-primary">Submit</button>
</form>

@endsection