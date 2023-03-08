@extends('layouts.logreg')

@section('container')

<div class="contact1">
    <div class="container-contact1">
        <div class="contact1-pic js-tilt" data-tilt>
            <img src="images/img-01.png" alt="IMG">
        </div>

        <form action="{{ route('login.auth') }}" method="POST" class="contact1-form validate-form">
            @csrf
            <span class="contact1-form-title">
                Login
            </span>

            <div class="wrap-input1 validate-input" data-validate = "Valid email is required: ex@abc.xyz">
                <input class="input1" type="text" name="email" placeholder="Email">
                <span class="shadow-input1"></span>
            </div>

            <div class="wrap-input1 validate-input" data-validate = "password is required">
                <input class="input1" type="password" name="password" placeholder="Password">
                <span class="shadow-input1"></span>
            </div>

            <div class="container-contact1-form-btn">
                <button type="submit" class="contact1-form-btn">
                    <span>
                        Login
                    </span>
                </button>
            </div>
        </form>
    </div>
</div>

@endsection