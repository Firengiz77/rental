@extends('site.layout.master')

@section('content')
    <!-- Avtosalonlar start -->
    <section class="rentacar-section">
        <div class="section-title">
            <div class="container">
                <h3 class="title">RƏSMİ NÜMAYƏNDƏLƏR</h3>
            </div>
        </div>
        <div class="container">  
           <div class="card-block">

            @foreach ($users as $user)
            @php
                $elanlar = App\RentalItem::where('user_id',$user->id)->get()->count();
            @endphp
                <div class="card">
                    <a href="{{ route('avtosalon_single',$user->id) }}" class="card-link"></a>
                    <div class="card-header">
                        <img src="{{ Voyager::image($user->avatar) }}"/>
                    </div>
                    <div class="card-body">
                        <p class="card-title">{{ $user->name }}</p>
                        <p class="card-description">{{ $user->inform }}</p>
                        <div class="card-phone">
                            <img src="{{ asset('/site/assets/images/phone.svg') }}">
                            <a href="tel:{{ $user->phone1 }}">{{ $user->phone1 }}</a>
                        </div>
                        <p class="card-text">{{ $elanlar }} elan</p>
                    </div>
                </div>

                @endforeach

            
           </div>
        </div>
    </section>
    <!-- Avtosalonlar end -->

    
@endsection