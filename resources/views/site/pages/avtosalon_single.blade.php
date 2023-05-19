@extends('site.layout.master')

@section('content')
  <!-- avtosalon catalog -->
  <section id="rentacar-catalog">
    <div class="container">
        <div class="breadcrumbs">
            <ul>
                <li><a href="{{ route('avtosalonlar') }}">Rent a car şirkətləri</a></li>
                <li> / {{ $user->name }}</li>
            </ul>
        </div>
        <div class="rentacar-catalog-info">
            <div class="rentacar-cover-photo">
                <img src="{{ asset('/site/assets/images/Cover.png') }}"/>
            </div>
            <div class="rentacar-catalog-bottom">
                <div class="rentacar-catalog-left">
                    <div class="rentacar-catalog-logo">
                        <img src="{{ Voyager::image($user->avatar) }}"/>
                    </div>
                    <a href="" class="button"> {{ $elanlar }} elan</a>
                </div>
                <div class="rentacar-catalog-right">
                    <h3 class="rentacar-catalog-title">{{ $user->name }}</h3>
                    <p class="rentacar-catalog-subtitle">
                        {{ $user->inform }}
                    </p>

                    <div>
                        <a href="https://www.google.com/maps/place/40%C2%B023'24.5%22N+49%C2%B053'12.7%22E/@40.390124,49.886863,15z/data=!4m5!3m4!1s0x0:0x83ece420adff19be!8m2!3d40.390124!4d49.886863" target="_blank" class="rentacar-catalog-location">
                            <img src="{{ asset('/site/assets/images/location.svg') }}"/>
                            Bakı ş., Xətai r., Babək pr. 28
                        </a>
                        <div class="rentacar-catalog-time">
                            <img src="{{ asset('/site/assets/images/clock.svg') }}"/>
                            <span>Hər gün: 09:00–19:00</span>
                        </div>
                    </div>

                    <div class="rentacar-catalog-phone-link">
                        <img src="{{ asset('/site/assets/images/phone.svg') }}">
                        <div>
                            <a href="tel:{{ $user->phone1 }}">{{ $user->phone1 }}</a>
                   
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="card-block">


            @foreach($rentalItems as $item)
                    @php($images = json_decode($item->images,true))
                    <div class="product-card">
                        <a href="{{route('car.index',[
	                                'car_model' => $item->carModel->slug,
	                                'rental_item' => $item->id
	                            ])}}" class="card-link"></a>
                        <div class="card-header">
                            <div class="card-img">
                                @foreach($images as $image)
                                    @if($loop->first)
                                        <img src="{{ Voyager::image($image) }}" />
                                    @endif
                                @endforeach
                            </div>
                            <a onclick="addtocart({{ $item->id }})" class="wish-list-icon">
                                @if(auth()->check())
                                @php($carts =  App\Wishlist::where('user_id',Auth::id())->where('rental_item_id',$item->id)->first())
                                @else
                                @php($carts =  \Cart::get($item->id))
                             @endif
                                    @if($carts === NULL)
                                    <i class="fal fa-heart"></i>
                                    @else
                                    <i class="fas fa-heart"></i>
                                    @endif
                            </a>
                            <!-- <a href="" class="premium-icon"><img src="{{asset('site')}}/assets/images/premium.png"/></a> -->
                            <span class="card-label">Rent a car</span>
                        </div>
                        <div class="card-body">
                            <div class="card-price">{{$item->price}} {{ $item->price_value }}</div>
                            <div class="card-name">{{$item->carModel->brand->name }} {{$item->carModel->name}} </div>
                            <div class="card-attributes">
                                <span>{{$item->year}}</span> ,
                                <span> {{$item->engine}} L</span>
                            </div>
                            <div class="card-date"><span>{{$item->city->name}}</span>,
                                <span>{{$item->created_at->format('d.m.Y H:s')}}</span></div>
                        </div>
                    </div>
                @endforeach


        </div>
    </div>
</section>
<!-- avtosalon catalog -->


    
@endsection