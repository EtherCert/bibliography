@extends('../layouts.include-member')
@section('title', 'بياناتي | تعديل') 
@section('content')
<div class="kt-content  kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor" id="kt_content">
  <!-- begin:: Content Head -->
  <div class="kt-subheader  kt-grid__item" id="kt_subheader">
    <div class="kt-container  kt-container--fluid ">
      <div class="kt-subheader__main">
        <h3 class="kt-subheader__title">بياناتي</h3>
        <span class="kt-subheader__separator kt-subheader__separator--v"></span>
        <span class="kt-subheader__desc">تعديل</span>
        <div class="kt-input-icon kt-input-icon--right kt-subheader__search kt-hidden">
          <input type="text" class="form-control" placeholder="Search order..." id="generalSearch">
          <span class="kt-input-icon__icon kt-input-icon__icon--right">
          <span><i class="flaticon2-search-1"></i></span>
          </span>
        </div>
      </div>
    </div>
  </div>
  <!-- end:: Content Head -->
  <!-- begin:: Content -->
  <div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">
    <div class="row">
      <div class="col-md-12">
        <!--begin::Portlet-->
        <div class="kt-portlet">
          <div class="kt-portlet__head">
            <div class="kt-portlet__head-label">
              <h3 class="kt-portlet__head-title">تعديل بياناتي</h3>
            </div>
            <div class="kt-portlet__head-toolbar">
            </div>
          </div>
          <!--begin::Form-->
          <div class="kt-portlet__body">
            <div class="">
              <form action="{{ route('member.update-profile') }}" method="post">
                @method('PUT')  
                @csrf   
                <div class="row">
                  <div class="form-group col-md-6">
                    <label for="User_FirstName">الاسم </label>
                    <input required class="form-control @error('f_name') is-invalid @enderror m-input m-input--square" name="f_name" type="text" value="{{old('f_name', $user->name)}}" maxlength="200" required>
                    @error('f_name')
                    <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                  </div>
                  <div class="form-group col-md-6">
                    <label>البريد الالكتروني</label>
                    <input required class="form-control m-input m-input--square @error('email') is-invalid @enderror" name="email" type="email" value="{{old('email', $user->email)}}" required>
                    @error('email')
                    <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                  </div>
                  <div class="form-group col-md-3">
                    <label>تاريخ الميلاد</label>
                    <input required class="date form-control m-input m-input--square @error('birthday') is-invalid @enderror" data-val="true" name="birthday" type="date" value="{{old('birthday', $user->birthday)}}" required>
                    @error('birthday')
                    <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                  </div>
                  <div class="form-group col-md-3">
                    <label for="User_Mobile">رقم الجوال</label>
                    <input maxlength="14" minlength="10" required class="form-control m-input m-input--square @error('mobile') is-invalid @enderror" name="mobile" type="text" value="{{old('mobile', $user->mobile)}}" required>
                    @error('mobile')
                    <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                  </div>
                  <div class="form-group col-md-6">
                    <label>رقم السجل المدني</label>
                    <input maxlength="20" required class="form-control m-input m-input--square @error('identity') is-invalid @enderror" name="identity" type="text" value="{{old('identity', $user->identity)}}" required>
                    @error('identity')
                    <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                  </div>
                  <div class="form-group col-md-6">
                    <label>الدرجة العلمية</label>
                    <select class="form-control kt-selectpicker  m-input m-input--square @error('degree') is-invalid @enderror" data-val="true" name="degree" tabindex="-98" required>
                      <option></option>    
                      <option {{old('degree', $user->degree) == 'ماجستير' ? 'selected':'' }} value="ماجستير">ماجستير</option>
                      <option {{old('degree', $user->degree) == 'دكتوارة' ? 'selected':'' }}  value="دكتوارة">دكتوارة</option>
                    </select>
                    <span class="field-validation-valid" data-valmsg-for="User.DepartmentId" data-valmsg-replace="true"></span>
                    @error('degree')
                    <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                    </span>
                    @enderror  
                  </div>  
                  <div class="form-group col-md-3">
                    <label>الدولة</label>
                    <select class="form-control kt-selectpicker @error('country') is-invalid @enderror m-input m-input--square" data-val="true" name="country" tabindex="-98" required>
                      <option></option>    
                      <option {{old('country', $user->country) == 'السعودية' ? 'selected':'' }} value="السعودية">السعودية</option>
                    </select>
                    <span class="field-validation-valid" data-valmsg-for="User.DepartmentId" data-valmsg-replace="true"></span>
                     @error('country')
                    <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                    </span>
                    @enderror  
                  </div>
                  <div class="form-group col-md-3">
                    <label>المدينة</label>
                    <input maxlength="100" required class="form-control m-input m-input--square @error('city') is-invalid @enderror" name="city" type="text" value="{{old('city', $user->city)}}" required>
                    @error('city')
                    <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                  </div>  
                  <div class="form-group col-md-6">
                    <label>مكان العمل</label>
                    <input maxlength="100" required class="form-control m-input m-input--square @error('workplace') is-invalid @enderror" name="workplace" type="text" value="{{old('workplace', $user->workplace)}}" required>
                    @error('workplace')
                    <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                  </div>   
                  <div class="form-group col-md-6">
                    <label>المسمى الوظيفي</label>
                    <input maxlength="100" required class="form-control m-input m-input--square @error('job_title') is-invalid @enderror" name="job_title" type="text" value="{{old('job_title', $user->job_title)}}" required>
                    @error('job_title')
                    <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                  </div>
                     <input name="username" type="hidden" value="{{old('username', $user->username)}}">
                </div>
                <div class="clearfix"></div>
                <div class="form-group">
                  <button class="btn btn-danger" type="submit">
                  <i class="fa fa-save"></i>&nbsp;حفظ
                  </button>
                </div>
              </form>
            </div>
          </div>
          <div class="kt-portlet__foot">
          </div>
          <!--end::Form-->
        </div>
        <!--end::Portlet-->
      </div>
    </div>
    <div class="row">
      <div class="col-md-12">
        <!--begin::Portlet-->
        <div class="kt-portlet">
          <div class="kt-portlet__head">
            <div class="kt-portlet__head-label">
              <h3 class="kt-portlet__head-title">تغيير كلمة المرور</h3>
            </div>
            <div class="kt-portlet__head-toolbar">
            </div>
          </div>
          <!--begin::Form-->
          <div class="kt-portlet__body">
            <div class="">
              <form action="{{ route('member.update-password') }}" method="post">
                @method('PUT')
                @csrf   
                <div class="row">
                  <div class="form-group col-md-4">
                    <label>كلمة المرور الحالية </label>
                    <input class="form-control @error('current_password') is-invalid @enderror m-input m-input--square" type="password" name="current_password">
                    @error('current_password')
                    <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                  </div>
                  <div class="form-group col-md-4">
                    <label>كلمة المرور الجديدة</label>
                    <input required class="form-control m-input m-input--square @error('password') is-invalid @enderror" type="password" name="password">
                    @error('password')
                    <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                  </div>
                  <div class="form-group col-md-4">
                    <label>تأكيد كلمة المرور</label>
                    <input maxlength="20" required class="form-control m-input m-input--square @error('password_confirmation') is-invalid @enderror" type="password" name="password_confirmation">
                    @error('password_confirmation')
                    <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                  </div>
                </div>
                <div class="clearfix"></div>
                <div class="form-group">
                  <button class="btn btn-danger" type="submit">
                  <i class="fa fa-save"></i>&nbsp;حفظ
                  </button>
                </div>
              </form>
            </div>
          </div>
          <div class="kt-portlet__foot">
          </div>
          <!--end::Form-->
        </div>
        <!--end::Portlet-->
      </div>
    </div>
  </div>
  <!-- end:: Content -->
</div>
@endsection