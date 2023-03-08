@extends('layouts.book')

@section('container')

<h1 class="mb-3 text-center">{{ $title }}</h1>

<div class="row justify-content-center mb-3">
    <div class="col-md-6">
        <form action="/book">   

            @if (request('category'))
            <input type="hidden" name="category" value="{{ request('category') }}">
            @endif

          <div class="input-group mb-3">
            <input type="text" class="form-control" placeholder="Search.." name="search" value="{{ request('search') }}">
            <button class="btn btn-outline-danger" type="submit" >Search</button>
          </div>
        </form>
    </div>
</div>

@if ($books->count())
  <div class="container">
    <div class="row">
        @foreach ($books as $book)
        <div class="col-md-4 mb-3">
            <div class="card">
                <div class="position-absolute bg-dark px-3 py-2" style="background-color: rgba(0, 0, 0, 0.7)"><a href="/book?category={{ $book->category->slug }}" class="text-white text-decoration-none">{{ $book->category->name }}</a></div>
                @if ($book->cover_image)
                <img src="{{ asset('storage/'. $book->cover_image) }}" class="card-img-top" alt="{{ $book->category->name }}" style="max-height: 500px">
                @else
                <img src="https://source.unsplash.com/500x400?{{ $book->category->name }}" class="card-img-top" alt="{{ $book->category->name }}">
                @endif
                <div class="card-body">
                  <h5 class="card-title"><a href="/book/{{ $book->slug }}" class="text-decoration-none text-dark">{{ $book->title  }}</a></h5>
                  <a href="/book/{{ $book->slug }}" class="btn btn-primary">Read more..</a>
                </div>
              </div>
        </div>
        @endforeach
    </div>
  </div>

  @else
    <p class="text-center fs-4">No book found.</p>
  @endif

  <div class="d-flex justify-content-center">
  {{ $books->links() }}
  </div>



@endsection

