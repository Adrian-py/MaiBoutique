@extends("layout.layout")

@section('title', 'Welcome')

@section("navbar")
    @include("partials.navbar")
@endsection

@section("content")
    <main class="welcome">
        <div class="welcome__text">
            <h1 class="welcome__hero">Welcome to<br><span class="welcome__hero__mai">Mai</span><span class="welcome__hero__boutique">Boutique</span>!</h1>

            <p class="welcome__description">Online Boutique that Provides You with Various<br> Clothes to Suit Your Various Activities</p>

            <a href="/register" class="welcome__register">SIGN UP NOW!</a>
        </div>

        <div class="welcome__image">
            <img src="{{ asset("/assets/images/welcome-image.jpg") }}" alt="Welcome Image">
        </div>
    </main>
@endsection
