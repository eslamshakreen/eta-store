@extends('layouts.app')

@section('title')
Product Title
@endsection

@section('content')

 <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">

        @foreach ($data as $item)

        <div class="col">
          <div class="card shadow-sm">
            @if ($item->image != null)
            <img class="bd-placeholder-img card-img-top" src="{{ url('storage/'.$item->image) }}">
            @endif
            <div class="card-body">
              <h5 class="card-title">{{ $item->name }}</h5>
              <p class="card-text">{{ $item->description }}</p>
              <div class="d-flex justify-content-between align-items-center"> 
                <div class="btn-group">   
                  <a href={{ url('products/' . $item->id) }}  class="btn btn-sm btn-outline-secondary">View</a>
                  @auth
                  
                  <a href="{{ url('edit-product/' . $item->id) }}" class="btn btn-sm btn-outline-secondary">Edit</a>

                  <div class="container">
                  <form action="{{ url('products/' . $item->id ) }}" method="POST">
                    @method('DELETE')
                    @csrf
                    <input type="submit" class="btn btn-sm btn-danger" value="Delete">
                  </form>
                  </div>
      
                  @endauth
                </div>
                <small class="text-body-secondary">{{ $item->price }} LYD</small>
              </div>
            </div>
          </div>
        </div>
        
        @endforeach
        
        
      </div>

@endsection