@extends("layout.layout")

@section('title', 'Home')

@section('navbar')
    @include('partials.navbar')
@endsection

@section("content")
    <main class="cart">
        <h1 class="cart__title">My Cart</h1>
        <div class="cart__desc">
            <h2 class="cart__total">Total Price: {{ $price }}</h2>
            <form action="/cart/checkout">
                <a href="" class="checkout">Checkout ({{ $quantity }})</a>
            </form>
        </div>

        <div class="cart__list">
            {{-- @foreach($cartItems as $item)
                <div class="product">
                    <p>{{ $item->name }}</p>
                </div>
            @endforeach --}}
        </div>
    </main>
@endsection
