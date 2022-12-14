@extends('layout.layout')

@section('title', 'Login')

@section('content')
    <main class="login">
        <div class="login__form">
            <h1 class="login__title">Sign In</h1>

            {{-- if register successful --}}
                @if(session()->has("success"))
                    <div class="login__message">
                        <p>{{ session("success") }}</p>
                    </div>
                @endif

            <form action="/login" method="POST" class="form">
                @csrf
                <div class="form__field form__field--email">
                    <label for="email" class="form__label">Email</label>
                    <input required type="email" name="email" placeholder="Enter your email!" autofocus class="form__input @error('email')form__is-invalid @enderror" value="{{ old('email') }}">

                    @error("email")
                        <p class="form__error-message">{{ $message }}</p>
                    @enderror
                </div>

                <div class="form__field form__field--password">
                    <label for="password" class="form__label">Password</label>
                    <input required type="password" name="password" placeholder="Enter your password!" class="form__input @error('password')form__is-invalid @enderror" value="{{ old('password') }}">

                @error("password")
                        <p class="form__error-message">{{ $message }}</p>
                    @enderror
                    </div>

                <div class="form__field form__field--remember">
                    <input type="checkbox" name="remember" class="form__input form__input--remember">
                    <label for="remember" >Remember Me</label>
                </div>

                <input type="submit" value="SIGN IN" class="form__submit">
            </form>

            <p class="form-link">Not registered yet? <a href="/register" class="form-link__link">Sign Up Now!</a></p>
        </div>
    </main>
@endsection
