@extends('../layouts.include-site')
@section('title', 'إرسال اسم المستخدم إلى البريد الإلكتروني') 
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
              <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert" style="text-align: center;">
                            {{ session('status') }}
                        </div>
                    @endif  
            <div class="banner-text">
              <h1 style="font-size: 17px; margin-right: 30px;"> إرسال اسم المستخدم إلى <span> البريد الإلكتروني </span></h1>
              <br>
              <div class="banner-service">
             <form method="POST" action="{{ route('forget-username') }}">
                @csrf
                  <div class="row">
                    <div class="col-lg-8">
                      <div class="form-group">
                       <input id="email" type="email" class="form-control nice-select @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                          
                        @error('email')
                          <br><br>
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror  
                        <br><br><br>
                        <div class="col-lg-5">
                          <button type="submit" class="btn cmn-btn">إرسال الرابط</button>
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