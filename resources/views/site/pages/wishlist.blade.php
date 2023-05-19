@extends('site.layout.master')

@section('content')
    <section id="wish-list" class="product-section">
        <div class="section-title">
            <div class="container">
                <h3 class="title">SEÇİLMİŞ ELANLAR</h3>
            </div>
        </div>
        <div class="container"  id="wishlist12">
            
            @if($carts->isEmpty())
            <div class="wish-list">
                <img src="{{asset('site')}}/assets/images/wish-list.png" />
                <p>Seçilmiş elan yoxdur</p>
            </div>
            @else
          
                @if(Auth::check())
                @include('site.partials.product2')
                @else
                @include('site.partials.product')
                @endif
      
                
            @endif

         
    
        </div>
    </section>

    <!-- Wish List end -->
@endsection