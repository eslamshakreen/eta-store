@extends('layout')
@section('title')
{{$data->name}}
@endsection
@section('content')

 <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
<div class="col">
    <div class="card shadow-sm">
      <img class="bd-placeholder-img card-img-top" src="{{ url('storage/'. $data->image) }}">
      <div class="card-body">
        <a href="{{url('categories/'.$data->category->id)}}" class="card-title">{{ $data->category->name }}</a>
        <h5 class="card-title">{{ $data->name }}</h5>
        <p class="card-text">{{ $data->description }}</p>
        <div class="d-flex justify-content-between align-items-center">
          <div class="btn-group">
            

            @auth
            <a href="{{ url('edit-product/' . $data->id) }}" class="btn btn-sm btn-outline-secondary">Edit</a>
            <div class="container">
            <form action="{{ url('products/' . $data->id ) }}" method="POST">
              @method('DELETE')
              @csrf
              <input type="submit" class="btn btn-sm btn-danger" value="Delete">
            </form>
            </div>

            @endauth
          </div>
          
          <small class="text-body-secondary">{{ $data->price }} LYD</small>
          
        </div>
      </div>
    </div>
  </div>
@endsection
