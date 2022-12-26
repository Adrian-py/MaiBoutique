@extends("layout.layout")

@section('title', 'Profile')

@section('navbar')
    @include('partials.navbar')
@endsection

@section("content")
    <main class="profile">
            <h2 class="profile__title">My Profile</h2>
            <h3 class="profile__role @if(Auth::user()->role)profile__role--admin @endif">
                {{Auth::user()->role ? 'Admin' : 'Member'}}
            </h3>

            <p class="profile__detail profile__detail--username">Username:<br>
                <span class="profile__detail__value"> {{Auth::user()->username}}</span></p>

            <p class="profile__detail profile__detail--email">Email:<br><span class="profile__detail__value"> {{Auth::user()->email}}</span></p>

            <p class="profile__detail profile__detail--address">Address:<br><span class="profile__detail__value"> {{Auth::user()->address}}</span></p>

            <div class="profile__buttons">
                @if (Auth::user()->role === 0)
                        <a href="{{ route('view-edit-profile') }}" class="profile__edit-button profile__edit-button--profile">Edit Profile</a>
                @endif

                   <a href="{{ route('view-edit-password') }}" class="profile__edit-button profile__edit-button--password">Edit Password</a>
            </div>
        </div>
    </main>
@endsection
