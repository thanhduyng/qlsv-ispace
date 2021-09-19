@extends('layouts.app')

@section('content')

<div class="container" style="margin-top: 40px;">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <p style="font-size: 17px; font-weight: bold; margin-top: 5px;">{{ __('Đăng nhập') }}</p>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right" style="font-size: 13px;">{{ __('Tài khoản') }}</label>
                            <div class="col-md-6">
                                <input style="font-size: 13px;" id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div><br>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right" style="font-size: 13px;">{{ __('Mật khẩu') }}</label>
                            <div class="col-md-6">
                                <input style="font-size: 13px;" id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <!-- <div class="form-group row">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember" style="margin-left:17px; margin-top: 3px;">
                                        {{ __('Nhớ tôi') }}
                                    </label>
                                </div>
                            </div>
                        </div> --><br>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary" style="font-size: 16px;">
                                    {{ __('Đăng nhập') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
                <br>
            </div>
        </div>
    </div>
</div>
<br>
<div style="position: relative;left: 10%; transform: translate(0%, 0%);font-size: 16px;">
    <div class="col-sm-6">
        <p class="col-sm-12">Tài khoản Phòng Đào Tạo: phongdaotao@gmail.com </p>
        <p class="col-sm-12">Mật khẩu: 123</p>
    </div>
    <div class="col-sm-6">
        <p class="col-sm-12">Tài khoản Giảng Viên: nguyenduccuong@gmail.com</p>
        <p class="col-sm-12">12345678</p>
    </div>
    <div class="col-sm-6">
        <p class="col-sm-12">Tài khoản Sinh Viên: nguyenduythanh@gmail.com</p>
        <p class="col-sm-12">Mật khẩu:12345678</p>
    </div>


</div>
<!-- Messenger Plugin chat Code -->
<div id="fb-root"></div>
<!-- Your Plugin chat code -->
<div id="fb-customer-chat" class="fb-customerchat">
</div>

<script>
    var chatbox = document.getElementById('fb-customer-chat');
    chatbox.setAttribute("page_id", "164141412103102");
    chatbox.setAttribute("attribution", "biz_inbox");

    window.fbAsyncInit = function() {
        FB.init({
            xfbml: true,
            version: 'v11.0'
        });
    };

    (function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s);
        js.id = id;
        js.src = 'https://connect.facebook.net/vi_VN/sdk/xfbml.customerchat.js';
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));
</script>
@endsection