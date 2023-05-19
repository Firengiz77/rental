@extends('site.layout.master')

@section('content')

<section id="new-product">
    <div class="section-title">
        <div class="container">
            <h3 class="title">ELAN YERLƏŞDİR</h3>
        </div>
    </div>
    <div class="container">
        <form method="post" action="{{ route('create_new_item') }}" enctype="multipart/form-data">
            @csrf
            <div class="form-container">
                <div class="form-group">
                    <label>Marka</label>
                    <select class="nice-select" name="brand_name">
                        @foreach($brands as $brand)
                        <option value="{{ $brand->id }}">{{ $brand->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label>Model</label>
                    <select class="nice-select" name="car_model_id">
                        @foreach ($carmodels as $models)
                        <option value="{{ $models->id }}">{{ $models->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label>Ban növü</label>
                    <select class="nice-select" name="type">
                        @foreach ($types as $type)
                        <option value="{{ $type->id }}">{{ $type->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label>Yanacaq növü</label>
                    <select class="nice-select" name="fuel">
                        <option value="Benzin">Benzin</option>
                        <option value="Dizel">Dizel</option>
                        <option value="Qaz">Qaz</option>  
                        <option value="Elektro">Elektro</option>
                        <option value="Hibrid">Hibrid</option>
                        <option value="Plug-in-hibrid">Plug-in Hibrid</option>
                    </select>
                </div>
                <div class="form-group">
                    <label>Ötürücü</label>
                    <select class="nice-select" name="gear">
                        <option value="Arxa">Arxa</option>
                        <option value="Ön">Ön</option>
                        <option value="Tam">Tam</option>  
                    </select>
                </div>
                <div class="form-group">
                    <label>Sürətlər qutusu</label>
                    <select class="nice-select" name="gear_box">
                        <option value="Mexaniki">Mexaniki</option>
                        <option value="Avtomat">Avtomat</option>
                        <option value="Robotlaşdırılmış">Robotlaşdırılmış</option>  
                        <option value="Variator">Variator</option>  
                    </select>
                </div>
                <div class="form-group">
                    <label>Mühərrikin həcmi, sm<sup>3</sup></label>
                    <input type="number" name="engine"/>
                </div>
                <div class="form-group">
                    <label>Mühərrikin gücü, a.g.</label>
                    <input type="number" name="horse_power"/>
                </div>
                <div class="form-group">
                    <label>İl</label>
                    <input type="text" name="year"/>
                </div>
                <div class="form-group">
                    <label>Rəng</label>
                    <input type="text" name="color"/>
                </div>
                <div class="form-group">
                    <label>Yerlərin sayı</label>
                    <select class="nice-select" name="seats">
                        <option value="" disabled>Qeyd olunmasın</option>
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

                <div class="form-group">
                    <label>Mileage, km</label>
                    <input type="text" name="mileage" />
                </div>
                <div class="form-group form-group-price">
                    <label>Qiymət</label>
                    <div>
                        <input type="number" name="price" />
                        <div class="form-group-radio">
                            <label>
                                <input type="radio" required name="price_value" value="AZN">
                                <span class="radio-checkmark"></span>
                                AZN
                            </label>
                            <label>
                                <input type="radio" required name="price_value" value="USD">
                                <span class="radio-checkmark"></span>
                                USD
                            </label>
                            <label>
                                <input type="radio" required name="price_value" value="EUR">
                                <span class="radio-checkmark"></span>
                                EUR
                            </label>
                        </div>
                    </div>
                </div>
            </div>
            <div class="form-group-checkbox">
                <p>Avtomobilin təchizatı</p>

                @foreach ($features as $feature)
                <label>
                    <input type="checkbox" name="features_id[]" value="{{ $feature->id }}">
                    <span class="checkmark"></span>
                    {{ $feature->name }}
                </label>
                @endforeach
               
            </div>
            <div class="form-group-textarea">
                <label>Əlavə məlumat</label>
                <textarea name="informations"></textarea>
            </div>
            <div class="form-group-images">
                <p>Şəkillər</p>
                <div class="form-group-img-list">
                    <div class="product-images"></div>
                   
                    <div class="form-group-image">
                        <label class="front-image-label"> 
                            <input  type="file" accept='image/*' id="inputImageFront" name="images[]" />
                            <img src="{{ asset('/site/assets/images/on.png') }}"/>
                        </label>
                        <label class="back-image-label"> 
                            <input  type="file" accept='image/*' id="inputImageBack" name="images[]" />
                            <img src="{{ asset('/site/assets/images/arxa.png') }}"/>
                        </label>
                        <label class="multiple-image-label"> 
                            <input  type="file" accept='image/*' id="inputImage" name="images[]" />
                            <img src="{{ asset('/site/assets/images/plus.png') }}" />
                        </label>
                    </div>
                </div>
            </div>
            <div class="form-group-contact">
                <p>Əlaqə</p>
                @php
              if(auth()->check()){
		        $user = App\Models\User::where('id',auth()->id())->firstOrFail();
		        }
                @endphp
                <div class="form-group">
                    <label>Adınız</label>
                    <input type="text"  @if(auth()->check()) value="{{ $user->name }}" @endif name="name" />
                </div>
                <div class="form-group">
                    <label>Email</label>
                    <input type="email" @if(auth()->check()) value="{{ $user->email }}" @endif  name="email"/>
                </div>
                <div class="form-group">
                    <label>Telefon nömrəsi</label>
                    <input type="text" id="phoneNumber" @if(auth()->check()) value="{{ $user->phone1 }}" @endif  name="phone1" />
                </div>
                <div class="form-group">
                    <label>Şəhər</label>
                    <select class="nice-select" name="city_id">
                        @foreach ($cities as $city)
                        <option value="{{ $city->id }}">{{ $city->name }}</option>
                        @endforeach

                       
                    </select>
                </div>
            </div>
            <div class="form-group-btn">
                <button class="button" type="submit">Elan yerləşdir</button>
            </div>
            
        </form>
    </div>
</section>



@endsection