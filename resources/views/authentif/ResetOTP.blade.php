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


    </div>
    <div class="party2-OTP">
        <div class="titleForm">
            verife OTP
        </div>
        <div class="minititle">Entre  le Code OTP Pour Reinitialiser</div>
        <form action="{{ route('ResetOTP_P') }}" method="post">
            @csrf

            <label for="Num">Entre 4 numéro</label>
            <div class="groupeInput">

                <input type="text" maxlength="1" name="Num1" id="Num" placeholder="0">
                <input type="text"  maxlength="1" name="Num2" id="Num" placeholder="0">
                <input type="text"  maxlength="1" name="Num3" id="Num" placeholder="0">
                <input type="text" maxlength="1"  name="Num4" id="Num" placeholder="0">
            </div>

            <button type="submit"> valide code </button>
        </form>
        <div class="accountfind">J'ai un compte ,<a class="accountfindAbnt" href="{{ route('IndexUser') }}">Se connecter</a></div>
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
