@extends('index')
@section('Content')
<div class="container">
    <div class="party1">
        <img src="{{ asset('Image/bglogin.svg') }}" alt="image">
        <div class="titleparty">GESTION DE STOCK 2024 </div>
    </div>
    <div class="party2-cre">
        <div class="titleForm">
            SingUp
        </div>
        <form action="{{ route('CreatAccountP') }}" method="post">
            @csrf
            <label for="NomComplet">Nom Complet</label>
            <input type="text" name="NomComplet" id="NomComplet"  placeholder="enter Nom et prenom" value="{{ old('NomComplet') }}">
            <label for="email">Email</label>
            <input type="email" name="email" id="email"  placeholder="enter email" value="{{ old('email') }}">
            <label for="password">Password</label>
            <input type="password" name="password" id="password" placeholder="enter password">

            <button type="submit"> nouveau Account </button>
        </form>
        <div class="accountfind">J'ai un compte,<a href="{{ route('IndexUser') }}"> connectez-vous</a> </div>
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
