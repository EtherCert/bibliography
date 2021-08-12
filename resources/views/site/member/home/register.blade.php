<?php 
$countries = [
    "SA" =>'المملكة العربية السعودية',
    "JO" =>'الأردن',
    "AE" =>'الإمارات العربية المتحدة',
    "DZ" =>'الجزائر',
    "SD" =>'السودان',
    "SO" =>'الصومال',
    "IQ" =>'العراق',
    "KW" =>'الكويت',
    "MA" =>'المغرب',
    "YE" =>'اليمن',
    "TN" =>'تونس',
    "GI" =>'جبل طارق',
    "KM" =>'جزر القمر',
    "SY" =>'سوريا',
    "OM" =>'عمان',
	"PL" =>'فلسطين',
    "QA" =>'قطر',
    "LB" =>'لبنان',
    "LY" =>'ليبيا',
    "EG" =>'مصر',
    "BH" =>'مملكة البحرين',
];
?>
@extends('../layouts.include-site')
@section('title', 'تسجيل مشترك') 
@section('content')
<div class="banner-area three" style="height: 1600px;">
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
          <h1 style="font-size: 30px; margin-right: 100px;">تسجيل <span>كمشترك</span></h1>
          <br>
          <div class="banner-service">
            <form action="{{ route('store.member') }}" method="post">
              @csrf  
              <div class="row">
                <div class="col-lg-12">
                  <div class="input-group">
                    <input class="form-control arabic nice-select @error('f_name') is-invalid @enderror"  required="" minlength="2" maxlength="50" title="الاسم يجب أن يكون بالعربية وعدد الحروف لا يتجاوز الـ 50 ولا يقل عن 2" style="width:45%; margin-left: 10px;" class=" arabic form-control " placeholder="الاسم الأول" name="f_name" value="{{old('f_name')}}" type="text">
                    <input class="form-control arabic nice-select @error('s_name') is-invalid @enderror"  required minlength="2" maxlength="50" title="الاسم يجب أن يكون بالعربية وعدد الحروف لا يتجاوز الـ 50 ولا يقل عن 2" style="width:45%" class=" arabic form-control " placeholder="الاسم الثاني" name="s_name" value="{{old('s_name')}}" type="text">
                  </div>
                  <br>
                  <div class="input-group">
                    <input class="form-control arabic nice-select @error('t_name') is-invalid @enderror" minlength="2" maxlength="50" style="width:45%; margin-left: 10px;" class="form-control " placeholder="الاسم الثالث" name="t_name" value="{{old('t_name')}}" type="text">
                    <input class="form-control arabic nice-select @error('fo_name') is-invalid @enderror"  required maxlength="50" style="width:45%" class=" arabic form-control " placeholder="العائلة" name="fo_name" value="{{old('fo_name')}}" type="text">
                  </div>
                  <br>
                  <div class="input-group">
                    <input id="english" class="form-control nice-select @error('username') is-invalid @enderror" required minlength="2" maxlength="50" style="width:45%; margin-left: 10px;" class="form-control " placeholder="اسم المستخدم" name="username" value="{{old('username')}}" type="text">
                    <input class="form-control nice-select @error('birthday') is-invalid @enderror" required maxlength="50" style="width:45%" class=" arabic form-control " placeholder="تاريخ الميلاد" name="birthday" value="{{old('birthday')}}" type="date" req>
                  </div>
                  <br>
                      <div class="form-group mt-4 mb-4 @error('country') is-invalid @enderror">
                  <select name="country" required class="form-control">
                      <option>اختر الدولة</option>
@foreach($countries as $country)                      
<option {{old('country') == $country ? 'selected':''}} value="{{$country}}">{{$country}}</option>
@endforeach        
</select>
               </div>
                    <br><br><br><br>
                  <div class="input-group">
                    <input class="form-control nice-select @error('country') is-invalid @enderror"  required maxlength="50" style="width:45%" class=" arabic form-control " placeholder="المدينة" name="city" value="{{old('city')}}" type="text">
                  </div>
                  <br>
                  <div class="input-group">
                    <input class="form-control nice-select @error('mobile') is-invalid @enderror" required style="width:45%; margin-left: 10px;" class="form-control " placeholder="الجوال"  maxlength="14"  minlength="10" name="mobile" value="{{old('mobile')}}" type="text">
                      
                    <input class="form-control nice-select"  required maxlength="10" minlength="10" style="width:45%" class=" arabic form-control " placeholder="رقم السجل المدني" name="identity" value="{{old('identity')}}" type="text">
                  </div>
                  <br>	
                  <div class="form-group mt-4 mb-4 @error('degree') is-invalid @enderror">
                  <select name="degree" required class="form-control">
                      <option>الدرجة العلمية</option>
<option {{old('degree') == 'ماجستير' ? 'selected':''}} value="ماجستير">ماجستير</option>
                    <option {{old('degree') == 'دكتوارة' ? 'selected':''}} value="دكتوراة">دكتوراة</option>
</select>
               </div>
                    <br><br><br><br>    
                  <div class="input-group">
                    <input class="form-control nice-select @error('major') is-invalid @enderror"  required maxlength="50" style="width:45%" class=" arabic form-control " placeholder="التخصص" name="major" value="{{old('major')}}" type="text">
                  </div>
                  <br>
                  <div class="input-group">
                    <input class="form-control nice-select @error('workplace') is-invalid @enderror" required minlength="2" maxlength="50" style="width:45%; margin-left: 10px;"  placeholder="مكان العمل" name="workplace" value="{{old('workplace')}}" type="text">
                    <input class="form-control nice-select @error('job_title') is-invalid @enderror"  required maxlength="50" style="width:45%" class=" arabic form-control " placeholder="المسمى الوظيفي" name="job_title" value="{{old('job_title')}}" type="text">
                  </div>
                    <br>
                  <div class="input-group">
                    <input class="form-control nice-select @error('email') is-invalid @enderror" required minlength="2" maxlength="50" style="width:45%; margin-left: 10px;" class="form-control " placeholder="البريد الإلكتروني" name="email" value="{{old('email')}}" type="text">
                    <input class="form-control nice-select @error('email_confirmation') is-invalid @enderror"  required maxlength="50" style="width:45%" class=" arabic form-control " placeholder="تأكيد البريد الإلكتروني" name="email_confirmation" value="{{old('email_confirmation')}}" type="text">
                  </div>
                  <br>
                  <div class="input-group">
                    <input class="form-control nice-select @error('password') is-invalid @enderror" required minlength="2" maxlength="50" style="width:45%; margin-left: 10px;" class="form-control " placeholder="كلمة المرور" name="password" value="" type="password">
                    <input class="form-control nice-select @error('password_confirmation') is-invalid @enderror"  required minlength="8" style="width:45%" class=" arabic form-control " placeholder="تأكيد كلمة المرور" name="password_confirmation" value="" type="password">
                  </div>
                  <br>									
                    
                <div class="form-group mt-4 mb-4">
                <div class="captcha">
                    <span>{!! captcha_img() !!}</span>
                    <button type="button" class="btn btn-danger" class="reload" id="reload">
                        &#x21bb;
                    </button>
                </div>
               </div>
              <div class="form-group mb-4">
                <input id="captcha" type="text" class="form-control nice-select @error('captcha') is-invalid @enderror" placeholder="فضلًا، أدخل النص الموجود بالصورة" name="captcha">
              </div> 
                <br><br><br><br>
                  <div class="form-group">
                    <div class="col-lg-3">
                      <button type="submit" class="btn cmn-btn">تسجيل</button>
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
<script type="text/javascript">
    $('#reload').click(function () {
        $.ajax({
            type: 'GET',
            url: 'reload-captcha',
            success: function (data) {
                $(".captcha span").html(data.captcha);
            }
        });
    });

</script>
@endsection