<div class="card-block">
@foreach($carts as $cart)

<div class="product-card">
    <a href="" class="card-link"></a>
    <div class="card-header">
        <div class="card-img">
            @foreach(json_decode($cart['product']['images']) as $image)
            @if($loop->first)
                <img src="{{Voyager::image($image)}}"/>
            @endif
        @endforeach
        </div>
        <a  onclick="remove_from_cart({{$cart->id}})"
            class="wish-list-icon">
            <i class="fas fa-heart"></i>
        </a>
        <a href="" class="premium-icon"><img src="{{ asset('/site/assets/images/premium.png') }}"/></a>
        <span class="card-label">Rent a car</span>
    </div>
    <div class="card-body">
        <div class="card-price">{{ $cart['product']['price'] }} AZN</div>
        <div class="card-name">{{ $cart['product']->carModel->brand->name }} {{ $cart['product']->carModel->name}}</div>
        <div class="card-attributes">
            <span>{{ $cart['product']['year'] }}</span> ,
            <span> {{ $cart['product']['engine'] }} </span>
        </div>
        <div class="card-date"><span>{{ $cart['product']->city->name}}</span>, <span>{{ $cart['product']['created_at']->format('d.m.Y H:s') }} </span></div>
    </div>
</div>




@endforeach
</div>