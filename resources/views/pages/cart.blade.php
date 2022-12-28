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
                <h2 class="cart__total"><span class="cart__total__label">Total Price: </span> Rp. {{ number_format($total_price, 2) }}</h2>
                <form action="{{ route('checkout') }}" method="POST">
                    @csrf
                    <input type="submit" value="Checkout ({{ $total_quantity }})" class="cart__checkout">
                </form>
            </div>
        </div>

        @if(count($cart_details) === 0)
            <div class="cart__empty">
                <h3>Cart is empty!</h3>
            </div>
        @endif

        <div class="cart__list">
            @foreach($cart_details as $cart_detail)
                <div class="product">
                    <img src="{{ asset("/storage/images/$cart_detail->product->image") }}" alt="{{ $cart_detail->product->name }} Image" class="product__image">

                    <div class="product__desc product__desc--cart">
                        <h3 class="product__name">{{ $cart_detail->product->name }}</h3>
                        <p class="product__price">Rp. {{ number_format($cart_detail->product->price, 2) }}</p>
                        <p>Qty: {{ $cart_detail->quantity }}</p>

                        <div class="cart-product__buttons">
                            <a href="{{ route('view-edit-cart', Str::slug($cart_detail->product->name))}}" class="cart-product__button cart-product__button--edit">Edit</a>

                            <form action="{{ route('delete-cart', Str::slug($cart_detail->product->name)) }}" method="POST" class="cart-product__button cart-product__button--remove">
                                @csrf
                                <input type="submit" value="Remove">
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </main>
@endsection
