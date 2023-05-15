<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- CSS -->
        <link rel="stylesheet" href="{{ asset('/site/assets/css/main.css') }}">
        <!-- Bootstrap -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
        <!-- Font Awesome -->
        <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
        <!-- favicon -->
        <link rel="shortcut icon" href="{{ asset('/site/assets/images/icon/favicon.svg') }}">
        <!-- select -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.12.6/css/selectize.bootstrap3.min.css" integrity="sha256-ze/OEYGcFbPRmvCnrSeKbRTtjG4vGLHXgOqsyLFTRjg=" crossorigin="anonymous" />
        <!-- nice select -->
        <link rel="stylesheet" href="{{ asset('/site/assets/nice-select/nice-select.css') }}"/>
        <!-- swiper -->
        <link rel="stylesheet" href="{{ asset('/site/assets/swiper/swiper.min.css') }}"/>
        <!-- fancybox -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.css" integrity="sha512-H9jrZiiopUdsLpg94A333EfumgUBpO9MdbxStdeITo+KEIMaNfHNvwyjjDJb+ERPaRS6DpyRlKbvPUasNItRyw==" crossorigin="anonymous">
        <title>Rento.az</title>
    </head>
<body>

    {{-- <div class="left-banner">
        <a href="" class="card-link" target="_blank"></a>
       <img src="{{ asset('/site/assets/images/banner-3.jpg') }}">
    </div>
    <div class="right-banner">
        <a href="" class="card-link" target="_blank"></a>
        <img src="{{ asset('/site/assets/images/banner-3.jpg') }}"/>
    </div> --}}


    <header>
        <div class="header-top">
            <div class="container">
                <div class="header-top-left">
                    <a href="tel:" ><img src="{{ asset('/site/assets/images/phone.svg') }}"/>+994509999999</a>
                    <a href="mailto:" target="_blank"><img src="{{ asset('/site/assets/images/envelope.svg') }}"/>info@info.com</a>
                </div>
                <div class="header-top-right">
                    <a href="{{ route('wishlist') }}">
                        <img src="{{ asset('/site/assets/images/heart.svg') }}"/>
                        Seçilmişlər
                    </a>
                    <!-- <a href="profile.html" class="home-login-btn">
                        <img src="assets/images/user.svg"/>
                        Giriş
                    </a> -->

                    <!-- Əgər user login olubsa -->
                    <div class="home-login-btn2">
                        <a href="{{ route('user.logout') }}" >
                            <img src="{{ asset('/site/assets/images/user.svg') }}"/>
                            Çıxış
                        </a>
                        <ul class="header-dropdown-menu">
                            <li><a href="{{ route('user.cabinet') }}">Şəxsi kabinet</a></li>
                            <li><a href="{{ route('user.logout') }}"> Çıxış </a> </li> 
                        </ul>
                    </div>
                </div>
            </div>            
        </div>
        <div class="header-menu">
            <div class="container">
                <div class="header-menu-left">
                    <h2 class="logo">RENTO.AZ</h2>
                    <ul>
                        <li><a href=''>Bütün elanlar</a></li>
                        <li><a href=''>Rent a car şirkətləri</a></li>
                        <li><a href=''>Premium elanlar</a></li>
                    </ul>
                </div>
                <a href="" class="button"><img src="{{ asset('/site/assets/images/add.svg') }}"/>Yeni elan</a>
            </div>
        </div>
        <div class="header-filter">
            <div class="container"></div>
        </div>
    </header>