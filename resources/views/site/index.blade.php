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
              <h1 style="font-size: 40px;">جمعية <span>الأخصائيين</span> الإجتماعيين</h1>
              <br>
              <p style="text-align: justify;">مرحبا بك عزيزي الزائر .. جمعية الأخصائيين الاجتماعيين (ASW) تأسست في عام 2018 برقم (1065) من وزارة الموارد البشرية والتنمية الاجتماعية، وهي جمعية مهنية تضم في عضويتها الأخصائيين الاجتماعيين المحترفين في المملكة العربية السعودية ، وتعمل (ASW) على تعزيز النمو المهني وتطوير أعضائها المنضمين لعضويتها، وذلك من أجل الحفاظ على المعايير المهنية وتعزيز السياسات الاجتماعية السليمة. ويسرنا أن تكون أحد أعضائها من خلال اختيار أحد عضويات الجمعية التي تتناسب مع مؤهلاتك لتسهم في مسيرة نجاحها.</p>
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
                  <span class="odometer" data-count="15">00</span>
                </h3>
                <p class="my-color">المستخدمون</p>
              </div>
            </div>
            <div class="col-6 col-sm-6 col-lg-3">
              <div class="counter-item">
                <h3 class="my-color">
                  <span class="odometer" data-count="156">00</span>
                </h3>
                <p class="my-color">المنشورات</p>
              </div>
            </div>
            <div class="col-6 col-sm-6 col-lg-3">
              <div class="counter-item">
                <h3 class="my-color">
                  <span class="odometer" data-count="756">00</span>
                </h3>
                <p class="my-color">الناشرون</p>
              </div>
            </div>
            <div class="col-6 col-sm-6 col-lg-3">
              <div class="counter-item">
                <h3 class="my-color">
                  <span class="odometer" data-count="22">00</span>
                </h3>
                <p class="my-color">المسؤولون</p>
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
                <li>
                  <a>هل يمكن للعضو استرجاع مبلغ العضوية بعد السداد؟</a>
                  <p>اللائحة الأساسية في الفصل الثاني المادة الرابعة عشر الفقرة (3) تنص ” لا يجوز للعضو أو من زالت عضويته ولا لورثته المطالبة باسترداد أي مبلغ دفعه العضو للجمعية سواء كان اشتراكا أو هبة أو تبرعا أو غيرها”، عليه فلا يمكن للعضو استرجاع أي مبالغ مدفوعة.</p>
                </li>
                <li>
                  <a>هل يتطلب من العضو المشترك الحضور للجمعية؟</a>
                  <p>غير مطلوب حضور أي عضو للجمعية إلا إن رغب في التعرف على مكان الجمعية والاطلاع على الخدمات المقدمة.</p>
                </li>
                <li>
                  <a>هل الجمعية تتبع للهيئة السعودية للتخصصات الصحية؟</a>
                  <p>لا، الجمعية تحت مظلة وزارة الموارد البشرية والتنمية الاجتماعية ومعتمدة برقم 1065.</p>
                </li>
                <li>
                  <a>ماذا أستفيد من البطاقة التعريفية؟</a>
                  <p>البطاقة هي تعريف وإثبات بأنك عضو في الجمعية.</p>
                </li>
                <li>
                  <a>أنا خريج حديث وأرغب في عضوية الطالب.</a>
                  <p>عضوية الطالب مخصصة لمن هم على مقاعد الدراسة حالياً، ومن شروط قبول انضمامهم إرفاق مشهد حديث.</p>
                </li>
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
              <form class="newsletter-form" data-toggle="validator">
                <input type="text" class="form-control" placeholder="الاسم" name="name" required>
                <br>
                <input type="email" class="form-control" placeholder="البريد الإلكتروني" name="email" required autocomplete="on">
                <br>
                <input type="text" class="form-control" placeholder="الموضوع" name="subject" required>
                <br>
                <textarea style="height: 150px;" class="form-control" placeholder="الرسالة" name="details" rows="20" required></textarea>
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