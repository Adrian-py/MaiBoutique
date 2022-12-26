@extends("layout.layout")

@section('title', 'Edit Profile')

@section('navbar')
    @include('partials.navbar')
@endsection

@section("content")
    <main class="edit-profile">
        <div class="edit-profile__header">
            <a href="{{ route("view-profile") }}" class="edit-profile__back">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M18 17L13 12L18 7M11 17L6 12L11 7" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
                Back
            </a>

            <h1 class="edit-profile__title">Update Profile</h1>
        </div>

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

            <input type="submit" value="Update Profile" class="form__submit">
        </form>
    </main>
@endsection
