@extends("layout.layout")

@section('title', 'Transaction History')

@section('navbar')
    @include('partials.navbar')
@endsection

@section("content")
    <main class="transaction">
        <h1 class="transaction__title">Check What You've Bought!</h1>

        <div class="transaction__list">
            @foreach ($transactions as $transaction)
                <div class="transaction__item">
                    <h4 class="transaction__created"><span class="transaction__created__label">Created At:</span> {{$transaction->created_at}}</h4>

                    <ul class="transaction__products">
                        @foreach ($transaction->transactionDetails as $transaction_detail)
                            <li class="transaction__product">
                                <span class="transaction__quantity">{{$transaction_detail->quantity}} pc(s)</span>

                                <span class="transaction__name">{{ $transaction_detail->product->name}}</span>

                                <span class="transaction__price">Rp. {{ number_format($transaction_detail->product->price, 2)}}</span>
                            </li>
                        @endforeach
                    </ul>

                    {{-- Will change this later --}}
                    <p class="transaction__total">Total Price: <span class="transaction__total__num">Rp. {{ $transaction->total_price }}</span></p>
                </div>
            @endforeach
        </div>
    </main>
@endsection
