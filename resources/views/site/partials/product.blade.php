<div class="card-block">
@foreach($carts as $product)

<div class="product-card">
    <a href="" class="card-link"></a>
    <div class="card-header">
        <div class="card-img">
            @foreach($product->attributes->images as $image)
            @if($loop->first)
                <img src="{{Voyager::image($image)}}"/>
            @endif
        @endforeach

        </div>
        <a onclick="remove_from_cart({{$product->id }})" class="wish-list-icon">
            <i class="fas fa-heart"></i>
        </a>
        <a href="" class="premium-icon">
            <img src="{{ asset('/site/assets/images/premium.png') }}"/>
        </a>
        <span class="card-label">Rent a car</span>
    </div>
    <div class="card-body">
        <div class="card-price">{{ $product->price }} AZN</div>
        <div class="card-name">{{ $product->attributes->brand }} {{ $product->attributes->model }}</div>
        <div class="card-attributes">
            <span>{{ $product->attributes->year }}</span> ,
            <span>{{ $product->attributes->engine }} L</span>
        </div>
        <div class="card-date"><span>Bakı</span>, <span>{{ $product->attributes->created_at }}</span></div>
    </div>
</div>



@endforeach
</div>