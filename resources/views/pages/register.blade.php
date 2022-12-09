@extends("layout.layout")

@section("content")
    <main class="register">
        <div class="register__form">
            <h1 class="register__title">Register</h1>

            <form action="/register" method="POST" class="form">
                @csrf
                <div class="form__field form__field--username">
                    <label for="username">Username</label>
                    <input type="username" name="username" placeholder="Enter your username!" autofocus>
                </div>

                <div class="form__field form__field--email">
                    <label for="email">Email</label>
                    <input type="email" name="email" placeholder="Enter your email!">
                </div>

                <div class="form__field form__field--password">
                    <label for="password">Password</label>
                    <input type="password" name="password" placeholder="Enter your password!">
                </div>

                <div class="form__field form__field--phone">
                    <label for="phone">Phone Number</label>
                    <input type="number" name="phone" placeholder="Enter your phone number!">
                </div>


                <div class="form__field form__field--address">
                    <label for="address">Address</label>
                    <input type="text" name="address" placeholder="Enter your address!">
                </div>



                <input type="submit" value="SIGN UP" class="form__submit">
            </form>

            <p class="form-link">Already Have an Acccount? <a href="/login" class="form-link__link">Login Here!</a></p>
        </div>
    </main>
@endsection
