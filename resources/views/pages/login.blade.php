@extends("layout.layout")

@section("content")
    <main class="login">
        <div class="login__form">
            <h1 class="login__title">Sign In</h1>

            <form action="/login" method="POST" class="form">
                @csrf
                <div class="form__field form__field--email">
                    <label for="email">Email</label>
                    <input type="email" name="email" placeholder="Enter your email!" autofocus>
                </div>

                <div class="form__field form__field--password">
                    <label for="password">Password</label>
                    <input type="password" name="password" placeholder="Enter your password!">
                </div>

                <div class="form__field form__field--remember">
                    <input type="checkbox" name="remember">
                    <label for="remember">Remember Me</label>
                </div>

                <input type="submit" value="SIGN IN" class="form__submit">
            </form>

            <p class="form-link">Not registered yet? <a href="/register" class="form-link__link">Sign Up Now!</a></p>
        </div>
    </main>
@endsection
