<div class="card flex-column p-2 w-75">
    <p class="fw-bold">{{$transaction->transactionDate}}</p>
    @php
        $total = 0;
    @endphp
        @foreach ($transaction->transactionDetail as $transDetail)
            @php
                $total += $transDetail->product->price * $transDetail->quantity;
            @endphp
            <p>{{$transDetail->quantity}} pc(s) {{$transDetail->product->productName}}  {{$transDetail->product->price}}</p>
        @endforeach
    <p class="fw-bold">Total Price {{$total}}</p>
</div>
