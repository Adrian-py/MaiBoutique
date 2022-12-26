@extends("layout.layout")

@section('title', 'Profile')

@section('navbar')
    @include('partials.navbar')
@endsection

@section("content")
    <main style="color: white; height: 500px;">
        <div style="display: flex; justify-content: center; align-items: center; flex-direction: column;height: 100%;">
            <h4>My Profile</h4>
            <div style="background-color: orange;">
                {{Auth::user()->role === 1 ? 'Admin' : 'Member'}}
            </div>
            <p>Username: {{Auth::user()->username}}</p>
            <p>{{ Auth::user()->email }}</p>
            <p>{{ Auth::user()->address }}</p>
            <div>
                @if (Auth::user()->role === 0)
                    <button>
                        <a href="{{ route('view-edit-profile') }}">Edit Profile</a>
                    </button>
                @endif
                <button>
                   <a href="{{ route('view-edit-password') }}">Edit Password</a>
                </button>
            </div>
        </div>
    </main>
@endsection