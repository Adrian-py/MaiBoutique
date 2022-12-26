@extends("layout.layout")

@section('title', 'Update Password')

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

            <h1 class="edit-profile__title">Update Password</h1>
        </div>

        <form action="{{ route('edit-password') }}" method="POST" class="form">
            @csrf
            <div class="form__field form__field--password">
                <label for="old_password" class="form__label">Old Password</label>
                <input type="password" name="old_password" placeholder="Your old password (5-20 characters)" class="form__input @error('old_password')form__is-invalid @enderror" value="{{ old('old_password') }}">
                @error("old_password")
                    <p class="form__error-message">{{ $message }}</p>
                @enderror
            </div>

            <div class="form__field form__field--password">
                <label for="new_password" class="form__label">New Password</label>
                <input type="password" name="new_password" placeholder="Your new password (5-20 characters)" class="form__input @error('new_password')form__is-invalid @enderror" value="{{ old('new_password') }}">
                @error("new_password")
                    <p class="form__error-message">{{ $message }}</p>
                @enderror
            </div>

            <input type="submit" value="Change Password" class="form__submit">
        </form>
    </main>
@endsection
