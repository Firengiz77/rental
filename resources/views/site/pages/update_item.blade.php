@extends('site.layout.master')

@section('content')

<section id="new-product">
    <div class="section-title">
        <div class="container">
            <h3 class="title">ELAN YERLƏŞDİR</h3>
        </div>
    </div>
    <div class="container">
        <form method="post" action="{{ route('car.update_item',['rental_item' => $item->id]) }}" enctype="multipart/form-data">
            @csrf
            <div class="form-container">
                <div class="form-group">
                    <label>Marka</label>
                    <select class="nice-select" name="brand_name">
                        @foreach($brands as $brand)
                        <option value="{{ $brand->id }}"
                            @if($item->brand_name == $brand->id)
                            selected
                            @endif
                            
                            >{{ $brand->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label>Model</label>
                    <select class="nice-select" name="car_model_id">
                        @foreach ($carmodels as $models)
                        <option value="{{ $models->id }}"
                            @if($item->car_model_id == $models->id)
                            selected
                            @endif
                            
                            >{{ $models->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label>Ban növü</label>
                    <select class="nice-select" name="type">
                        @foreach ($types as $type)
                        <option value="{{ $type->id }}"
                            @if($item->type == $type->id)
                            selected
                            @endif
                            >{{ $type->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label>Yanacaq növü</label>
                    <select class="nice-select" name="fuel">
                        <option value="Benzin" @if($item->fuel == 'Benzin')  selected  @endif
                        >Benzin</option>
                        <option value="Dizel" @if($item->fuel == 'Dizel')  selected  @endif>Dizel</option>
                        <option value="Qaz" @if($item->fuel == 'Qaz')  selected  @endif>Qaz</option>  
                        <option value="Elektro" @if($item->fuel == 'Elektro')  selected  @endif>Elektro</option>
                        <option value="Hibrid" @if($item->fuel == 'Hibrid')  selected  @endif>Hibrid</option>
                        <option value="Plug-in-hibrid" @if($item->fuel == 'Plug-in-hibrid')  selected  @endif>Plug-in Hibrid</option>
                    </select>
                </div>
                <div class="form-group">
                    <label>Ötürücü</label>
                    <select class="nice-select" name="gear">
                        <option value="Arxa" @if($item->gear == 'Arxa')  selected  @endif>Arxa</option>
                        <option value="Ön" @if($item->gear == 'Ön')  selected  @endif>Ön</option>
                        <option value="Tam" @if($item->gear == 'Tam')  selected  @endif>Tam</option>  
                    </select>
                </div>
                <div class="form-group">
                    <label>Sürətlər qutusu</label>
                    <select class="nice-select" name="gear_box">
                        <option value="Mexaniki" @if($item->gear_box == 'Mexaniki')  selected  @endif>Mexaniki</option>
                        <option value="Avtomat" @if($item->gear_box == 'Avtomat')  selected  @endif>Avtomat</option>
                        <option value="Robotlaşdırılmış" @if($item->gear_box == 'Robotlaşdırılmış')  selected  @endif>Robotlaşdırılmış</option>  
                        <option value="Variator" @if($item->gear_box == 'Variator')  selected  @endif>Variator</option>  
                    </select>
                </div>
                <div class="form-group">
                    <label>Mühərrikin həcmi, sm<sup>3</sup></label>
                    <input type="number" name="engine" value="{{ $item->engine }}"/>
                </div>
                <div class="form-group">
                    <label>Mühərrikin gücü, a.g.</label>
                    <input type="number" name="horse_power" value="{{ $item->horse_power }}"/>
                </div>
                <div class="form-group">
                    <label>İl</label>
                    <input type="text" name="year" value="{{ $item->year }}"/>
                </div>
                <div class="form-group">
                    <label>Rəng</label>
                    <input type="text" name="color" value="{{ $item->color }}"/>
                </div>
                <div class="form-group">
                    <label>Yerlərin sayı</label>
                    <select class="nice-select" name="seats">
                        <option value="" disabled>Qeyd olunmasın</option>
                        <option value="1" @if($item->seats == '1')  selected  @endif >1</option>
                        <option value="2" @if($item->seats == '2')  selected  @endif>2</option>
                        <option value="3" @if($item->seats == '3')  selected  @endif>3</option>  
                        <option value="4" @if($item->seats == '4')  selected  @endif>4</option>
                        <option value="5" @if($item->seats == '5')  selected  @endif>5</option>
                        <option value="6" @if($item->seats == '6')  selected  @endif>6</option>  
                        <option value="7" @if($item->seats == '7')  selected  @endif>7</option>
                        <option value="8+" @if($item->seats == '8+')  selected  @endif>8+</option>
                    </select>
                </div>

                <div class="form-group">
                    <label>Mileage, km</label>
                    <input type="text" name="mileage" value="{{ $item->mileage }}"/>
                </div>
                <div class="form-group form-group-price">
                    <label>Qiymət</label>
                    <div>
                        <input type="number" name="price" value="{{ $item->price }}" />
                        <div class="form-group-radio">
                            <label>
                                <input type="radio"  name="price_value" value="AZN"  @if($item->price_value == 'AZN')  checked  @endif  >
                                <span class="radio-checkmark"></span>
                                AZN
                            </label>
                            <label>
                                <input type="radio"  name="price_value" value="USD" @if($item->price_value == 'USD')  checked  @endif  >
                                <span class="radio-checkmark"></span>
                                USD
                            </label>
                            <label>
                                <input type="radio" name="price_value" value="EUR" @if($item->price_value == 'EUR')  checked  @endif  >
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
                    <input type="checkbox" name="features_id[]" value="{{ $feature->id }}" 
                    @if($item->id ==in_array($feature->id,$item->features()->pluck('id')->toArray()))
                     checked  @endif >
                    <span class="checkmark"></span>
                    {{ $feature->name }}
                </label>
                @endforeach
               
            </div>
            <div class="form-group-textarea">
                <label>Əlavə məlumat</label>
                <textarea name="informations"> {{ $item->informations }}</textarea>
            </div>
            <div class="form-group-images">
                <p>Şəkillər</p>
                @php
                $images = json_decode($item->images);
               @endphp

                <div class="form-group-img-list">
                    <div class="product-images">
                        
                        <div  style="display: flex">
                           
                            @foreach ($images as $key => $image)
                            <div class="col-md-4" style="flex-basis: 25%;margin-top:20px" >
                                <div class="image-box">
                                    <img src="{{ Voyager::image($image) }}" width="150px" height="150px" style=" box-shadow: -1px 1px 2px;" alt="">
                                   <div id="newform24" class='a_remove2_{{$key}}'>
                                    <button style="margin-top:10px" type="button" data_id="{{$key}}" class="a_remove3 btn btn-primary me-2" onclick="delete_images('{{route('car.delete_images',$item->id)}}','{{ $key }}')"  id="{{ $key }}" >
                                         <input type="hidden" name="current_images[]" value="{{ $image }}" id='a_remove'>
                                            Delete
                                       </button>
                                      </div>
                                </div>
                                 </div>
                            @endforeach
                          
                    </div>
                    </div>
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
               
             
                <div class="form-group">
                    <label>Adınız</label>
                    <input type="text"  name="name" value="{{ $user->name }}" readonly />
                </div>
                <div class="form-group">
                    <label>Email</label>
                    <input type="email"   name="email" value="{{ $user->email }}" readonly/>
                </div>
                <div class="form-group">
                    <label>Telefon nömrəsi</label>
                    <input type="text" id="phoneNumber"   name="phone1" value="{{ $user->phone1 }}"  readonly/>
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





<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.0.0/jquery.min.js" ></script>


<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.js" integrity="sha512-n/4gHW3atM3QqRcbCn6ewmpxcLAHGaDjpEBu4xZd47N0W2oQ+6q7oc3PXstrJYXcbNU1OHdQ1T7pAP+gi5Yu8g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

<script>
    $('.delete-confirm').on('click', function (event) {
        event.preventDefault();
        const url = $(this).attr('href');
        swal({
            title: 'Are you sure?',
            text: 'This record and it`s details will be permanantly deleted!',
            icon: 'warning',
            buttons: ["Cancel", "Yes!"],
        }).then(function(value) {
            if (value) {
                window.location.href = url;
            }
        });
    });
  </script>



<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ=="
 crossorigin="anonymous" referrerpolicy="no-referrer"></script>
 
<script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>
  <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.5.1.js"></script>


<script src="https://cdn.jsdelivr.net/npm/sweetalert2@8.0.6/dist/sweetalert2.all.min.js"></script>
<link href="https://cdn.jsdelivr.net/npm/sweetalert2@8.0.6/dist/sweetalert2.min.css" rel="stylesheet"/>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>


<script>
    $(function() {
    const events = {
      click: 'click'
    };
    const $button = $('.delete-confirm');
    $button.on(events.click, function(event) {
    });
  })

    </script>

    <script src="{{ asset('/js/own.js') }}"></script>

@endsection