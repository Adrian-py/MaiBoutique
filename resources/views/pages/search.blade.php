@extends("layout.layout")

@section("title", "Search Product")

@section("navbar")
    @include('partials.navbar')
@endsection

@section("content")
    <main class="search">
        <h1 class="search__title">Search Your Favorite Clothes!</h1>

        <form action="{{ route("search") }}" method="GET" class="search__form">
            <input type="text" placeholder="Enter keyword here!" class="search__input" name="search" value="{{ old("search") }}">

            <button class="search__submit">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" class="search__icon">
                    <path d="M21 21L16.65 16.65M19 11C19 15.4183 15.4183 19 11 19C6.58172 19 3 15.4183 3 11C3 6.58172 6.58172 3 11 3C15.4183 3 19 6.58172 19 11Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>

                Search
            </button>
        </form>

        <div class="search__list">
            @foreach ($product_list as $product)
                <div class="product">
                    <img src="{{ asset("/storage/images/$product->image") }}" alt="{{ $product->name }} Image" class="product__image">
                    <div class="product__desc">
                        <h3 class="product__name">{{ $product->name }}</h3>
                        <p class="product__price">Rp. {{ number_format($product->price, 2) }}</p>
                        <a href="/product/{{ Str::slug($product->name) }}" class="product__link">Detail</a>
                    </div>
                </div>
            @endforeach
        </div>

        <div class="pagination">
            <a href="{{ $product_list->previousPageUrl() }}" class="pagination__link">Previous</a>
            <div class="pagination__pages">
                @if($product_list->currentPage() > 6)
                    @for($i = 1; $i <= 3; $i++)
                        <a class="pagination__page-link" href="{{ $product_list->url($i) }}">{{ $i }}</a>
                    @endfor
                    <p>...</p>
                @endif

                @for($i = $product_list->currentPage()-3; $i < $product_list->currentPage(); $i++)
                    @if($i >0)
                        <a class="pagination__page-link" href="{{ $product_list->url($i) }}">{{ $i }}</a>
                    @endif
                @endfor

                @for($i = $product_list->currentPage(); $i <= $product_list->lastPage() && $i<=$product_list->currentPage()+3; $i++)
                    <a class="pagination__page-link" href="{{ $product_list->url($i) }}">{{ $i }}</a>
                @endfor
            </div>
            <a href="{{ $product_list->nextPageUrl() }}" class="pagination__link">Next</a>
        </div>
    </main>
@endsection
