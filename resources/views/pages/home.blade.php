@extends("layout.layout")

@section('title', 'Home')

@section('navbar')
    @include('partials.navbar')
@endsection

@section("content")
    <main class="home">
        <h1 class="home__title">Find Your Best Clothes Here!</h1>
        <section class="home__list">
            @foreach ($productList as $product)
                @include('partials.product', [
                    'product' => $product
                ])
            @endforeach
        </section>
        @include('partials.pagination', [
            'list' => $productList
        ])
    </main>
@endsection
