@extends("layout.layout")

@section('title', $product->name)

@section('navbar')
@include('partials.navbar')
@endsection

@section("content")
    <main class="product-detail">
        {{-- If add to cart successful --}}
        @if(Session::get("add-success"))
            <div class="flash-message flash-message--success">
                <p>{{ session("add-success") }}</p>
            </div>
        @endif

        <header class="product-detail__header">
            <a href="/home" class="product-detail__back">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M18 17L13 12L18 7M11 17L6 12L11 7" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
                Back
            </a>
            <h1 class="product-detail__title">Product Detail</h1>
        </header>

        <div class="product-detail__product">
            <img src="{{ asset("storage/" . $product->image) }}" alt="" class="product-detail__image">
            <div class="product-detail__description">
                <h2 class="product-detail__name">{{ $product->name }}</h2>
                <h4 class="product-detail__price">Rp. {{ number_format($product->price, 2) }}</h4>
                <h3 class="product-detail__description">Product Detail</h3>
                <p class="product-detail__description__content">{{ $product->description }}</p>
                {{-- Admin Only --}}
                @if(Auth::user()->role === 1)
                    <form action="{{ route('delete-product', $product->slug) }}" method="POST">
                        @csrf
                        <button type="submit" class="product-detail__delete">DELETE ITEM</button>
                    </form>
                @else
                    @if(isset($user_cart_detail))
                        <form method="POST" action="{{ route('edit-cart', [$product]) }}" class="product-detail__quantity">
                            @csrf
                            <label for="quantity" class="product-detail__quantity__label">Quantity</label>
                            <div class="product-detail__quantity__form">
                                <input type="number" value="{{$user_cart_detail->quantity}}" class="product-detail__quantity__input form__input--noarrow" placeholder="0" name="quantity">

                                <button class="product-detail__quantity__submit" type="submit">
                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M5.00014 14H18.1359C19.1487 14 19.6551 14 20.0582 13.8112C20.4134 13.6448 20.7118 13.3777 20.9163 13.0432C21.1485 12.6633 21.2044 12.16 21.3163 11.1534L21.9013 5.88835C21.9355 5.58088 21.9525 5.42715 21.9031 5.30816C21.8597 5.20366 21.7821 5.11697 21.683 5.06228C21.5702 5 21.4155 5 21.1062 5H4.50014M2 2H3.24844C3.51306 2 3.64537 2 3.74889 2.05032C3.84002 2.09463 3.91554 2.16557 3.96544 2.25376C4.02212 2.35394 4.03037 2.48599 4.04688 2.7501L4.95312 17.2499C4.96963 17.514 4.97788 17.6461 5.03456 17.7462C5.08446 17.8344 5.15998 17.9054 5.25111 17.9497C5.35463 18 5.48694 18 5.75156 18H19M7.5 21.5H7.51M16.5 21.5H16.51M8 21.5C8 21.7761 7.77614 22 7.5 22C7.22386 22 7 21.7761 7 21.5C7 21.2239 7.22386 21 7.5 21C7.77614 21 8 21.2239 8 21.5ZM17 21.5C17 21.7761 16.7761 22 16.5 22C16.2239 22 16 21.7761 16 21.5C16 21.2239 16.2239 21 16.5 21C16.7761 21 17 21.2239 17 21.5Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                    </svg>
                                    Update Cart
                                </button>
                            </div>

                            @error('quantity')
                                <p class="form__error-message">{{ $message }}</p>
                            @enderror
                        </form>
                    @else
                        <form method="POST" action="{{ route('add-cart')}}" class="product-detail__quantity">
                            @csrf
                            <input type="number" value={{ $product->id }} class="hidden" name="product_id">

                            <label for="quantity" class="product-detail__quantity__label">Quantity</label>

                            <div class="product-detail__quantity__form">
                                <input type="number" class="product-detail__quantity__input form__input--noarrow" placeholder="0" name="quantity">

                                <button class="product-detail__quantity__submit" type="submit">
                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M5.00014 14H18.1359C19.1487 14 19.6551 14 20.0582 13.8112C20.4134 13.6448 20.7118 13.3777 20.9163 13.0432C21.1485 12.6633 21.2044 12.16 21.3163 11.1534L21.9013 5.88835C21.9355 5.58088 21.9525 5.42715 21.9031 5.30816C21.8597 5.20366 21.7821 5.11697 21.683 5.06228C21.5702 5 21.4155 5 21.1062 5H4.50014M2 2H3.24844C3.51306 2 3.64537 2 3.74889 2.05032C3.84002 2.09463 3.91554 2.16557 3.96544 2.25376C4.02212 2.35394 4.03037 2.48599 4.04688 2.7501L4.95312 17.2499C4.96963 17.514 4.97788 17.6461 5.03456 17.7462C5.08446 17.8344 5.15998 17.9054 5.25111 17.9497C5.35463 18 5.48694 18 5.75156 18H19M7.5 21.5H7.51M16.5 21.5H16.51M8 21.5C8 21.7761 7.77614 22 7.5 22C7.22386 22 7 21.7761 7 21.5C7 21.2239 7.22386 21 7.5 21C7.77614 21 8 21.2239 8 21.5ZM17 21.5C17 21.7761 16.7761 22 16.5 22C16.2239 22 16 21.7761 16 21.5C16 21.2239 16.2239 21 16.5 21C16.7761 21 17 21.2239 17 21.5Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                    </svg>
                                    ADD TO CART
                                </button>
                            </div>

                            @error('quantity')
                                <p class="form__error-message">{{ $message }}</p>
                            @enderror
                        </form>
                    @endif
                @endif
            </div>
        </div>
    </main>
@endsection
