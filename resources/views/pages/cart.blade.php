@extends("layout.layout")

@section('title', 'Home')

@section('navbar')
    @include('partials.navbar')
@endsection

@section("content")
    <main class="cart">
        <div class="cart__header">
            <h1 class="cart__title">My Cart</h1>
            <div class="cart__desc">
                <h2 class="cart__total">Total Price: {{ $price }}</h2>
                <a href="/cart/checkout" class="cart__checkout">Checkout ({{ $quantity }})</a>
            </div>
        </div>

        <div class="cart__list">
            <div class="product">
                <img src="{{ asset("/storage/images/1") }}" alt=" Image" class="product__image">
                <div class="product__desc">
                    <h3 class="product__name">test</h3>
                    <p class="product__price">Rp. 12038</p>
                    {{-- <a href="/product/{{ Str::slug($product->name) }}" class="product__link">Detail</a> --}}
                </div>
            </div>
            {{-- @foreach($cartItems as $product)
                <div class="product">
                    <img src="{{ asset("/storage/images/$product->image") }}" alt="{{ $product->name }} Image" class="product__image">
                    <div class="product__desc">
                        <h3 class="product__name">{{ $product->name }}</h3>
                        <p class="product__price">Rp. {{ $product->price }}</p>
                        <a href="/product/{{ Str::slug($product->name) }}" class="product__link">Detail</a>
                    </div>
                </div>
            @endforeach --}}
        </div>
    </main>
@endsection
