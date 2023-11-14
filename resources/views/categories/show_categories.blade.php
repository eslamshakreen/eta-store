@extends('layouts.app')
@section('title')
Categories List
@endsection
@section('content')

<div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">

    @foreach ($categories as $category)

    <div class="col">
      <div class="card shadow-sm">
        @if ($category->image != null)
        <img class="bd-placeholder-img card-img-top" src="{{ url('storage/'.$category->image) }}">
        @endif
        <div class="card-body">
          <h5 class="card-title">{{ $category->name }}</h5>
          <div class="d-flex justify-content-between align-items-center"> 
            <div class="btn-group">   
              <a href={{ url('/category'.'/'. $category->id) }}  class="btn btn-sm btn-outline-secondary">View</a>
              <button type="button" class="btn btn-sm btn-outline-secondary">Edit</button>
            </div>
          </div>
        </div>
      </div>
    </div>
    
    @endforeach
@endsection
