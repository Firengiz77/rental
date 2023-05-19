@extends('admin.layout.master')

@section('container')
    


<section id="cabinet">
    <div class="container">

        @include('admin.partials.cabinet_menu')


        <div class="cabinet-edit">
            <form method="post" action="{{ route('user.update_profile') }}">
                @csrf
                <div class="form-group">
                    <label>Ad</label>
                    <input type="text" placeholder="{{ $user->name }}" value="{{ $user->name }}" id="name" name="name"/>
                </div>

                <div class="form-group">
                    <label>Email</label>
                    <input type="email" placeholder="{{ $user->email }}"  value="{{ $user->email }}" name="email"/>
                </div>
                <div class="form-group">
                    <label>Telefon nömrəsi</label>
                    <input type="text" placeholder="{{ $user->phone1 }}"  id="phoneNumber" value="{{ $user->phone1 }}"  name="phone1"/>
                </div>

                <div class="form-group">
                    <label>İnformasiya</label>
                     <textarea id="" cols="50" rows="10" name="inform" style="height:100px">{{ $user->inform }}</textarea>
                </div>
           
                <div class="form-group">
                    <button class="button" type="submit">Dəyişmək</button>
                     <button class="delete-btn">Şəxsi kabineti sil</button>
                   
                </div>
            </form>
        </div>
    </div>
    
</section>




<!-- Delete account modal box -->
<div id="delete-account-modal-box">
    <div class="modal-box">
        <div class="modal-close"></div>
        <div class="modal-container">
            <div class="modal-header">
                <p class="modal-title">RENTO.AZ</p>
                <button class="modal-close-btn"><img src="{{ asset('/site/assets/images/add.svg') }}"/></button>
            </div>
            <div class="modal-body">
                <p class="modal-body-title"> Şəxsi kabinet, o cümlədən bütün elanlar, əməliyyatlar və digər məlumatlar birdəfəlik silinəcək.
                    </p>
                
                <form method="post" action="{{ route('user.user_delete') }}">
                    @csrf
                    <div class="form-group">
                        <button class="button" type="submit">Şəxsi kabinet sil</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>







@endsection