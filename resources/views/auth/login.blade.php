@extends('../layouts.include-site')
@section('title', 'تسجيل الدخول') 
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
                <form method="POST" action="{{ route('login') }}">
                @csrf
                  <div class="row">
                    <div class="col-lg-8">
                      <div class="form-group">
                        <input type="text" class="form-control nice-select @error('username') is-invalid @enderror" placeholder="اسم المستخدم" name="username" value="{{ old('username') }}" required autocomplete="username" autofocus>
                        @error('username')
                          <br>
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror  
                        <br><br><br>
                        <input id="password" type="password" class="form-control nice-select @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        <br><br><br>
                        @if (Route::has('password.request'))
                            <a href="{{ route('password.request') }}">
                                نسيت كلمة المرور؟
                            </a>
                        @endif
                        <br><br>
                        <div class="col-lg-3">
                          <button type="submit" class="btn cmn-btn">دخول</button>
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