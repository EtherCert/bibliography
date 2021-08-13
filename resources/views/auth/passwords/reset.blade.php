@extends('../layouts.include-site')
@section('title', 'إعادة تعيين كلمة المرور') 
@section('content')
<div class="banner-area three">
      <div class="banner-shape">
        <img src="{{asset('site-assets/img/home-three/banner-shape5.png')}}" alt="Banner">
        <img src="{{asset('site-assets/img/home-three/banner-shape1.png')}}" alt="Shape">
        <img src="{{asset('site-assets/img/home-three/banner-shape1.png')}}" alt="Shape">
        <img src="{{asset('site-assets/img/home-three/banner-shape3.png')}}" alt="Shape">
        <img src="{{asset('site-assets/img/home-three/banner-shape4.png')}}" alt="Shape">
        <img src="{{asset('site-assets/img/home-three/banner-shape5.png')}}" alt="Shape">
        <img src="{{asset('site-assets/img/home-three/banner-shape6.png')}}" alt="Shape">
      </div>
      <div class="d-table" style="background-image: linear-gradient(80deg, #006f6a , #76d6ce);">
        <div class="d-table-cell">
          <div class="container">
            <div class="banner-text">
              <h1 style="font-size: 30px; margin-right: 100px;">تسجيل <span>الدخول</span></h1>
              <br>
              <div class="banner-service">
                  <form method="POST" action="{{ route('password.update') }}">
                        @csrf
                  <input type="hidden" name="token" value="{{ $token }}">
                  <div class="row">
                    <div class="col-lg-8">
                      <div class="form-group">
                        <input id="email" type="email" class="form-control nice-select @error('email') is-invalid @enderror" placeholder="البريد الإلكتروني" name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                          <br>
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        <br><br><br>
                        <input id="password" type="password" class="form-control nice-select @error('password') is-invalid @enderror" placeholder="كلمة المرور" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        <br><br><br> 
                         <input id="password-confirm" type="password" class="form-control nice-select" name="password_confirmation" placeholder="تأكيد كلمة المرور" required autocomplete="new-password">

                                @error('password_confirmation')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        <br><br><br>
                      
                        <div class="col-lg-6">
                          <button type="submit" class="btn cmn-btn">إعادة تعيين</button>
                        </div>
                      </div>
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
@endsection