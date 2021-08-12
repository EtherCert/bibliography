<?php $settings = App\Models\Setting::findOrFail(1);?>
<!DOCTYPE html>
<html lang="ar" dir="rtl">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{asset('site-assets/css/bootstrap.rtl.min.css')}}">
    <link rel="stylesheet" href="{{asset('site-assets/css/meanmenu.css')}}">
    <link rel="stylesheet" href="{{asset('site-assets/css/boxicons.min.css')}}">
    <link rel="stylesheet" href="{{asset('site-assets/css/odometer.min.css')}}">
    <link rel="stylesheet" href="{{asset('site-assets/css/magnific-popup.min.css')}}">
    <link rel="stylesheet" href="{{asset('site-assets/css/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{asset('site-assets/css/owl.theme.default.min.css')}}">
    <link rel="stylesheet" href="{{asset('site-assets/css/nice-select.min.css')}}">
    <link rel="stylesheet" href="{{asset('site-assets/css/style.css')}}">
    <link rel="stylesheet" href="{{asset('site-assets/css/responsive.css')}}">
    <link rel="stylesheet" href="{{asset('site-assets/css/rtl.css')}}">
    <link href="{{asset('assets/vendors/general/sweetalert2/dist/sweetalert2.css')}}" rel="stylesheet" type="text/css" /> 
    <!-- start for arabic -->
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script> 
    <!-- end for arabic-->  
    <title>@yield('title')</title>
    <link rel="icon" type="image/ico" href="{{asset('site-assets/img/favicon.ico')}}">
    <link href="https://fonts.googleapis.com/earlyaccess/droidarabickufi.css" rel="stylesheet">
  </head>
  <body style="font-family: 'Droid Arabic Kufi', serif;">
    <div class="loader">
      <div class="d-table">
        <div class="d-table-cell">
          <div class="spinner">
            <div class="rect1"></div>
            <div class="rect2"></div>
            <div class="rect3"></div>
            <div class="rect4"></div>
            <div class="rect5"></div>
          </div>
        </div>
      </div>
    </div>
    <div class="navbar-area two fixed-top">
      <div class="mobile-nav">
        <a href="index.html" class="logo">
        <img src="{{asset('site-assets/img/logo.png')}}" alt="Logo">
        </a>
      </div>
      <div class="main-nav">
        <div class="container">
          <nav class="navbar navbar-expand-md navbar-light">
            <a class="navbar-brand" href="index.html">
            <img src="{{asset('site-assets/img/logo.png')}}" alt="Logo">
            </a>
            <div class="collapse navbar-collapse mean-menu" id="navbarSupportedContent">
              <ul class="navbar-nav">
                <li class="nav-item">
                  <a href="#" class="nav-link active">الرئيسة</a>
                </li>
                <li class="nav-item">
                  <a href="#statistics" class="nav-link">الإحصائيات</a>
                </li>
                <li class="nav-item">
                  <a href="#studies" class="nav-link">وعاء الدراسات</a>
                </li>
                <li class="nav-item">
                  <a href="#about" class="nav-link">من نحن</a>
                </li>
                <li class="nav-item">
                  <a href="#contact" class="nav-link">تواصل معنا</a>
                </li>
              </ul>
              <div class="side-nav">
                <a href="#">الدخول</a>
              </div>
              <div class="side-nav">
                <a href="#">صفحتي</a>
              </div>
            </div>
          </nav>
        </div>
           @if(count($errors)>0)
          <div class="alert alert-danger fade show" role="alert">
            <div class="alert-icon"><i class="flaticon-questions-circular-button"></i></div>
            <div class="alert-text">
              @foreach ($errors->all() as $error)
              <li>
                {{$error}}
              </li>
              @endforeach
            </div>
          </div>
          @endif
      </div>
    </div>
	@yield('content')
    @include('sweetalert::alert')  
 <footer class="pt-100">
      <div class="container">
        <div class="row">
          <div class="col-sm-6 col-lg-3">
            <div class="footer-item">
              <div class="footer-logo">
                <a href="index.html">
                <img src="{{asset('site-assets/img/logo2.png')}}" alt="Logo">
                </a>
                <p>هي جمعية مهنية تضم في عضويتها الأخصائيين الاجتماعيين المحترفين في المملكة العربية السعودية</p>
              </div>
            </div>
          </div>
          <div class="col-sm-6 col-lg-3">
            <div class="footer-item">
              <div class="footer-company">
                <h3>روابط سريعة</h3>
                <ul>
                  <li>
                    <a href="about.html" target="_blank">من نحن</a>
                  </li>
                  <li>
                    <a href="services.html" target="_blank">آخر الدراسات</a>
                  </li>
                  <li>
                    <a href="projects.html" target="_blank">احصائيات</a>
                  </li>
                </ul>
              </div>
            </div>
      </div>
          <div class="col-sm-6 col-lg-3">
            <div class="footer-item">
              <div class="footer-company">
                <h3>ابقَ على تواصل</h3>
                <ul>
                  <li>
                    <a href="contact.html" target="_blank">تواصل معنا</a>
                  </li>
                  <li>
                    <a href="contact.html" target="_blank">من نحن</a>
                  </li>
                </ul>
              </div>
            </div>
          </div>
          <div class="col-sm-6 col-lg-3">
            <div class="footer-item">
              <div class="footer-contact">
                <h3>معلومات التواصل</h3>
                <ul>
                  <li>
                    <span>{{$settings->address}}</span>
                  </li>
                  <li>
                    <span>الإيميل:</span>
                   <span class="__cf_email__" data-cfemail="1970777f765975706170377a7674">{{$settings->email}}</span>
                  </li>
                  <li>
                    <span>رقم الجوال:</span>
                    <a href="tel:+0123456789" target="_blank">{{$settings->whatsapp}}</a>
                  </li>
                </ul>
              </div>
              <div class="footer-social">
                <ul>
                  <li>
                    <a href="{{$settings->facebook}}" target="_blank">
                    <i class='bx bxl-facebook'></i>
                    </a>
                  </li>
                  <li>
                    <a href="{{$settings->twitter}}" target="_blank">
                    <i class='bx bxl-twitter'></i>
                    </a>
                  </li>
                  <li>
                    <a href="{{$settings->snapchat}}" target="_blank">
                    <i class='bx bxl-snapchat'></i>
                    </a>
                  </li>
                  <li>
                    <a href="{{$settings->instagram}}" target="_blank">
                    <i class='bx bxl-instagram'></i>
                    </a>
                  </li>
                </ul>
              </div>
            </div>
          </div>
        </div>
        <div class="copyright-area">
          <p>جميع الحقوق محفوظة © <a href="https://socialworkers.org.sas" target="_blank">{{$settings->siteName}}</a></p>
        </div>
      </div>
    </footer>
      <script>
        $(document).ready(function () {
         function arabicInput(event) {
            var value = String.fromCharCode(event.which);
            var pattern = new RegExp(/^[\u0621-\u064A ]+$/);
            return pattern.test(value);
        }
        $('.arabic').bind('keypress', arabicInput);
        });
        </script>
        <script>
          $("#english").keypress(function(event){
        var ew = event.which;
        if(ew == 32)
            return true;
        if(48 <= ew && ew <= 57)
            return true;
        if(65 <= ew && ew <= 90)
            return true;
        if(97 <= ew && ew <= 122)
            return true;
        return false;
        });
        </script> 
    <script src="{{asset('site-assets/js/jquery-3.5.1.min.js')}}"></script>
    <script src="{{asset('site-assets/js/popper.min.js')}}"></script>
    <script src="{{asset('site-assets/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('site-assets/js/form-validator.min.js')}}"></script>
    <script src="{{asset('site-assets/js/contact-form-script.js')}}"></script>
    <script src="{{asset('site-assets/js/jquery.ajaxchimp.min.js')}}"></script>
    <script src="{{asset('site-assets/js/jquery.meanmenu.js')}}"></script>
    <script src="{{asset('site-assets/js/odometer.min.js')}}"></script>
    <script src="{{asset('site-assets/js/jquery.appear.js')}}"></script>
    <script src="{{asset('site-assets/js/jquery.magnific-popup.min.js')}}"></script>
    <script src="{{asset('site-assets/js/owl.carousel.min.js')}}"></script>
    <script src="{{asset('site-assets/js/jquery.nice-select.min.js')}}"></script>
    <script src="{{asset('site-assets/js/thumb-slide.js')}}"></script>
    <script src="{{asset('site-assets/js/custom.js')}}"></script>
    <script src="{{asset('assets/vendors/general/sweetalert2/dist/sweetalert2.min.js')}}" type="text/javascript"></script> 
    <script src="{{asset('assets/vendors/custom/js/vendors/sweetalert2.init.js')}}" type="text/javascript"></script>  
  </body>
</html>