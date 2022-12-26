@extends("layout.layout")

@section('title', 'Edit Profile')

@section('navbar')
    @include('partials.navbar')
@endsection

@section("content")
    <main style="color: white">
        <div>
            <h2>Update Profile</h2>
            <form action="{{ route('edit-profile') }}" method="POST" class="form">
                @csrf
                <div class="form__field form__field--username">
                    <label for="username" class="form__label">Username</label>
                    <input type="username" name="username" placeholder="Enter your username (5-20 characters)" autofocus class="form__input @error('username')form__is-invalid @enderror" value="{{ Auth::user()->username }}">
                    @error("username")
                        <p class="form__error-message">{{ $message }}</p>
                    @enderror
                </div>
                <div class="form__field form__field--email">
                    <label for="email" class="form__label">Email</label>
                    <input type="email" name="email" placeholder="Enter your email" class="form__input @error('email')form__is-invalid @enderror" value="{{ Auth::user()->email }}">
                    @error("email")
                        <p class="form__error-message">{{ $message }}</p>
                    @enderror
                </div>
                <div class="form__field form__field--phone">
                    <label for="phone_number" class="form__label">Phone Number</label>
                    <input type="text" name="phone_number" placeholder="Enter your phone number (10-13 numbers)" class="form__input @error('phone_number')form__is-invalid @enderror" value="{{ Auth::user()->phone_number }}">
                    @error("phone_number")
                        <p class="form__error-message">{{ $message }}</p>
                    @enderror
                </div>
                <div class="form__field form__field--address">
                    <label for="address" class="form__label">Address</label>
                    <input type="text" name="address" placeholder="Enter your address (min. 5 letters)" class="form__input @error('address')form__is-invalid @enderror" value="{{ Auth::user()->address }}">
                    @error("address")
                        <p class="form__error-message">{{ $message }}</p>
                    @enderror
                </div>
                <input type="submit" value="Save Update" class="form__submit">
            </form>
            <button><a href="{{ route('view-profile') }}">Back</a></button>
        </div>
    </main>
@endsection