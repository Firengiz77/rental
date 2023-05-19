<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- CSS -->
    <link rel="stylesheet" href="{{asset('site')}}/assets/css/main.css">
    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
    <!-- favicon -->
    <link rel="shortcut icon" href="{{asset('site')}}/assets/images/icon/favicon.svg">
    <!-- select -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.12.6/css/selectize.bootstrap3.min.css" integrity="sha256-ze/OEYGcFbPRmvCnrSeKbRTtjG4vGLHXgOqsyLFTRjg=" crossorigin="anonymous" />
    <!-- nice select -->
    <link rel="stylesheet" href="{{asset('site')}}/assets/nice-select/nice-select.css"/>
    <!-- swiper -->
    <link rel="stylesheet" href="{{asset('site')}}/assets/swiper/swiper.min.css"/>
    <!-- fancybox -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.css" integrity="sha512-H9jrZiiopUdsLpg94A333EfumgUBpO9MdbxStdeITo+KEIMaNfHNvwyjjDJb+ERPaRS6DpyRlKbvPUasNItRyw==" crossorigin="anonymous">
    <title>Rento.az</title>



      {{-- alertify css --}}
  <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css"/>
  <!-- Default theme -->
  <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/default.min.css"/>

  
  <!-- Semantic UI theme -->
  <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/semantic.min.css"/>
  <!-- Bootstrap theme -->
  <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/bootstrap.min.css"/>






    <style>
        .product-card .wish-list-icon{
            z-index:100;
        }
    </style>
</head>
<body>
@include('site.layout.header')
@yield('content')
@include('site.layout.footer')
<!-- Premium modal box -->
<div id="premium-modal-box">
    <div class="modal-box">
        <div class="modal-close"></div>
        <div class="modal-container">
            <div class="modal-header">
                <p class="modal-title">Premium et</p>
                <button class="modal-close-btn"><img src="{{asset('site')}}/assets/images/add.svg"/></button>
            </div>
            <div class="modal-body">
                <p class="modal-text">Sizin elan saytın ana səhifəsində xüsusi ayrılmış blokda görünəcək və aktivlik müddətinin sonunadək orada qalacaq.</p>
                <p class="modal-text">Xidmətin dəyəri - <span>5 AZN-dən.</span></p>
                <form>
                    <div class="form-group">
                        <label>Sizin elanınızın nömrəsi</label>
                        <input type="text" />
                        <p class="error-text">Bu nömrəli elan tapılmadı</p>
                    </div>
                    <div class="form-group">
                        <button class="button">Davam etmək</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Login modal box -->
<div id="login-modal-box">
    <div class="modal-box">
        <div class="modal-close"></div>
        <div class="modal-container">
            <div class="modal-header">
                <p class="modal-title">RENTO.AZ</p>
                <button class="modal-close-btn"><img src="{{asset('site')}}/assets/images/add.svg"/></button>
            </div>
            <div class="modal-body">
                <p class="modal-body-title">Öz elanlarınıza baxmağın, onları redaktə və bərpa etməyin rahat yolu</p>
                <div class="modal-btns">
                    <button class="button">Telefon nömrəsi ilə giriş</button>
                    <button class="button">Biznes hesabınıza giriş</button>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Phone modal box -->
<div id="phone-login-modal-box">
    <div class="modal-box">
        <div class="modal-close"></div>
        <div class="modal-container">
            <div class="modal-header">
                <p class="modal-title">RENTO.AZ</p>
                <button class="modal-close-btn"><img src="{{asset('site')}}/assets/images/add.svg"/></button>
            </div>
            <div class="modal-body">
                <p class="modal-body-title">Şəxsi kabinetə giriş</p>
                <form>
                    <div class="form-group">
                        <label>Telefon nömrəsi</label>
                        <input type="text" class="form-control" name="phoneNumber" id="phoneNumber" value="">
                    </div>
                    <div class="form-group">
                        <button class="button">Sms kod göndərilsin</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- SMS Code modal box -->
<div id="sms-code-modal-box">
    <div class="modal-box">
        <div class="modal-close"></div>
        <div class="modal-container">
            <div class="modal-header">
                <p class="modal-title">RENTO.AZ</p>
                <button class="modal-close-btn"><img src="{{asset('site')}}/assets/images/add.svg"/></button>
            </div>
            <div class="modal-body">
                <p class="modal-body-title">Nömrənin təsdiqlənməsi</p>
                <p class="modal-text">(050) 000-00-00 nömrəsinə sms kod göndərildi</p>
                <form>
                    <div class="form-group">
                        <label>SMS kod</label>
                        <input type="number" class="form-control">
                    </div>
                    <div class="form-group">
                        <button class="button">Sms kod yenidən göndərilsin</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Business modal box -->
<div id="business-login-modal-box">
    <div class="modal-box">
        <div class="modal-close"></div>
        <div class="modal-container">
            <div class="modal-header">
                <p class="modal-title">RENTO.AZ</p>
                <button class="modal-close-btn"><img src="{{asset('site')}}/assets/images/add.svg"/></button>
            </div>
            <div class="modal-body">
                <p class="modal-body-title">Şəxsi kabinetə giriş</p>
                <form action="{{ route('user.login') }}" method="post">
                    @csrf
                    <div class="form-group">
                        <label>Email</label>
                        <input type="text" name="email" />
                    </div>
                    <div class="form-group">
                        <label>Şifrə</label>
                        <input type="password" name="password"/>
                        <button class="forgot-pass">Şifrəni unutdum</button>
                    </div>
                    <div class="form-group">
                        <button class="button">Giriş</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Business forgot password modal box -->
<div id="business-forgot-modal-box">
    <div class="modal-box">
        <div class="modal-close"></div>
        <div class="modal-container">
            <div class="modal-header">
                <p class="modal-title">RENTO.AZ</p>
                <button class="modal-close-btn"><img src="{{asset('site')}}/assets/images/add.svg"/></button>
            </div>

            <div class="modal-body">
                <p class="modal-body-title">Şifrənin yenilənməsi</p>
                <p class="modal-text">E-mail ünvanı daxil edin. E-mail ünvanınıza parolun bərpası üçün təlimatlar göndəriləcək.</p>
                <form method="post" action="{{ route('user.forgot_password') }}">
                    @csrf
                    <div class="form-group">
                        <label>Email</label>
                        <input type="text" name="email" placeholder="test@gmail.com"/>
                    </div>
                    <div class="form-group">
                        <button class="button" type="submit">Göndər</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>

<!-- Scripts -->
<script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>
<script>
    function addtocart(getid) {
      let lang = window.location.href.split('/')[3];
      $.get("/add_to_cart/" + getid,
          {
              id: getid,
          },
          function (data, status) {
			  $('.count23').html(data.count);
           //   console.log($('.wish-list-icon').html().trim());
           
            //   if($('.wish-list-icon').html().trim() === '<i class="fal fa-heart"></i>'){
            //   console.log('qirmizi');
            //    document.getElementsByClassName('wish-list-icon')[0].html('<i class="fas fa-heart"></i>');
            //   }
            //    else{
            //       console.log('ici bos');
            //    $('.wish-list-icon').innerHTML = '<i class="fal fa-heart"></i>';
            //   }
            
             // $(".wish-list-icon").text($(this).text());
              alertify.set('notifier','position', 'bottom-right');
              alertify.notify(data.message,'custom', 2);
          });
  }

</script>


<script>
	function remove_from_cart(getid) {
	   let lang = window.location.href.split('/')[3];
	   $.get("/remove_from_cart/" + getid,
		   {
			   id: getid,
		   },
		   function (data, status) {
			   $('#wishlist12').html(data.html);
			   $('.count').html(data.count);
		   
			   alertify.set('notifier','position', 'bottom-right');
			   alertify.notify('Səbətdən Silindi','custom', 2);
		   });
   }

</script>






<!-- Jquery -->
<script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
<!-- bootstrap -->
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
<!-- select -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.12.6/js/standalone/selectize.min.js" integrity="sha256-+C0A5Ilqmu4QcSPxrlGpaZxJ04VjsRjKu+G82kl5UJk=" crossorigin="anonymous"></script>
<!-- input mask -->
<script src="https://rawgit.com/RobinHerbots/jquery.inputmask/3.x/dist/jquery.inputmask.bundle.js"></script>
<!-- nice select -->
<script src="{{asset('site')}}/assets/nice-select/jquery.nice-select.min.js"></script>
<!-- swiper -->
<script src="{{asset('site')}}/assets/swiper/swiper.min.js"></script>
<!-- fancybox -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.js" integrity="sha512-uURl+ZXMBrF4AwGaWmEetzrd+J5/8NRkWAvJx5sbPSSuOb0bZLqf+tOzniObO00BjHa/dD7gub9oCGMLPQHtQA==" crossorigin="anonymous"></script>
<!-- main js -->
<script src="{{asset('site')}}/assets/js/main.js"></script>
@yield('scripts')

</body>
</html>