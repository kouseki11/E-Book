
      <div class="container">

        <div class="row gy-4">

          <div class="col-lg-5">
            <div class="portfolio-details-slider swiper">
              <div class="swiper-wrapper align-items-center">

                {{-- <div class="swiper-slide">
                    <img src="{{ asset('storage/'. $book->cover_image) }}" alt="{{ $book->category->name }}" class="d-block m-auto pt-2" width="300">
                </div> --}}

              </div>
              <div class="swiper-pagination"></div>
            </div>
          </div>

          <div class="col-lg-7">
            <div class="portfolio-info">
              <h3>{{ $book->title }}</h3>
              <ul>
                <li><strong>Writer</strong> : {{ $book->writer }}</li>
                <li><strong>Publisher</strong> : {{ $book->publisher }}</li>
                <li><strong>No ISBN</strong> : {{ $book->no_isbn }}</li>
                <li><strong>Category</strong> : {{ $book->category->name }}</li>
              </ul>
            </div>
            <div class="portfolio-description">
              <h2>Synopsis</h2>
              <p>
                {!! $book->synopsis !!}
              </p>
            </div>
          </div>

        </div>

      </div>