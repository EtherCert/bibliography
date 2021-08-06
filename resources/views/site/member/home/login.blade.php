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
                <form>
                  <div class="row">
                    <div class="col-lg-8">
                      <div class="form-group">
                        <input type="email" class="form-control nice-select" placeholder="البريد الإلكتروني" name="email" required autocomplete="on">
                        <br><br><br>
                        <input type="password" class="form-control nice-select" placeholder="كلمة المرور" name="password" required>
                        <br><br><br>
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