@extends('layouts.dashboard')
@section('container')

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

<!-- Begin Page Content -->
<div class="container-fluid">

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Create Book</h1>
    </div>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header d-sm-flex align-items-center justify-content-between py-3">
            <h6 class="m-0 font-weight-bold text-primary">EditTable Book</h6>
            <a href="/dashboard/book" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                class="fas fa-arrow-left fa-sm text-white-50"></i> Back to Data Books</a>
        </div>
        <div class="card-body">
            <form method="POST" action="/dashboard/book" class="mb-5" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                  <label for="title" class="form-label">Title</label>
                  <input type="text" class="form-control" id="title" name="title" required autofocus value="{{ old('title') }}"> 
                </div>
                
                <div class="mb-3">
                    <label for="writter" class="form-label">Writer</label>
                    <input type="text" class="form-control" id="writer" name="writer" required  value="{{ old('writer') }}"> 
                </div>

                <div class="row">
                    <div class="form-group col-md-6">
                      <label for="publisher" class="form-label">Publisher</label>
                      <input type="text" class="form-control" name="publisher" value="{{ old('publisher') }}">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="no_isbn" class="form-label">No.ISBN</label>
                        <input type="number" class="form-control" name="no_isbn" value="{{ old('no_isbn') }}">
                      </div>
                </div>

                <div class="row">
                    <div class="form-group col-md-6">
                        <label for="category" class="form-label">Category</label>
                        <select class="form-select" name="category_id">
                            <option value="">Select Category</option>
                            @foreach($categories as $category)
                            @if(old('category_id')) == $category->id()
                            <option value="{{ $category->id }}" selected>{{ $category->name }}</option>
                            @else
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endif
                            @endforeach
                          </select>
                    </div>
                    <div class="form-group col-md-6">
                            <label for="image" class="@error('cover_image') text-danger @enderror">Cover Image</label>
                            <input type="file" name="cover_image" class="form-control">
                      </div>
                </div>
            
                  <div class="mb-3">
                    <label for="synopsis" class="form-label">Synopsis</label>
                    <input id="synopsis" type="hidden" name="synopsis" value="{{ old('synopsis') }}">
                    <trix-editor input="synopsis"></trix-editor>
                  </div>
            
                <button type="submit" class="btn btn-primary">Add Book</button>
              </form>
        </div>
    </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

<!-- Footer -->
<footer class="sticky-footer bg-white">
<div class="container my-auto">
    <div class="copyright text-center my-auto">
        <span>Copyright &copy; Your Website 2020</span>
    </div>
</div>
</footer>
<!-- End of Footer -->

</div>
<!-- End of Content Wrapper -->

</div>
<!-- End of Page Wrapper -->

@endsection