@extends("layout.layout")

@section('title', 'Add Product')

@section('navbar')
    @include('partials.navbar')
@endsection

@section("content")
    <main class="add-item">
        <h1 class="add-item__title">Add Item</h1>

        <form action="{{ route('add-product') }}" method="POST" enctype="multipart/form-data" class="form">
            @csrf
            <div class="form__field">
                <label for="image" class="form__label">Clothes Image</label>
                <input type="file" name="image" class="form__input form__input--image @error('image')form__is-invalid @enderror">

                @error("image")
                    <p class="form__error-message">{{ $message }}</p>
                @enderror
            </div>

            <div class="form__field">
                <label for="name" class="form__label">Clothes Name</label>
                <input type="text" name="name" placeholder="(5-20 characters)" autofocus class="form__input @error('name')form__is-invalid @enderror" value="{{ old('name') }}">

                @error("name")
                    <p class="form__error-message">{{ $message }}</p>
                @enderror
            </div>

            <div class="form__field">
                <label for="description" class="form__label">Clothes Desc</label>
                <textarea name="description" class="form__input form__input--textarea" placeholder="(min 5 letters)" @error('description')form__is-invalid @enderror" >{{ old('description') }}</textarea>

                @error("description")
                    <p class="form__error-message">{{ $message }}</p>
                @enderror
            </div>

            <div class="form__field">
                <label for="price" class="form__label">Clothes Price</label>
                <input type="text" name="price" placeholder="&#8805; 1000" autofocus class="form__input form__input--noarrow @error('price')form__is-invalid @enderror" value="{{ old('price') }}">

                @error("price")
                    <p class="form__error-message">{{ $message }}</p>
                @enderror
            </div>

            <div class="form__field">
                <label for="stock" class="form__label">Clothes Stock</label>
                <input type="number" name="stock" placeholder="&#8805; 1" autofocus class="form__input @error('stock')form__is-invalid @enderror" value="{{ old('stock') }}">

                @error("stock")
                    <p class="form__error-message">{{ $message }}</p>
                @enderror
            </div>
            <input type="submit" value="ADD ITEM" class="form__submit">
        </form>
    </main>
@endsection
