<header>
    <div class="header-top">
        <div class="container">
            <div class="header-top-left">
                <a href="tel:" ><img src="{{asset('site')}}/assets/images/phone.svg"/>+994509999999</a>
                <a href="mailto:" target="_blank"><img src="{{asset('site')}}/assets/images/envelope.svg"/>info@info.com</a>
            </div>
            <div class="header-top-right">
                <a href="{{route('wishlist')}}">
                    <img src="{{asset('site')}}/assets/images/heart.svg"/>
                    Seçilmişlər
                </a>

                @if(auth()->check())
                <div class="home-login-btn2">
                    <a href="{{ route('user.cabinet') }}" >
                        <img src="{{ asset('/site/assets/images/user.svg') }}"/>
                        Profile
                    </a>
                    <ul class="header-dropdown-menu">
                        <li><a href="{{ route('user.cabinet') }}">Şəxsi kabinet</a></li>
                        <li><a href="{{ route('user.logout') }}"> Çıxış </a> </li> 
                    </ul>

                </div>

                @else
                <a href="" class="home-login-btn">
                    <img src="{{asset('site')}}/assets/images/user.svg"/>
                    Giriş
                </a>
                @endif


            </div>
        </div>
    </div>
    <div class="header-menu">
        <div class="container">
            <div class="header-menu-left">
                <h2 class="logo"><a style="color:white" href="/">RENTO.AZ</a></h2>
                <ul>
                    <li><a href="{{route('catalog.index')}}">Bütün elanlar</a></li>
                    <li><a href="{{ route('avtosalonlar') }}" >Rent a car şirkətləri</a></li>
                    <li><a href="{{route('catalog.premiums')}}">Premium elanlar</a></li>
                </ul>
            </div>
            <a href="{{ route('yeni_elan') }}" class="button"><img src="{{asset('site')}}/assets/images/add.svg"/>Yeni elan</a>
        </div>
    </div>
    <div class="header-filter">
        <div class="container"></div>
    </div>
</header>
