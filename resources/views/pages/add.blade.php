@extends("layout.layout")

@section('title', 'Add Product')

@section('navbar')
    @include('partials.navbar')
@endsection

@section("content")
    <main style="color: white;" >
        <div>
            <h4>Add Item</h4>
            <form action="{{ route('add-product') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form__field">
                    <label for="image" class="form__label">Clothes Image</label>
                    <input type="file" name="image" class="form__input @error('image')form__is-invalid @enderror">
                    @error("image")
                        <p class="form__error-message">{{ $message }}</p>
                    @enderror
                </div>
                <div class="form__field">
                    <label for="name" class="form__label">Clothes Name</label>
                    <input type="text" name="name" placeholder="Clothes name (5-20 characters)" autofocus class="form__input @error('name')form__is-invalid @enderror" value="{{ old('name') }}">
                    @error("name")
                        <p class="form__error-message">{{ $message }}</p>
                    @enderror
                </div>
                <div class="form__field">
                    <label for="description" class="form__label">Clothes Desc</label>
                    <input type="text" name="description" placeholder="Clothes description (min 5 characters)" autofocus class="form__input @error('description')form__is-invalid @enderror" value="{{ old('description') }}">
                    @error("description")
                        <p class="form__error-message">{{ $message }}</p>
                    @enderror
                </div>
                <div class="form__field">
                    <label for="price" class="form__label">Clothes Price</label>
                    <input type="text" name="price" placeholder="Clothes price (&#8805; 1000)" autofocus class="form__input @error('price')form__is-invalid @enderror" value="{{ old('price') }}">
                    @error("price")
                        <p class="form__error-message">{{ $message }}</p>
                    @enderror
                </div>
                <div class="form__field">
                    <label for="stock" class="form__label">Clothes Stock</label>
                    <input type="number" name="stock" placeholder="Clothes stock (&#8805; 1)" autofocus class="form__input @error('stock')form__is-invalid @enderror" value="{{ old('stock') }}">
                    @error("stock")
                        <p class="form__error-message">{{ $message }}</p>
                    @enderror
                </div>
                <input type="submit" value="Add" class="form__submit">
            </form>
        </div>
    </main>
@endsection
