@extends('site.layout.master')

@section('content')
    <section id="filter">
        <div class="container">
            <form method="get" action="{{route('index')}}">
                <div class="form-filter-top">
                    <div class="form-group">
                        <label>Marka</label>
                        <select data-route="{{route('filter.get-models')}}" placeholder="Marka" id="brand" name="brand"
                                class="select">
                            <option value="">Select a state...</option>
                            @foreach($brands as $brand)
                                <option @if(request('brand') == $brand->id) selected
                                        @endif value="{{$brand->id}}">{{$brand->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group" id="model-div">
                        <label>Model</label>
                        <div id="model-data">
                            <select placeholder="Model" id="model" name="model" class="select">
                                @if($models !== false)
                                    @foreach($models as $model)
                                        <option @if(request('model') == $model->id) selected
                                                @endif value="{{$model->id}}">{{$model->name}}</option>
                                    @endforeach
                                @endif
                                <option value="">Model</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group form-radio-group form-input">
                        <label>
                            <input type="radio" name="type" @if(request('type') == 'all') checked @endif checked  value="all">
                            <span class="form-checkmark">Hamısı</span>
                        </label>
                        <label>
                            <input type="radio" name="type" @if(request('type') == 'rent')  checked @endif value="rent">
                            <span class="form-checkmark">Rent a car</span>
                        </label>
                        <label>
                            <input type="radio" name="type" @if(request('type') == 'personal') checked
                                   @endif value="personal">
                            <span class="form-checkmark">Şəxsi</span>
                        </label>
                    </div>
                    <div class="form-group">
                        <label>Şəhər</label>
                        <select placeholder="Şəhər" name="city" class="select">
                            <option value="">Select a state...</option>
                            @foreach($cities as $item)
                                <option @if($item->id == request('city')) selected @endif value="{{$item->id}}">{{$item->name}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group form-multi-input">
                        <div class="form-group">
                            <label>Qiymət min.</label>
                            <input name="min_value" value="{{request('min_value')}}" type="text">
                        </div>
                        <div class="form-group">
                            <label>maks.</label>
                            <input name="max_value" value="{{request('max_value')}}" type="text">
                        </div>
                    </div>

                    <div class="form-group">
                        <label>Yanacaq növü</label>
                        <select placeholder="Yanacaq növü"  name="fuel_type" class="select">
                            <option @if(request('fuel_type') == '') selected @endif value="">Select a state...</option>
                            <option @if(request('fuel_type') == 'Benzin') selected @endif value="Benzin">Benzin</option>
                            <option @if(request('fuel_type') == 'Dizel') selected @endif value="Dizel">Dizel</option>
                            <option @if(request('fuel_type') == 'Qaz') selected @endif value="Qaz">Qaz</option>
                            <option @if(request('fuel_type') == 'Elektro') selected @endif value="Elektro">Elektro</option>
                            <option @if(request('fuel_type') == 'Hibrid') selected @endif value="Hibrid">Hibrid</option>
                            <option @if(request('fuel_type') == 'Plug-in-hibrid') selected @endif value="Plug-in-hibrid">Plug-in Hibrid</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Ban növü</label>
                        <select placeholder="Ban növü" name="body_style" class="select">
                            <option value="">Select a state...</option>
                            <option @if(request('body_style') == 'Avtobus') selected @endif value="Avtobus">Avtobus</option>
                            <option @if(request('body_style') == 'Dartqı') selected @endif value="Dartqı">Dartqı</option>
                            <option @if(request('body_style') == 'Furqon') selected @endif value="Furqon">Furqon</option>
                            <option @if(request('body_style') == 'Hetçbek') selected @endif value="Hetçbek">Hetçbek</option>
                            <option @if(request('body_style') == 'Kabriolet') selected @endif value="Kabriolet">Kabriolet</option>
                            <option @if(request('body_style') == 'Karvan') selected @endif value="Karvan">Karvan</option>
                            <option @if(request('body_style') == 'Kupe') selected @endif value="Kupe">Kupe</option>
                            <option @if(request('body_style') == 'Kvadrosikl') selected @endif value="Kvadrosikl">Kvadrosikl</option>
                            <option @if(request('body_style') == 'Liftbek') selected @endif value="Liftbek">Liftbek</option>
                            <option @if(request('body_style') == 'Mikroavtobus') selected @endif value="Mikroavtobus">Mikroavtobus</option>
                            <option @if(request('body_style') == 'Minivan') selected @endif value="Minivan">Minivan</option>
                            <option @if(request('body_style') == 'Moped') selected @endif value="Moped">Moped</option>
                            <option @if(request('body_style') == 'Motosiklet') selected @endif value="Motosiklet">Motosiklet</option>
                            <option @if(request('body_style') == 'Offroader') selected @endif value="Offroader/SUV">Offroader/SUV</option>
                            <option @if(request('body_style') == 'Pikap') selected @endif value="Pikap">Pikap</option>
                            <option @if(request('body_style') == 'Qolfkar') selected @endif value="Qolfkar">Qolfkar</option>
                            <option @if(request('body_style') == 'Rodster') selected @endif value="Rodster">Rodster</option>
                            <option @if(request('body_style') == 'Sedan') selected @endif value="Sedan">Sedan</option>
                            <option @if(request('body_style') == 'Universal') selected @endif value="Universal">Universal</option>
                            <option @if(request('body_style') == 'Van') selected @endif value="Van">Van</option>
                            <option @if(request('body_style') == 'Yuk-masini') selected @endif value="Yuk-masini">Yük maşını</option>
                        </select>
                    </div>

                    <div class="form-group form-multi-input">
                        <div class="form-group">
                            <label>İl min.</label>
                            <select placeholder="min" name="year_min" class="select">
                                <option value="">Select a state...</option>
                                @for($i = now()->year; $i > 1990; $i--)
                                    <option @if(request('year_min') == $i) selected @endif value="{{$i}}">{{$i}}</option>
                                @endfor
                            </select>
                        </div>
                        <div class="form-group">
                            <label>maks.</label>
                            <select placeholder="max" name="year_max" class="select">
                                <option value="">Select a state...</option>
                                @for($a = now()->year; $a > 1990 ; $a--)
                                    <option @if(request('year_max') == $a) selected @endif value="{{$a}}">{{$a}}</option>
                                @endfor
                            </select>
                        </div>
                    </div>
                </div>

                <div class="form-filter-middle">
                    <div class="form-group">
                        <label>Rəng</label>
                        <select placeholder="Rəng" class="multiple-option">
                            <option value="">Select a state...</option>
                            <option value="Qırmızı">Qırmızı</option>
                            <option value="Sarı">Sarı</option>
                            <option value="Yaşıl">Yaşıl</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Ötürücü</label>
                        <select placeholder="Ötürücü" class="multiple-option">
                            <option value="">Select a state...</option>
                            <option value="Arxa">Arxa</option>
                            <option value="Ön">Ön</option>
                            <option value="Tam">Tam</option>
                        </select>
                    </div>

                    <div class="form-group form-multi-input">
                        <div class="form-group">
                            <label>Həcm min.</label>
                            <select placeholder="min" class="select">
                                <option value="">Select a state...</option>
                                <option value="2000">2000</option>
                                <option value="2001">2001</option>
                                <option value="2002">2002</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>maks.</label>
                            <select placeholder="max" class="select">
                                <option value="">Select a state...</option>
                                <option value="2000">2000</option>
                                <option value="2001">2001</option>
                                <option value="2002">2002</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label>Sürətlər qutusu</label>
                        <select placeholder="Sürətlər qutusu" class="multiple-option">
                            <option value="">Select a state...</option>
                            <option value="Mexaniki">Mexaniki</option>
                            <option value="Avtomat">Avtomat</option>
                            <option value="Robotlaşdırılmış">Robotlaşdırılmış</option>
                            <option value="Variator">Variator</option>
                        </select>
                    </div>


                    <div class="form-group form-multi-input">
                        <div class="form-group">
                            <label>Güc (a.g.) min.</label>
                            <input type="text">
                        </div>
                        <div class="form-group">
                            <label>maks.</label>
                            <input type="text">
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Yerlərin sayı</label>
                        <select placeholder="Yerlərin sayı" class="multiple-option">
                            <option value="">Select a state...</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                            <option value="6">6</option>
                            <option value="7">7</option>
                            <option value="8+">8+</option>
                        </select>
                    </div>
                    <div class="form-group form-checkbox-group">
                        <p>Avtomobilin təchizatı</p>
                        <label>
                            <input type="checkbox" name="">
                            <span class="form-checkmark">Yüngül lehimli disklər</span>
                        </label>
                        <label>
                            <input type="checkbox" name="">
                            <span class="form-checkmark">ABS</span>
                        </label>
                        <label>
                            <input type="checkbox" name="">
                            <span class="form-checkmark">Lyuk</span>
                        </label>
                        <label>
                            <input type="checkbox" name="">
                            <span class="form-checkmark">Yağış sensoru</span>
                        </label>
                        <label>
                            <input type="checkbox" name="">
                            <span class="form-checkmark">Mərkəzi qapanma</span>
                        </label>
                        <label>
                            <input type="checkbox" name="">
                            <span class="form-checkmark">Park radarı</span>
                        </label>
                        <label>
                            <input type="checkbox" name="">
                            <span class="form-checkmark">Kondisioner</span>
                        </label>
                        <label>
                            <input type="checkbox" name="">
                            <span class="form-checkmark">Oturacaqların isidilməsi</span>
                        </label>
                        <label>
                            <input type="checkbox" name="">
                            <span class="form-checkmark">Dəri salon</span>
                        </label>
                        <label>
                            <input type="checkbox" name="">
                            <span class="form-checkmark">Ksenon lampalar</span>
                        </label>
                        <label>
                            <input type="checkbox" name="">
                            <span class="form-checkmark">Arxa görüntü kamerası</span>
                        </label>
                        <label>
                            <input type="checkbox" name="">
                            <span class="form-checkmark">Yan pərdələr</span>
                        </label>
                        <label>
                            <input type="checkbox" name="">
                            <span class="form-checkmark">Oturacaqların ventilyasiyası</span>
                        </label>
                    </div>
                </div>
                <div class="filter-bottom">
                    <div>Bugün <a href="">1871 yeni elan</a></div>
                    <div class="filter-btns">
                        <input type="reset" onclick="(window.location.href = '/')" value="Sıfırla">
{{--                        <button class="filter-btn">Daha çox filter</button>--}}
                        <button class="button">Elanları göstər</button>
                    </div>
                </div>
            </form>
        </div>
    </section>

    <section class="product-section">
        <div class="section-title">
            <div class="container">
                <h3 class="title">Son Elanlar</h3>
                <a href="" class="button">Bütün elanlar</a>
            </div>
        </div>
        <div class="container">
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
        <div class="section-title">
            <div class="container">
                <h3 class="title">Premium Elanlar</h3>
            </div>
        </div>
        <div class="container">
            <div class="card-block">
                <div class="product-card">
                    <a href="" class="card-link"></a>
                    <div class="card-header">
                        <div class="card-img">
                            <img src="{{asset('site')}}/assets/images/img.jpg"/>
                        </div>
                        <a href="" class="wish-list-icon">
                            <i class="fal fa-heart"></i>
                        </a>
                        <a href="" class="premium-icon"><img src="{{asset('site')}}/assets/images/premium.png"/></a>
                        <span class="card-label">Rent a car</span>
                    </div>
                    <div class="card-body">
                        <div class="card-price">63000 AZN</div>
                        <div class="card-name">Geely Tugella</div>
                        <div class="card-attributes">
                            <span>2022</span> ,
                            <span> 2.0 L</span>
                        </div>
                        <div class="card-date"><span>Bakı</span>, <span>17.01.2023 11:17</span></div>
                    </div>
                </div>
                <div class="product-card">
                    <a href="" class="card-link"></a>
                    <div class="card-header">
                        <div class="card-img">
                            <img src="{{asset('site')}}/assets/images/img.jpg"/>
                        </div>
                        <a href="" class="wish-list-icon">
                            <!-- <i class="fal fa-heart"></i> -->
                            <i class="fas fa-heart"></i>
                        </a>
                        <a href="" class="premium-icon"><img src="{{asset('site')}}/assets/images/premium.png"/></a>
                        <span class="card-label">Rent a car</span>
                    </div>
                    <div class="card-body">
                        <div class="card-price">63000 AZN</div>
                        <div class="card-name">Geely Tugella</div>
                        <div class="card-attributes">
                            <span>2022</span> ,
                            <span> 2.0 L</span>
                        </div>
                        <div class="card-date"><span>Bakı</span>, <span>17.01.2023 11:17</span></div>
                    </div>
                </div>
                <div class="product-card">
                    <a href="" class="card-link"></a>
                    <div class="card-header">
                        <div class="card-img">
                            <img src="{{asset('site')}}/assets/images/img.jpg"/>
                        </div>
                        <a href="" class="wish-list-icon">
                            <i class="fal fa-heart"></i>
                        </a>
                        <a href="" class="premium-icon"><img src="{{asset('site')}}/assets/images/premium.png"/></a>
                        <span class="card-label">Rent a car</span>
                    </div>
                    <div class="card-body">
                        <div class="card-price">63000 AZN</div>
                        <div class="card-name">Geely Tugella</div>
                        <div class="card-attributes">
                            <span>2022</span> ,
                            <span> 2.0 L</span>
                        </div>
                        <div class="card-date"><span>Bakı</span>, <span>17.01.2023 11:17</span></div>
                    </div>
                </div>
                <div class="product-card">
                    <a href="" class="card-link"></a>
                    <div class="card-header">
                        <div class="card-img">
                            <img src="{{asset('site')}}/assets/images/img.jpg"/>
                        </div>
                        <a href="" class="wish-list-icon">
                            <!-- <i class="fal fa-heart"></i> -->
                            <i class="fas fa-heart"></i>
                        </a>
                        <a href="" class="premium-icon"><img src="{{asset('site')}}/assets/images/premium.png"/></a>
                        <span class="card-label">Rent a car</span>
                    </div>
                    <div class="card-body">
                        <div class="card-price">63000 AZN</div>
                        <div class="card-name">Geely Tugella</div>
                        <div class="card-attributes">
                            <span>2022</span> ,
                            <span> 2.0 L</span>
                        </div>
                        <div class="card-date"><span>Bakı</span>, <span>17.01.2023 11:17</span></div>
                    </div>
                </div>
                <div class="product-card">
                    <a href="" class="card-link"></a>
                    <div class="card-header">
                        <div class="card-img">
                            <img src="{{asset('site')}}/assets/images/img.jpg"/>
                        </div>
                        <a href="" class="wish-list-icon">
                            <i class="fal fa-heart"></i>
                        </a>
                        <a href="" class="premium-icon"><img src="{{asset('site')}}/assets/images/premium.png"/></a>
                        <span class="card-label">Rent a car</span>
                    </div>
                    <div class="card-body">
                        <div class="card-price">63000 AZN</div>
                        <div class="card-name">Geely Tugella</div>
                        <div class="card-attributes">
                            <span>2022</span> ,
                            <span> 2.0 L</span>
                        </div>
                        <div class="card-date"><span>Bakı</span>, <span>17.01.2023 11:17</span></div>
                    </div>
                </div>
                <div class="product-card">
                    <a href="" class="card-link"></a>
                    <div class="card-header">
                        <div class="card-img">
                            <img src="{{asset('site')}}/assets/images/img.jpg"/>
                        </div>
                        <a href="" class="wish-list-icon">
                            <!-- <i class="fal fa-heart"></i> -->
                            <i class="fas fa-heart"></i>
                        </a>
                        <a href="" class="premium-icon"><img src="{{asset('site')}}/assets/images/premium.png"/></a>
                        <span class="card-label">Rent a car</span>
                    </div>
                    <div class="card-body">
                        <div class="card-price">63000 AZN</div>
                        <div class="card-name">Geely Tugella</div>
                        <div class="card-attributes">
                            <span>2022</span> ,
                            <span> 2.0 L</span>
                        </div>
                        <div class="card-date"><span>Bakı</span>, <span>17.01.2023 11:17</span></div>
                    </div>
                </div>
                <div class="premium-card">
                    <img src="{{asset('site')}}/assets/images/premium.png"/>
                    <p>Öz elanını Premium et!</p>
                    <span>1 gün - 10 AZN</span>
                    <button class="button">Premium et</button>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('scripts')
    <script>
        $(document).ready(function () {
            let brand = $('#brand');
            let model = $('#model');
            let modelData = $('#model-data')

            brand.on('change', function (e) {

                const formData = new FormData()
                formData.append('brand_id', e.target.value)
                // AJAX
                $.ajax({
                    url: $(this).attr('data-route'),
                    data: brand.serialize(),
                    type: 'GET',
                    processData: false,
                    contentType: false,
                    success: function (data) {
                        modelData.html(data)

                        $('#model').selectize()
                    },
                    error: function (err) {
                        root.innerHTML = 'FormData Object Send Failed!'
                    },
                })
            })
        })


    </script>
@endsection