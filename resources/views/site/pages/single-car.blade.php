@extends('site.layout.master')

@section('content')
    <!-- Single page start -->
    <section id="product-page">
        <div class="container">
            <div class="breadcrumbs">
                <ul>
                    <li><a href="avtosalonlar.html">{{$rentalItem->carModel->brand->name}}</a></li>
                    <li>/ <a href="">{{$rentalItem->carModel?->name}}</a></li>
                    <li>/ Elan № {{$rentalItem->id}}</li>
                </ul>
            </div>

            <div class="product-section">
                <div class="product-top">
                    <h4 class="product-title">{{$rentalItem->carModel->brand->name}} {{$rentalItem->carModel->name}},
                        {{$rentalItem->fuel}} L, {{$rentalItem->year}} il, {{$rentalItem->mileage}} km</h4>
                    <a href="" class="wish-list-icon">
                        <i class="fal fa-heart"></i>
                        Seçilmişlərə əlavə et
                    </a>
                </div>

                @php
                    $images = json_decode($rentalItem->images);
                @endphp
                <div class="product-left">
                    <div class="product-images">
                        <div style="--swiper-navigation-color: #fff; --swiper-pagination-color: #fff" class="swiper mySwiper2">
                            <div class="swiper-wrapper">

                                @foreach($images as $image)
                                    <div class="swiper-slide">
                                        <a class="img-galery fancybox" href="{{Voyager::image($image)}}" data-fancybox="mygallery"></a>
                                        <img src="{{Voyager::image($image)}}" />
                                    </div>
                                @endforeach
                            </div>
                            <div class="swiper-button-next"></div>
                            <div class="swiper-button-prev"></div>
                        </div>
                        <div thumbsSlider="" class="swiper mySwiper">
                            <div class="swiper-wrapper">
                                @foreach($images as $image)
                                <div class="swiper-slide">
                                    <img src="{{Voyager::image($image)}}" />
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <div class="product-bottom">
                        <div class="product-statistics">
                            <span>Yeniləndi: {{$rentalItem->updated_at->format('d.m.Y')}}</span>
                            <span>Baxışların sayı: {{$rentalItem->view_count}}</span>
                        </div>
                        <hr/>
                        <div class="product-properties">
                            <div>
                                <span class="product-properties-name">Şəhər</span>
                                <span class="product-properties-value">{{$rentalItem->city->name}}</span>
                            </div>
                            <div>
                                <span class="product-properties-name">Marka</span>
                                <a href="" class="product-properties-value">{{$rentalItem->carModel->brand->name}}</a>
                            </div>
                            <div>
                                <span class="product-properties-name">Model</span>
                                <a href="" class="product-properties-value">{{$rentalItem->carModel->name}}</a>
                            </div>
                            <div>
                                <span class="product-properties-name">Buraxılış ili</span>
                                <a href="" class="product-properties-value">{{$rentalItem->year}}</a>
                            </div>
                            <div>
                                <span class="product-properties-name">Ban növü</span>
                                <span class="product-properties-value">{{$rentalItem->type}}</span>
                            </div>
                            <div>
                                <span class="product-properties-name">Rəng</span>
                                <span class="product-properties-value">{{$rentalItem->color}}</span>
                            </div>
                            <div>
                                <span class="product-properties-name">Mühərrik</span>
                                <span class="product-properties-value">{{$rentalItem->engine}} L/{{$rentalItem->horse_power}} a.g./{{$rentalItem->fuel}}</span>
                            </div>
                            <div>
                                <span class="product-properties-name">Sürətlər qutusu</span>
                                <span class="product-properties-value">{{$rentalItem->gear_box}}</span>
                            </div>
                            <div>
                                <span class="product-properties-name">Ötürücü</span>
                                <span class="product-properties-value">{{$rentalItem->gear}}</span>
                            </div>
                            <div>
                                <span class="product-properties-name">Yerlərin sayı</span>
                                <span class="product-properties-value">{{$rentalItem->seats}}</span>
                            </div>
                        </div>
                        <hr/>
                        <div class="product-description">
                            <div class="product-description-content">
                                <p>
                                    {!! $rentalItem->informations !!}
                                </p>
                            </div>

                            <span class="product-description-btn">Davamını oxu</span>
                        </div>
                        <hr/>
                        <div class="product-extras">
                            <span>Yüngül lehimli disklər</span>
                            <span>ABS</span>
                            <span>Yağış sensoru</span>
                            <span>Mərkəzi qapanma</span>
                            <span>Kondisioner</span>
                            <span>Oturacaqların isidilməsi</span>
                            <span>Dəri salon</span>
                            <span>Yan pərdələr</span>
                        </div>
                        <hr/>
                        <div class="product-actions">
                            <div>
                                <button>Düzəliş et</button>
                                <button>Elanı sil</button>
                            </div>
                            <span>Elanın nömrəsi: {{$rentalItem->id}}</span>
                        </div>
                    </div>
                </div>
                <div class="product-right">
                    <div class="product-sidebar-1" >
                        <p class="product-price">{{$rentalItem->price}} AZN</p>
                        <hr/>
                        <div class="product-owner-info">
                            <div class="product-owner-icon">
                                <img src="{{asset('site')}}/assets/images/user.svg"/>
                            </div>

                            <div class="product-owner-name">
                                <span>{{$rentalItem->user->name}}</span>
                                <span>Bakı</span>
                            </div>
                        </div>
                        <div class="product-owner-phone">
                            <img src="{{asset('site')}}/assets/images/phone.svg"/>
                            <div>
                                <a href="tel:+{{$rentalItem->user->phone2}}">{{$rentalItem->user->phone1}}</a>
                                <a href="tel:+{{$rentalItem->user->phone2}}">{{$rentalItem->user->phone2}}</a>
                            </div>
                        </div>
                        <div class="product-warning">
                            <img src="{{asset('site')}}/assets/images/warning.svg">
                            <span>Diqqət! Avtomobilə baxış keçirmədən öncə beh göndərməyin.</span>
                        </div>
                    </div>

                    <div class="product-sidebar-2" style="display:none">
                        <p class="product-price">28 400 USD</p>
                        <hr/>
                        <div class="product-owner-info">
                            <img src="{{asset('site')}}/assets/images/TURBO.AZ.png"/>
                            <div class="product-owner-name">
                                <span>Hyundai Babək Diler</span>
                            </div>
                        </div>
                        <div class="product-owner-phone">
                            <img src="{{asset('site')}}/assets/images/phone.svg"/>
                            <a href="tel:+99499999999">0465466</a>
                        </div>
                        <hr/>
                        <div class="product-owner-description">
                            <p>"Hyundai Babək Diler" avtosalonu Hyundai avtomobillərinin distribütoru olan "Auto Azərbaycan" şirkətinin "Otoplaza Mall aad adad sd </p>
                        </div>
                        <a href="" class="product-shop-count">5 elan</a>
                        <hr/>
                        <a href="https://www.google.com/maps/place/40%C2%B023'24.5%22N+49%C2%B053'12.7%22E/@40.390124,49.886863,15z/data=!4m5!3m4!1s0x0:0x83ece420adff19be!8m2!3d40.390124!4d49.886863" target="_blank" class="rentacar-catalog-location">
                            <img src="{{asset('site')}}/assets/images/location.svg"/>
                            Bakı ş., Xətai r., Babək pr. 28
                        </a>
                        <div class="rentacar-catalog-time">
                            <img src="{{asset('site')}}/assets/images/clock.svg"/>
                            <span>Hər gün: 09:00–19:00</span>
                        </div>
                        <a href="" class="button" target="blank">Salona keç</a>
                    </div>

                    <div class="product-services">
                        <div class="product-services-info">
                            <div>
                                <span>İrəli çək</span>
                                <span>3 AZN-dən</span>
                            </div>
                            <img src="{{asset('site')}}/assets/images/arrow.png"/>
                        </div>
                        <div class="product-services-info">
                            <div>
                                <span>Premium et</span>
                                <span>5 AZN-dən</span>
                            </div>
                            <img src="{{asset('site')}}/assets/images/premium.png"/>
                        </div>
                    </div>
                </div>

            </div>


            <div class="related-products">
                <h2 class="title">Oxşar Elanlar</h2>
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
                </div>
            </div>


        </div>
    </section>
    <!-- Single page end -->
@endsection