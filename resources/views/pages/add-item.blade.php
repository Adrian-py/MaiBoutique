@extends("layout.layout")

@section("title", "Add Item")

@section("navbar")
    @include("partials.navbar")
@endsection

@section("content")
    <main class="add-item">
        <h1 class="add-item__title">Add Item</h1>

        <form action="{{ route('add') }}" method="POST" class="form">
            @csrf
            <div class="form__field">
                <label for="image" class="form__label">Clothes Image</label>
                <input type="file" name="image" class="form__input form__input--image">
                @error("image")
                    <p class="form__error-message">{{ $message }}</p>
                @enderror
            </div>

            <div class="form__field">
                <label for="name" class="form__label">Clothes Name</label>
                <input type="text" name="name" class="form__input" placeholder="(5-20 letters)">
                @error("name")
                    <p class="form__error-message">{{ $message }}</p>
                @enderror
            </div>

            <div class="form__field">
                <label for="description" class="form__label">Clothes Desc</label>
                <textarea name="description" class="form__input form__input--textarea" placeholder="(min 5 letters)"></textarea>
                @error("description")
                    <p class="form__error-message">{{ $message }}</p>
                @enderror
            </div>

            <div class="form__field">
                <label for="price" class="form__label">Clothes Price</label>
                <input type="number" name="price" class="form__input form__input--noarrow" placeholder=">= 1000">
                @error("price")
                    <p class="form__error-message">{{ $message }}</p>
                @enderror
            </div>

            <div class="form__field">
                <label for="stock" class="form__label">Clothes Stock</label>
                <input type="number" name="stock" class="form__input form__input--arrow" placeholder=">= 1" min="1" value="1">
                @error("stock")
                    <p class="form__error-message">{{ $message }}</p>
                @enderror
            </div>

            <input type="submit" value="ADD ITEM" class="form__submit">
        </form>
    </main>
@endsection
