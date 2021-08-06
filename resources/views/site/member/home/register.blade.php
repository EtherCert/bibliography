@extends('../layouts.include-site')
@section('title', 'تسجيل مشترك') 
@section('content')
<div class="banner-area three" style="height: 1300px;">
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
                <form>
                  <div class="row">
                    <div class="col-lg-12">
                      <div class="input-group">
                        <input class="form-control nice-select"  required="" minlength="2" maxlength="50" title="الاسم يجب أن يكون بالعربية وعدد الحروف لا يتجاوز الـ 50 ولا يقل عن 2" style="width:45%; margin-left: 10px;" class=" arabic form-control " placeholder="الاسم الأول" name="f_name" value="" type="text">
                        <input class="form-control nice-select"  required="" minlength="2" maxlength="50" title="الاسم يجب أن يكون بالعربية وعدد الحروف لا يتجاوز الـ 50 ولا يقل عن 2" style="width:45%" class=" arabic form-control " placeholder="الاسم الثاني" name="s_name" value="" type="text">
                      </div>
                      <br>
                      <div class="input-group">
                        <input class="form-control nice-select" required minlength="2" maxlength="50" title="" style="width:45%; margin-left: 10px;" class="form-control " placeholder="الاسم الثالث" name="t_name" value="" type="text">
                        <input class="form-control nice-select"  required maxlength="50" title="" style="width:45%" class=" arabic form-control " placeholder="العائلة" name="fo_name" value="" type="text">
                      </div>
                      <br>
                      <div class="input-group">
                        <input class="form-control nice-select" required minlength="2" maxlength="50" title="" style="width:45%; margin-left: 10px;" class="form-control " placeholder="اسم المستخدم" name="username" value="" type="text">
                        <input class="form-control nice-select"  required maxlength="50" title="" style="width:45%" class=" arabic form-control " placeholder="تاريخ الميلاد" name="birthdate" value="" type="text">
                      </div>
                      <br>	
                      <div class="input-group">
                        <select style="display: none;" style="width:45%; margin-left: 10px;" name="degree">
                          <option value="دبلوم">دبلوم</option>
                          <option value="بكالوريس">بكالوريس</option>
                          <option value="ماجستير">ماجستير</option>
                          <option value="دكتوراة">دكتوراة</option>
                        </select>
                        <div style="width:45%; margin-left: 10px;" class="form-control nice-select" tabindex="0">
                          <span class="current"> الدرجة العلمية</span>
                          <ul class="list">
                            <li data-value="دبلوم" class="option">دبلوم</li>
                            <li data-value="بكالوريس" class="option">بكالوريس</li>
                            <li data-value="ماجستير" class="option">ماجستير</li>
                            <li data-value="دكتوراة" class="option">دكتوراة</li>
                          </ul>
                        </div>
                        <input class="form-control nice-select"  required maxlength="50" title="" style="width:45%" class=" arabic form-control " placeholder="التخصص" name="major" value="" type="text">
                      </div>
                      <br>
                      <div class="input-group">
                        <input class="form-control nice-select" required minlength="2" maxlength="50" title="" style="width:45%; margin-left: 10px;"  placeholder="مكان العمل" name="workplace" value="" type="text">
                        <input class="form-control nice-select"  required maxlength="50" title="" style="width:45%" class=" arabic form-control " placeholder="المسمى الوظيفي" name="job_title" value="" type="text">
                      </div>
                      <br>
                      <div class="input-group">
					  <select style="display: none;" style="width:45%; margin-left: 10px;" name="country">
                          <option value="السعودية">السعودية</option>
                        </select>
                        <div style="width:45%; margin-left: 10px;" class="form-control nice-select" tabindex="0">
                          <span class="current">الدولة</span>
                          <ul class="list">
                            <li data-value="السعودية" class="option">السعودية</li>
                          </ul>
                        </div>
                        <input class="form-control nice-select"  required maxlength="50" title="" style="width:45%" class=" arabic form-control " placeholder="المدينة" name="city" value="" type="text">
                      </div>
                      <br>
                      <div class="input-group">
                        <input class="form-control nice-select" required minlength="2" maxlength="50" title="" style="width:45%; margin-left: 10px;" class="form-control " placeholder="البريد الإلكتروني" name="email" value="" type="text">
                        <input class="form-control nice-select"  required maxlength="50" title="" style="width:45%" class=" arabic form-control " placeholder="تأكيد البريد الإلكتروني" name="email_confirmation" value="" type="text">
                      </div>
                      <br>
                      <div class="input-group">
                        <input class="form-control nice-select" required minlength="2" maxlength="50" title="" style="width:45%; margin-left: 10px;" class="form-control " placeholder="كلمة المرور" name="password" value="" type="password">
                        <input class="form-control nice-select"  required minlength="8" title="" style="width:45%" class=" arabic form-control " placeholder="تأكيد كلمة المرور" name="password_confirmation" value="" type="password">
                      </div>
                      <br>									
                      <br>						
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
@endsection
