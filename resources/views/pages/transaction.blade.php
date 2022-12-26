@extends("layout.layout")

@section('title', 'Transaction')

@section('navbar')
    @include('partials.navbar')
@endsection

@section("content")
    <main style="color: white;">
        <h1>Check What You've Bought!</h1>
        @foreach ($transactions as $transaction)
            <div style="margin-bottom: 10px; border: 1px solid white;">
                <h4>{{$transaction->created_at}}</h4>
                <ul>
                    @foreach ($transaction->transactionDetails as $transaction_detail)
                        <li>{{$transaction_detail->quantity}} {{ $transaction_detail->product->name}} {{ $transaction_detail->product->name}}</li>
                    @endforeach
                </ul>
                <p>Total Price: {{$transaction->total_price}}</p>
            </div>
        @endforeach
    </main>
@endsection
