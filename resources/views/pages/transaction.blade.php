@extends("layout.layout")

@section('title', 'Transaction History')

@section('navbar')
    @include('partials.navbar')
@endsection

@section("content")
    <main class="transaction">
        {{-- if checkout successfull --}}
        @if(Session::get('success'))
            <div class="flash-message flash-message--success">
                <p>{{ session("success")}}</p>
            </div>
        @endif

        <h1 class="transaction__title">Check What You've Bought!</h1>

        @if(count($transactions) === 0)
            <div class="empty empty--transactions">
                <h3 class="empty__title">You have not made any transactions!</h3>
            </div>
        @endif

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
                    <p class="transaction__total">Total Price: <span class="transaction__total__num">Rp. {{ number_format($transaction->total_price, 2) }}</span></p>
                </div>
            @endforeach
        </div>
    </main>
@endsection
