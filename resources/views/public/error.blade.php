<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.rtl.min.css" integrity="sha384-7mQhpDl5nRA5nY9lr8F1st2NbIly/8WqhjTp+0oFxEA/QUuvlbF6M1KXezGBh3Nb" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">

<div class="pt-5 w-100 bg-white ">
    <img src="{{ asset('images/maxresdefault.jpg') }}" alt="" srcset="" width="300" class="d-block m-auto pt-5">
    <h5 class="text-center mt-3">Damee</h5>
    <div class="d-flex justify-content-center mt-2">
    @if(Auth::user()->roles == 'admin')
    <a href="/dashboard/admin" class="btn btn-primary">Kembali</a>
    @else
    <a href="/book" class="btn btn-primary">Kembali</a>
    @endif
    </div>
</div> 

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
