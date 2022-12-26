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
                <h2 class="cart__total">Total Price: {{ $total_price }}</h2>
                <form action="{{ route('checkout') }}" method="POST">
                    @csrf
                    <input type="submit" value="Checkout ({{ $total_quantity }})" class="cart__checkout">
                </form>
            </div>
        </div>

        <div class="cart__list">
            {{-- <div class="product">
                <img src="{{ asset("/storage/images/1") }}" alt=" Image" class="product__image">
                <div class="product__desc product__desc--cart">
                    <h3 class="product__name">test</h3>
                    <p class="product__price">Rp. 12038</p>

                    <div class="cart-product__buttons">
                        <a href="/cart/edit/shirt-21" class="cart-product__button cart-product__button--edit">Edit</a>
                        <a href="/product/remove" class="cart-product__button cart-product__button--remove">Remove</a>
                    </div>
                </div>
            </div> --}}
            @foreach($cart_details as $cart_detail)
                <div class="product">
                    <img src="{{ asset("/storage/images/$cart_detail->product->image") }}" alt="{{ $cart_detail->product->name }} Image" class="product__image">
                    <div class="product__desc">
                        <h3 class="product__name">{{ $cart_detail->product->name }}</h3>
                        <p class="product__price">Rp. {{ $cart_detail->product->price }}</p>
                        <p>Qty: {{ $cart_detail->quantity }}</p>
                        <a href="{{ route('view-product', Str::slug($cart_detail->product->name))}}" class="product__link">Detail</a>
                        <form action="{{ route('delete-cart', Str::slug($cart_detail->product->name)) }}" method="POST">
                            @csrf
                            <input type="submit" class="product__link" value="Remove from Cart">
                        </form>
                    </div>
                </div>
            @endforeach
        </div>
    </main>
@endsection
