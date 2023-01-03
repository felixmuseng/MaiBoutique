<div class="col-lg-3 col-md-4 col-sm-6 col-xs-12 mb-2">
    <div class="card h-100">
        <div class="card-body"">
            <img src="{{ asset('/storage/productimg/'.$product->image) }}" class="card-img-top w-100" style="height: 256px; ">
            <h4 class="card-title">{{ $product->productName }}</h4>
            <p class="card-text">{{ $product->price }}</p>
            <a class="btn btn-primary" href="/product/{{ $product->id }}">More Detail</a>
        </div>
    </div>
</div>
