@extends('site.layout.master')

@section('content')
    <!-- Catalog start -->
    <section class="product-section">
        <div class="section-title">
            <div class="container">
                <h3 class="title">Premium Elanlar</h3>
                <a href="" class="button">Bütün elanlar</a>
            </div>
        </div>
        <div class="container">
            <div class="card-block">
                @foreach($rentalItems as $item)
                    @php($images = json_decode($item->images))
                    <div class="product-card">
                        <a href="{{route('car.index',[
	                                'car_model' => $item->carModel->slug,
	                                'rental_item' => $item->id
	                            ])}}" class="card-link"></a>
                        <div class="card-header">
                            <div class="card-img">
                                @foreach($images as $image)
                                    @if($loop->first)
                                        <img src="{{Voyager::image($image)}}"/>
                                    @endif
                                @endforeach
                            </div>
                            <a href="{{route('car.index',[
	                                'car_model' => $item->carModel->slug,
	                                'rental_item' => $item->id
	                            ])}}" class="wish-list-icon">
                                <i class="fal fa-heart"></i>
                            </a>
                            <!-- <a href="" class="premium-icon"><img src="{{asset('site')}}/assets/images/premium.png"/></a> -->
                            <span class="card-label">Rent a car</span>
                        </div>
                        <div class="card-body">
                            <div class="card-price">{{$item->price}} AZN</div>
                            <div class="card-name">{{$item->carModel->brand->name}} {{$item->carModel->name}}</div>
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
            <div class="">{!! $rentalItems->links() !!}</div>
        </div>

        <div class="section-title">
            <div class="container">
                <h3 class="title">Elanlar</h3>
                <select name="sort_by" id="sort_by" class="nice-select">
                    <option @selected(request('sort_by') == 'by_date') value="by_date">Tarixə görə</option>
                    <option @selected(request('sort_by') == 'cheap_first') value="cheap_first">Əvvəlcə ucuz</option>
                    <option @selected(request('sort_by') == 'expensive_first') value="expensive_first">Əvvəlcə bahalı</option>
                    <option @selected(request('sort_by') == 'by_year') value="by_year">Buraxılış ili</option>
                </select>
            </div>

        </div>

        <div class="container">

            <div class="card-block">
                @foreach($rentalItems as $item)
                    @php($images = json_decode($item->images))
                    <div class="product-card">
                        <a href="{{route('car.index',[
	                                'car_model' => $item->carModel->slug,
	                                'rental_item' => $item->id
	                            ])}}" class="card-link"></a>
                        <div class="card-header">
                            <div class="card-img">
                                @foreach($images as $image)
                                    @if($loop->first)
                                        <img src="{{Voyager::image($image)}}"/>
                                    @endif
                                @endforeach
                            </div>
                            <a href="{{route('car.index',[
	                                'car_model' => $item->carModel->slug,
	                                'rental_item' => $item->id
	                            ])}}" class="wish-list-icon">
                                <i class="fal fa-heart"></i>
                            </a>
                            <!-- <a href="" class="premium-icon"><img src="{{asset('site')}}/assets/images/premium.png"/></a> -->
                            <span class="card-label">Rent a car</span>
                        </div>
                        <div class="card-body">
                            <div class="card-price">{{$item->price}} AZN</div>
                            <div class="card-name">{{$item->carModel->brand->name}} {{$item->carModel->name}}</div>
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
            <div class="">{!! $rentalItems->links() !!}</div>
        </div>
    </section>
    <!-- Catalog end -->

@endsection

@section('scripts')
    <script>
        $(document).ready(function () {
            $('#sort_by').change(function (){
               window.location.href = '?sort_by='+$(this).val()
            });
        })
    </script>
@endsection