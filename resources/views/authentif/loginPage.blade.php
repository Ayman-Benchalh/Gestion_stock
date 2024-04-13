@extends('index')
@section('Content')
<div class="container">
    <div class="party1">
        <img src="{{ asset('Image/bglogin.svg') }}" alt="image">
        <div class="titleparty">GESTION DE STOCK 2024 </div>
        <div class="errorsStyle">@error('error')
                    <span>{{ $message }}</span>
        @enderror</div>
    </div>
    <div class="party2">
        <div class="titleForm">
            Login
        </div>
        <form action="{{ route('LoginAccount') }}" method="post">
            @csrf
            <label for="email">Email</label>
            <input type="email" name="email" id="email"  placeholder="enter email" value="{{ old('email') }}">
            <label for="password">Password</label>
            <input type="password" name="password" id="password" placeholder="enter password">
            <span><a href="#">Reset Password</a></span>
            <button type="submit"> Click now </button>
        </form>
        <div class="accountfind">I don’t Have Account ,<a href="{{ route('CreatAccount') }}">Create One now</a></div>
        <div class="partyContact">
            <div class="titleContact">Contact Souport </div>
            <div class="partybtn">
                <ul>
                    <li><a href="#"><img src="{{ asset('Image/Headset.png') }}" alt="img"></a></li>
                    <li><a href="#"><img src="{{ asset('Image/Linkedin.png') }}" alt="img"></a></li>
                    <li><a href="#"><img src="{{ asset('Image/Instagram.png') }}" alt="img"></a></li>

                </ul>
            </div>
        </div>
        <div class="editeby">Edite By , Benchalh / Akka</div>
    </div>
</div>

@endsection
