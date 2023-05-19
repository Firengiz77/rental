// premium modal
$(".premium-card .button").on('click', function(e){
    e.preventDefault();
    $("#premium-modal-box").fadeIn(100);
});

// login modal

$(".home-login-btn").on('click', function(e){
    e.preventDefault();
    $("#login-modal-box").fadeIn(100);
});

$('#login-modal-box .button:first-child').on('click', function(e){
    e.preventDefault();
    $("#phone-login-modal-box").fadeIn(100);
    $("#login-modal-box").fadeOut(100);
});

$('#login-modal-box .button:last-child').on('click', function(e){
    e.preventDefault();
    $("#business-login-modal-box").fadeIn(100);
    $("#login-modal-box").fadeOut(100);
});

$("#business-login-modal-box .forgot-pass").on('click', function(e){
    e.preventDefault();
    $("#business-login-modal-box").fadeOut(100);
    $('#business-forgot-modal-box').fadeIn(100);
})

$('.modal-close, .modal-close-btn').on('click', function(){
    $('.modal-box').parent().fadeOut(100);
});

// Banner


// Delete account modal
$(".delete-btn").on('click', function(e){
    e.preventDefault();
    $("#delete-account-modal-box").fadeIn(100);
});

// Premium modal
$(".premium-btn").on('click', function(e){
    e.preventDefault();
    $("#premium-modal-box-2").fadeIn(100);
});

// Premium modal
$(".ireli-cek").on('click', function(e){
    e.preventDefault();
    $("#ireli-cek-modal-box").fadeIn(100);
});

// Balansin artirilmasi
$(".popup-close").on('click', function(e){
    e.preventDefault();
    $(".warning-popup").fadeOut(100);
});
$('.warning-popup .popup-btn').on('click', function(e){
    e.preventDefault();
    $("#wallet-modal-box").fadeIn(100);
});
$('.wallet-btn').on('click', function(e){
    e.preventDefault();
    $("#wallet-modal-box").fadeIn(100);
});
// elanin silinmesi
$('.remove-btn').on('click', function(e){
    e.preventDefault();
    $("#remove-modal-box").fadeIn(100);
});
// elanin editi
$('.edit-btn').on('click', function(e){
    e.preventDefault();
    $("#edit-modal-box").fadeIn(100);
});
$('.forgot-btn').on('click', function(e){
    e.preventDefault();
    $("#forgot-modal-box").fadeIn(100);
});
// receipt modal
$('.receipt-btn').on('click', function(e){
    e.preventDefault();
    $("#receipt-modal-box").fadeIn(100);
});


// Select list
$('.select').selectize({
    sortField: 'text'
});

$(".multiple-option").selectize({
    delimiter: ",",
    persist: false,
    maxItems: null,
    create: function (input) {
      return {
        value: input,
        text: input,
      };
    }
});

$('.nice-select').niceSelect();

// filter
$("#filter .filter-btn").on('click', function(e){
    e.preventDefault();
    $('.form-filter-middle').toggleClass('active');
})

// input mask
$('#phoneNumber').inputmask("(099) 999-99-99");


// Single page 
$(".product-description-btn").on('click', function(){
    $(this).hide();
    $('.product-description-content').addClass('active');
})


var swiper = new Swiper(".mySwiper", {
    loop: true,
    spaceBetween: 10,
    slidesPerView: 7,
    freeMode: true,
    watchSlidesProgress: true,
    });
    var swiper2 = new Swiper(".mySwiper2", {
    loop: true,
    spaceBetween: 10,
    navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev",
    },
    thumbs: {
        swiper: swiper,
    },
    });

$(".img-galery").attr("data-fancybox", "mygallery");
$(".img-galery").fancybox();


// single page

// Cabinet 
$(".nav-tabs a").on('click', function(e){
    e.preventDefault();
    $(".nav-tabs a").removeClass('active');
    $(this).addClass('active');
    $(".tab-content .tab-pane").fadeOut(100);
    $(this.hash).fadeIn(200);
});
// Cabinet

// New product
   
  
const newProductImages = document.querySelector(".product-images");
const newPhotoInput = document.querySelector("#inputImage");
const frontImage = document.querySelector("#inputImageFront");
const backImage = document.querySelector('#inputImageBack');

function addImage (input){
    let productActions= document.createElement('div');
    let newCard = document.createElement('div');
    let right = document.createElement('img');
    let left = document.createElement('img');
    let remove = document.createElement('img');
    let newImg = document.createElement('img');
    let reader = new FileReader();
    reader.onload = function() {
    var dataURL = reader.result;
    newImg.src = dataURL;
    }
    reader.readAsDataURL(input.files[0]);
    newImg.classList = 'product-img';
    newCard.className = 'product-img-card';
    left.className = 'rotate-left';
    right.className = 'rotate-right';
    remove.className = 'remove-img';
    productActions.classList = 'product-img-actions';
    remove.src = ('/site/assets/images/close.png');
    left.src = ('/site/assets/images/rotate.png');
    right.src = ('/site/assets/images/rotate.png');

    productActions.appendChild(left);
    productActions.appendChild(right);
    productActions.appendChild(remove);
    newCard.appendChild(newImg);
    newCard.appendChild(productActions);

    newProductImages.appendChild(newCard);
}
newPhotoInput.addEventListener('change', (e) => {
    addImage(newPhotoInput);
    if(newProductImages.childNodes.length == 1){
        $(".front-image-label").hide(); 
    }else if(newProductImages.childNodes.length == 2){
        $(".back-image-label").hide();
    }
});

frontImage.addEventListener('change', (e) =>{
    $(".front-image-label").hide();
    addImage(frontImage);
})
backImage.addEventListener('change', (e) =>{
    $(".back-image-label").hide();
    addImage(backImage);
})

let degrees = 0;

$(document).on('click','.rotate-right',function(){
    degrees += 90;
    $(this).parent().siblings('.product-img').css({
        'transform': 'rotate(' + degrees + 'deg)',
        '-ms-transform': 'rotate(' + degrees + 'deg)',
        '-moz-transform': 'rotate(' + degrees + 'deg)',
        '-webkit-transform': 'rotate(' + degrees + 'deg)',
        '-o-transform': 'rotate(' + degrees + 'deg)'
    })
});

$(document).on('click','.rotate-left',function(){
    degrees -= 90;
    $(this).parent().siblings('.product-img').css({
        'transform': 'rotate(' + degrees + 'deg)',
        '-ms-transform': 'rotate(' + degrees + 'deg)',
        '-moz-transform': 'rotate(' + degrees + 'deg)',
        '-webkit-transform': 'rotate(' + degrees + 'deg)',
        '-o-transform': 'rotate(' + degrees + 'deg)'
    })
});

$(document).on('click','.remove-img',function(){
    $(this).parent().parent().remove();
    if(newProductImages.childNodes.length == 0){
        $(".front-image-label").show(); 
        $(".back-image-label").show();
    }else if(newProductImages.childNodes.length == 1){
        $(".back-image-label").show();
    }
});
