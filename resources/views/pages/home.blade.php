@extends("layout.layout")

@section("content")
    <main class="home">
        <h1 class="home__title">Find Your Best Clothes Here!</h1>
        <section class="home__list">
            @foreach ($productList as $product)
                <div class="product">
                    <img src="{{ asset("/storage/images/$product->image") }}" alt="{{ $product->name }} Image" class="product__image">
                    <div class="product__desc">
                        <h3 class="product__name">{{ $product->name }}</h3>
                        <p class="product__price">Rp. {{ $product->price }}</p>
                        <a href="/product/{{ Str::slug($product->name) }}" class="product__link">Detail</a>
                    </div>
                </div>
            @endforeach
        </section>
        {{-- {{ $productList->links() }} --}}
        <div class="pagination">
            <a href="{{ $productList->previousPageUrl() }}" class="pagination__link">Previous</a>
            <div class="pagination__pages">
                @if($productList->currentPage() > 6)
                    @for($i = 1; $i <= 3; $i++)
                        <a class="pagination__page-link" href="{{ $productList->url($i) }}">{{ $i }}</a>
                    @endfor
                    <p>...</p>
                @endif

                @for($i = $productList->currentPage()-3; $i < $productList->currentPage(); $i++)
                    @if($i >0)
                        <a class="pagination__page-link" href="{{ $productList->url($i) }}">{{ $i }}</a>
                    @endif
                @endfor

                @for($i = $productList->currentPage(); $i <= $productList->lastPage() && $i<=$productList->currentPage()+3; $i++)
                    <a class="pagination__page-link" href="{{ $productList->url($i) }}">{{ $i }}</a>
                @endfor
            </div>
            <a href="{{ $productList->nextPageUrl() }}" class="pagination__link">Next</a>
        </div>
    </main>
@endsection
