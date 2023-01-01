@extends("layout.layout")

@section("title", "Search Product")

@section("navbar")
    @include('partials.navbar')
@endsection

@section("content")
    <main class="search">
        <h1 class="search__title">Search Your Favorite Clothes!</h1>

        <form action="{{ route("search") }}" method="GET" class="search__form">
            <input type="text" placeholder="Enter keyword here!" class="search__input" name="search" value="{{ request('search') }}">
            <button class="search__submit">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" class="search__icon">
                    <path d="M21 21L16.65 16.65M19 11C19 15.4183 15.4183 19 11 19C6.58172 19 3 15.4183 3 11C3 6.58172 6.58172 3 11 3C15.4183 3 19 6.58172 19 11Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
                Search
            </button>
        </form>

        @if ($product_list->isEmpty())
            <div class="empty">
                <h3 class="empty__title">No product found!</h3>
            </div>
        @else
            <div class="search__list">
                @foreach ($product_list as $product)
                    @include('partials.product', [
                        'product' => $product
                    ])
                @endforeach
            </div>
        @endif

        @include('partials.pagination', [
            'list' => $product_list
        ])
    </main>
@endsection
