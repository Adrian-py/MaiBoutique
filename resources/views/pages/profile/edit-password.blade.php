@extends("layout.layout")

@section('title', 'Update Password')

@section('navbar')
    @include('partials.navbar')
@endsection

@section("content")
    <main style="color: white">
        <div>
            <h2>Update Profile</h2>
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
                <input type="submit" value="Save Update" class="form__submit">
            </form>
            <button><a href="{{ route('view-profile') }}">Back</a></button>
        </div>
    </main>
@endsection