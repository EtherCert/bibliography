@extends('../layouts.include-site')
@section('title', 'الرئيسة') 
@section('content')
<div class="banner-area three">
      <div class="banner-shape">
        <img src="{{asset('site-assets/img/home-three/banner-shape5.png')}}" alt="Shape">
        <img  style="margin-top: -110px;" src="{{asset('site-assets/img/home-three/banner-main.png')}}" alt="Banner">
        <img src="{{asset('site-assets/img/home-three/banner-shape1.png')}}" alt="Shape">
        <img src="{{asset('site-assets/img/home-three/banner-shape3.png')}}" alt="Shape">
        <!--<img src="{{asset('site-assets/img/home-one/banner-shape4.png')}}" alt="Shape"> -->
        <img src="{{asset('site-assets/img/home-three/banner-shape5.png')}}" alt="Shape">
        <img src="{{asset('site-assets/img/home-three/banner-shape6.png')}}" alt="Shape">
        <img src="{{asset('site-assets/img/home-three/banner-shape4.png')}}" alt="Shape">
      </div>
      <div class="d-table">
        <div class="d-table-cell">
          <div class="container">
            <div class="banner-text">
              <h1 style="font-size: 40px;"><span>{{$settings->siteName}}</span></h1>
              <br>
              <p style="text-align: justify;">{!!$infos[0]->description!!}</p>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div id="statistics" class="counter-area three">
      <div class="counter-wrap" style="border-radius: 20px; background-image: linear-gradient(80deg, #006f6a , #76d6ce);">
        <div class="container">
          <div class="row">
            <div class="col-6 col-sm-6 col-lg-3">
              <div class="counter-item" >
                <h3 class="my-color">
                  <span class="odometer" data-count="{{strrev($p_sc_studies_counter.'')}}">00</span>
                </h3>
                <p class="my-color">الدرسات العلمية</p>
              </div>
            </div>
            <div class="col-6 col-sm-6 col-lg-3">
              <div class="counter-item">
                <h3 class="my-color">
                  <span class="odometer" data-count="{{strrev($p_st_studies_counter.'')}}">00</span>
                </h3>
                <p class="my-color">دراسات في مرحلة الدراسات العليا</p>
              </div>
            </div>
            <div class="col-6 col-sm-6 col-lg-3">
              <div class="counter-item">
                <h3 class="my-color">
                  <span class="odometer" data-count="{{strrev($studies_counter.'')}}">00</span>
                </h3>
                <p class="my-color">إجمالي الدراسات المنشورة</p>
              </div>
            </div>
            <div class="col-6 col-sm-6 col-lg-3">
              <div class="counter-item">
                <h3 class="my-color">
                  <span class="odometer" data-count="{{strrev($members_counter.'')}}">00</span>
                </h3>
                <p class="my-color">عدد المشاركون</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <section id="studies" class="service-area three pt-100 pb-70 blog-details-area ptb-100">
      <div class="container">
        <div class="section-title">
          <h2>آخر الدراسات</h2>
        </div>
        <div class="row">
         @if(count($studies) == 0)
          <div class="alert alert-info fade show" role="alert">
            <div class="alert-icon"><i class="flaticon-questions-circular-button"></i></div>
            <div class="alert-text" style="text-align: justify;">
                  لا يوجد دراسات لعرضها
            </div>
          </div>
          @endif
            
          @foreach($studies as $study)
          <div class="col-sm-6 col-lg-4">
            <div class="service-item two">
              <div class="service-top">
                <img src="{{asset('site-assets/img/home-three/service3.png')}}" alt="Service">
                <img src="{{asset('storage/'.$study->main_img)}}" alt="Service">
              </div>
              <div class="details-item">
                <div class="details-img" style="margin-top: -30px;">
                  <ul>
                    <li style="float: right; text-align: right; font-size: 70% !important;">
                      <i class="bx bx-user"></i>
                      {{$study->researcher_name}}
                    </li>
                    <li style="float: left; text-align: left; font-size: 70% !important;">
                      <i class="bx bx-calendar-alt"></i>
                      {{explode(' ', $study->created_at)[0]}}
                    </li>
                  </ul>
                </div>
              </div>
                <br>
              <h3>
                <a style="text-align: right; float: right; margin-top: 10px;" href="{{route('study.details', ['id' => $study->id])}}">{{$study->title_ar}}</a>
              </h3>
              <br><br>
              <p style="text-align: right;">{{ \Illuminate\Support\Str::limit($study->summary_ar, 45)}}</p>
            </div>
          </div>
          @endforeach
       </div>
      </div>
    </section>
    <section id="about" class="faq-area ptb-100">
      <div class="container">
        <div class="section-title">
          <h2>من نحن</h2>
        </div>
        <div class="row">
          <div class="col-lg-6">
            <div class="faq-content">
              <ul class="accordion">
                @foreach($infos as $info)  
                <li>
                  <a>{{$info->name}}</a>
                  <p style="text-align: justify;">{!!$info->description!!}</p>
                </li>
                @endforeach 
               </ul>
            </div>
          </div>
          <div class="col-lg-6">
            <div class="faq-img">
              <img src="{{asset('site-assets/img/home-three/23.png')}}" alt="FAQ">
            </div>
          </div>
        </div>
      </div>
    </section>
    <div id="contact" class="subscribe-area">
      <div class="section-title">
        <h2>تواصل معنا</h2>
      </div>
      <div class="subscribe-wrap" style="background-image: linear-gradient(80deg, #006f6a , #76d6ce);">
        <div class="project-shape">
          <img src="{{asset('site-assets/img/home-three/banner-shape5.png')}}" alt="Shape">
        </div>
        <div class="container">
          <div class="row align-items-center">
            <div class="col-lg-6">
              <form action="{{route('contacts.store')}}" class="newsletter-form" method="post">
                  @csrf
                <input type="text" class="form-control @error('name') is-invalid @enderror" placeholder="الاسم" name="name" required value="{{old('name')}}">
                @error('name')
                <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
                </span>
                @enderror
                <br>
                <input type="email" class="form-control @error('email') is-invalid @enderror" placeholder="البريد الإلكتروني" name="email" required autocomplete="on" value="{{old('email')}}">
                @error('email')
                <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
                </span>
                @enderror
                <br>
                <input type="text" minlength="10" maxlength="14" class="form-control @error('mobile') is-invalid @enderror" placeholder="رقم الجوال" name="mobile" required autocomplete="on" value="{{old('mobile')}}">
                 @error('mobile')
                <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
                </span>
                @enderror
                <br>
                <input type="text" class="form-control @error('subject') is-invalid @enderror" placeholder="الموضوع" name="subject" required value="{{old('subject')}}">
                @error('subject')
                <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
                </span>
                @enderror
                <br>
                <textarea style="height: 150px;" class="form-control @error('details') is-invalid @enderror" placeholder="الرسالة" name="details" rows="20" required>{{old('details')}}</textarea>
                @error('details')
                <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
                </span>
                @enderror  
                <br>
                <button style="position: relative; text-align: center;" class="btn cmn-btn" type="submit">
                إرسال
                </button>
              </form>
            </div>
            <div class="col-lg-6">
              <div class="about-img">
                <img src="{{asset('site-assets/img/home-three/contact-us.png')}}" alt="Choose">
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
@endsection