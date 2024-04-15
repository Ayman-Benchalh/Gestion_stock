@extends('index')
@section('Content')
<div class="container">
    <div class="party1">
        <img src="{{ asset('Image/bglogin.svg') }}" alt="image">
        <div class="titleparty">GESTION DE STOCK 2024 </div>



            @if ($errors->any())
            <div class="errorsStyle">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
            @if (session()->has('errorMessage'))
            <div class="errorsStyle">
                    {{ session()->get('errorMessage') }}
                </div>

            @endif
            @if (session()->has('MessageSucces'))
            <div class="SuccesStyle">
                    {{ session()->get('MessageSucces') }}
                </div>

            @endif


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
            <span><a href="{{ route('ForgetPassword') }}">Mot de passe oublié</a></span>
            <button type="submit"> Click now </button>
        </form>
        <div class="accountfind">Je n'ai pas de compte ,<a href="{{ route('CreatAccount') }}">Create an account</a></div>
        <div class="partyContact">
            <div class="titleContact">Contacter le support </div>
            <div class="partybtn">
                <ul>
                    <li><a href="tel:+212710317523"><img src="{{ asset('Image/Headset.png') }}" alt="img"></a></li>
                    <li><a target="_blank" href="https://www.linkedin.com/in/ayman-benchalh-469973233/"><img src="{{ asset('Image/Linkedin.png') }}" alt="img"></a></li>
                    <li><a target="_blank" href="https://www.instagram.com/aymnabbenchalh/"><img src="{{ asset('Image/Instagram.png') }}" alt="img"></a></li>

                </ul>
            </div>
        </div>
        <div class="editeby">Edite By , Benchalh / Akka</div>
    </div>
</div>

@endsection
