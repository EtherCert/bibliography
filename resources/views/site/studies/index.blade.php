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
                      <form class="newsletter-form" data-toggle="validator" novalidate="true">
                        <input type="text" class="form-control" placeholder="ابحث في وعاء الدراسات .." name="search" required autocomplete="off">
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
    <section id="studies" class="service-area three pt-100 pb-70 blog-details-area ptb-100" id="all-studies">
      <div class="container">
        <div class="row">
          <div class="col-sm-6 col-lg-4">
            <div class="service-item two">
              <div class="service-top">
                <img src="{{asset('site-assets/img/home-three/service3.png')}}" alt="Service">
                <img src="{{asset('site-assets/img/home-three/service4.png')}}" alt="Service">
              </div>
              <div class="details-item">
                <div class="details-img" style="margin-top: -30px;">
                  <ul>
                    <li style="float: right; text-align: right;">
                      <i class="bx bx-user"></i>
                      By: <a href="#">admin</a>
                    </li>
                    <li style="float: left; text-align: left;">
                      <i class="bx bx-calendar-alt"></i>
                      20 7, 2020
                    </li>
                  </ul>
                </div>
              </div>
              <h3>
                <a style="text-align: right; float: right; margin-top: 10px;" href="#">دراسة 2</a>
              </h3>
              <br><br><br>
              <p style="text-align: right;">دراسة 2 تفاصيل</p>
            </div>
          </div>
          <div class="col-sm-6 col-lg-4">
            <div class="service-item two">
              <div class="service-top">
                <img src="{{asset('site-assets/img/home-three/service3.png')}}" alt="Service">
                <img src="{{asset('site-assets/img/home-three/service4.png')}}" alt="Service">
              </div>
              <div class="details-item">
                <div class="details-img" style="margin-top: -30px;">
                  <ul>
                    <li style="float: right; text-align: right;">
                      <i class="bx bx-user"></i>
                      By: <a href="#">admin</a>
                    </li>
                    <li style="float: left; text-align: left;">
                      <i class="bx bx-calendar-alt"></i>
                      20 7, 2020
                    </li>
                  </ul>
                </div>
              </div>
              <h3>
                <a style="text-align: right; float: right; margin-top: 10px;" href="#">دراسة 2</a>
              </h3>
              <br><br><br>
              <p style="text-align: right;">دراسة 2 تفاصيل</p>
            </div>
          </div>
          <div class="col-sm-6 col-lg-4">
            <div class="service-item three">
              <div class="service-top">
                <img src="{{asset('site-assets/img/home-three/service5.png')}}" alt="Service">
                <img src="{{asset('site-assets/img/home-three/service6.png')}}" alt="Service">
              </div>
              <div class="details-item">
                <div class="details-img" style="margin-top: -30px;">
                  <ul>
                    <li style="float: right; text-align: right;">
                      <i class="bx bx-user"></i>
                      By: <a href="#">admin</a>
                    </li>
                    <li style="float: left; text-align: left;">
                      <i class="bx bx-calendar-alt"></i>
                      20 7, 2020
                    </li>
                  </ul>
                </div>
              </div>
              <h3>
                <a style="text-align: right; float: right; margin-top: 10px;" href="#">دراسة 2</a>
              </h3>
              <br><br><br>
              <p style="text-align: right;">دراسة 2 تفاصيل</p>
            </div>
          </div>
        </div>
        <div class="pagination-area">
          <ul>
            <li>
              <a href="#">Prev</a>
            </li>
            <li>
              <a href="#">1</a>
            </li>
            <li>
              <a href="#">2</a>
            </li>
            <li>
              <a href="#">3</a>
            </li>
            <li>
              <a href="#">Next</a>
            </li>
          </ul>
        </div>
      </div>
    </section>
    @endsection