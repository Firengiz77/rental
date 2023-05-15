@extends('admin.layout.master')

@section('container')
    


<section id="cabinet">
    <div class="container">

        @include('admin.partials.cabinet_menu')

        <div class="cabinet-edit">
            <form method="post" action="{{ route('user.update_password') }}">
                @csrf
                <input type="hidden" name="token" value="{{ $token }}">

                <h2>Şifrəni dəyişmək</h2>
                <div class="form-group">
                    <label>Email</label>
                    <input type="email" name="email" value="{{ $email }}"/>
                </div>
                <div class="form-group">
                    <label>Yeni şifrə</label>
                    <input type="password" name="password" placeholder="********"/>
                </div>
                <div class="form-group">
                    <label>Şifrəni təsdiq edin</label>
                    <input type="password" name="confirm_password" placeholder="********"/>
                </div>
                <div class="form-group">
                    <button class="button" type="submit">Şifrəni dəyiş</button>
                </div>
            </form>
            
        </div>
    </div>
</section>


@endsection



