@extends('../layouts.include-site')
@section('title', 'الدراسات') 
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
      <div class="d-table">
        <div class="d-table-cell">
          <div class="container">
            <div class="banner-text" style="margin: auto;">
              <h1 style="font-size: 40px; text-align: center;">وعاء <span>الدراسات</span> </h1>
              <br><br>
            </div>
            <div class="subscribe-area">
              <div class="subscribe-wrap">
                <div class="container">
                  <div class="row align-items-center">
                    <div class="col-lg-12">
                      <form action="{{route('studies')}}#result" class="newsletter-form" data-toggle="validator" novalidate="true" method="get">
                        <input type="text" class="form-control" placeholder="ابحث في وعاء الدراسات .." name="title_ar" autocomplete="off" value="{{$title_ar}}">
                        <button class="btn cmn-btn disabled" type="submit" style="pointer-events: all; cursor: pointer;">
                        بحث
                        </button>
                        <div id="validator-newsletter" class="form-result"></div>
                      </form>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div id="result">
    <section id="studies" class="service-area three pt-100 pb-70 blog-details-area ptb-100" id="all-studies">
      <div class="container">
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
            <div style="font-size: 80%;" class="sash--horizontal -position-left -color-blue -triangle-right -has-pointer-events">
              <?php 
                $color= "#eccf5a";
                 if($study->study_type == "دراسة علمية")
                     $color = "#45d4cd";
                ?>
              <div>
                <span  style="background-color:{{$color}} ; border-radius: 50px; padding: 10px;"><i class="bx bx-bookmarks"></i>{{$study->study_type}}</span>
              </div>
            </div>
            <img style=" width: 215px; height: 215px;" src="{{asset('site-assets/img/home-three/service3.png')}}" alt="Service">
            <img style="background-color: red; display: inline-block; border-radius: 50%; width: 200px; height: 200px; text-align: center;;" src="{{asset('storage/'.$study->main_img)}}" alt="Service">
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
            <a style="text-align: right; float: right; margin-top: 10px; font-size: 80%;" href="{{route('study.details', ['id' => $study->id])}}">{{ \Illuminate\Support\Str::limit($study->title_ar, 45)}}</a>
          </h3>
          <br><br>
          <!-- <p style="text-align: right;">{{ \Illuminate\Support\Str::limit($study->summary_ar, 45)}}</p>-->
        </div>
      </div>
      @endforeach
       </div>
       <div class="pagination-area">
          <ul>
              {{$studies->links()}}
          </ul>
        </div>
      </div>
    </section>
    </div>
    @endsection