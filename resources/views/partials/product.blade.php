<div class="product">
    <img src="{{ asset("storage/" . $product->image) }}" alt="{{ $product->name }} Image" class="product__image">
    <div class="product__desc">
        <h3 class="product__name">{{ $product->name }}</h3>
        <p class="product__price">Rp. {{ number_format($product->price, 2) }}</p>
        <a href="/product/{{ Str::slug($product->name) }}" class="product__link">Detail</a>
    </div>
</div>