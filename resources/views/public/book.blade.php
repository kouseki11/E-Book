@extends('layouts.book')
@section('container')

   <main id="main">

    @if (session('limit'))
                <script>
                    Swal.fire(
                    'Daily Download Limited!',
                    '',
                    'error'
                    )
                </script>
                @endif

    <!-- ======= Portfolio Details Section ======= -->
    <section id="portfolio-details" class="portfolio-details pt-4">
      <div class="container">

        <div class="row gy-4">

          <div class="col-lg-5">
            <div class="portfolio-details-slider swiper">
              <div class="swiper-wrapper align-items-center">

                <div class="swiper-slide">
                    @if ($book->cover_image)
                    <img src="{{ asset('storage/'. $book->cover_image) }}" alt="{{ $book->category->name }}" class="d-block m-auto pt-2" style="max-height: 400px">
                    @else
                    <img src="https://source.unsplash.com/1200x400?{{ $book->category->name }}" alt="{{ $book->category->name }}" class="img-fluid">
                    @endif
                </div>

              </div>
              <div class="swiper-pagination"></div>
            </div>
          </div>

          <div class="col-lg-7">
            <div class="portfolio-info">
              <h3>{{ $book->title }}</h3>
                <p><strong>Writer</strong> : {{ $book->writer }}</p>
                <p><strong>Publisher</strong> : {{ $book->publisher }}</p>
                <p><strong>No ISBN</strong> : {{ $book->no_isbn }}</li>
                <p><strong>Category</strong> : {{ $book->category->name }}</p>
            </div>
            <div class="portfolio-description">
              <h2>Synopsis</h2>
              <p>
                {!! $book->synopsis !!}
              </p>
              <div class="text-center">
                <a href="{{ route('export-pdf', $book->slug) }}" class="btn btn-warning">Download E-Book</a>
              </div>
            <div class="pt-2 mb-2 text-center">
                <a href="/book" class="btn btn-danger">Back to books</a>
            </div>
            </div>
          </div>

        </div>

      </div>
    </section><!-- End Portfolio Details Section -->

  </main><!-- End #main -->

@endsection