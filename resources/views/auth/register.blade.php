@extends("layout.layout")

@section('title', 'Register')

@section("content")
    <main class="register">
        <div class="register__form">
            <h1 class="register__title">Register</h1>

            <form action="/register" method="POST" class="form">
                @csrf
                <div class="form__field form__field--username">
                    <label for="username" class="form__label">Username</label>
                    <input required type="username" name="username" placeholder="Enter your username!" autofocus class="form__input @error('username')form__is-invalid @enderror" value="{{ old('username') }}">

                    @error("username")
                        <p class="form__error-message">{{ $message }}</p>
                    @enderror
                </div>

                <div class="form__field form__field--email">
                    <label for="email" class="form__label">Email</label>
                    <input required type="email" name="email" placeholder="Enter your email!" class="form__input @error('email')form__is-invalid @enderror" value="{{ old('email') }}">

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

                <div class="form__field form__field--phone">
                    <label for="phone_number" class="form__label">Phone Number</label>
                    <input required type="number" name="phone_number" placeholder="Enter your phone number!" class="form__input @error('phone_number')form__is-invalid @enderror" value="{{ old('phone_number') }}">

                    @error("phone_number")
                        <p class="form__error-message">{{ $message }}</p>
                    @enderror
                </div>


                <div class="form__field form__field--address">
                    <label for="address" class="form__label">Address</label>
                    <input required type="text" name="address" placeholder="Enter your address!" class="form__input @error('address')form__is-invalid @enderror" value="{{ old('address') }}">

                    @error("address")
                        <p class="form__error-message">{{ $message }}</p>
                    @enderror
                </div>
                <input type="submit" value="SIGN UP" class="form__submit">
            </form>

            <p class="form-link">Already Have an Acccount? <a href="/login" class="form-link__link">Login Here!</a></p>
        </div>
    </main>
@endsection
