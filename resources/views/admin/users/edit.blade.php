@extends('../layouts.include-admin')
@section('title', 'المستخدمون | تعديل') 
@section('content')
<div class="kt-content  kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor" id="kt_content">
  <!-- begin:: Content Head -->
  <div class="kt-subheader  kt-grid__item" id="kt_subheader">
    <div class="kt-container  kt-container--fluid ">
      <div class="kt-subheader__main">
        <h3 class="kt-subheader__title">المستخدمون</h3>
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
              <h3 class="kt-portlet__head-title">تعديل مستخدم</h3>
            </div>
            <div class="kt-portlet__head-toolbar">
            </div>
          </div>
          <!--begin::Form-->
          <div class="kt-portlet__body">
            <div class="">
              <form action="{{ route('admin.users.update', ['user' => $user->id]) }}" method="post">
                @method('PUT')
                @csrf   
                <div class="row">
                  <div class="form-group col-md-6">
                    <label for="User_FirstName">الاسم </label>
                    <input required class="form-control @error('name') is-invalid @enderror m-input m-input--square" name="name" type="text" value="{{old('name', $user->name)}}" maxlength="200">
                    @error('name')
                    <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                  </div>
                  <div class="form-group col-md-6">
                    <label for="User_FirstName">اسم المستخدم</label>
                    <input required class="form-control @error('username') is-invalid @enderror m-input m-input--square" name="username" type="text" value="{{old('username', $user->username)}}" maxlength="200">
                    @error('username')
                    <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                  </div>
                  <div class="form-group col-md-6">
                    <label>الصلاحية</label>
                    <select class="form-control kt-selectpicker @error('type') is-invalid @enderror m-input m-input--square" data-val="true" name="type" tabindex="-98">
                      <option value="0"></option>
                      <option {{ old('type', $user->type) == '1'? ' selected' : '' }}  value="1">أدمن</option>
                      <option {{ old('type', $user->type) == '2'? ' selected' : '' }} value="2">معتمد</option>
                      <option {{ old('type', $user->type) == '3'? ' selected' : '' }} value="3">مراجع</option>
                      @error('type')
                      <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                      </span>
                      @enderror
                    </select>
                    <span class="field-validation-valid" data-valmsg-for="User.DepartmentId" data-valmsg-replace="true"></span>
                  </div>
                  <div class="form-group col-md-6">
                    <label>البريد الالكتروني</label>
                    <input required class="form-control m-input m-input--square @error('email') is-invalid @enderror" name="email" type="email" value="{{old('email', $user->email)}}">
                    @error('email')
                    <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                  </div>
                  <div class="form-group col-md-3">
                    <label>تاريخ الميلاد</label>
                    <input required class="date form-control m-input m-input--square @error('birthday') is-invalid @enderror" data-val="true" name="birthday" type="date" value="{{old('birthday', $user->birthday)}}">
                    @error('birthday')
                    <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                  </div>
                  <div class="form-group col-md-3">
                    <label for="User_Mobile">رقم الجوال</label>
                    <input maxlength="14" minlength="10" required class="form-control m-input m-input--square @error('mobile') is-invalid @enderror" name="mobile" type="text" value="{{old('mobile', $user->mobile)}}">
                    @error('mobile')
                    <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                  </div>
                  <div class="form-group col-md-6">
                    <label>رقم السجل المدني</label>
                    <input maxlength="20" required class="form-control m-input m-input--square @error('identity') is-invalid @enderror" name="identity" type="text" value="{{old('identity', $user->identity)}}">
                    @error('identity')
                    <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                  </div>
                  <div class="form-group checkbox">
                    <label style="margin-left: 10px;">
                    <input name="status" type="checkbox" {{$user->status == 'مفعل'?'checked':''}}>
                    &nbsp;مفعل
                    </label>
                  </div>
                  <div class="form-group checkbox">
                    <label style="margin-left: 10px;">
                    <input name="verify" type="checkbox" {{$user->email_verified_at ?'checked':''}}>
                    &nbsp;تفعيل الإيميل
                    </label>
                  </div>
                </div>
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
              <form action="{{ route('admin.users.change-password.admin') }}" method="post">
                @csrf   
                <div class="row">
                  <div class="form-group col-md-6">
                    <label>كلمة المرور الجديدة</label>
                    <input minLength="8" required class="form-control m-input m-input--square @error('password') is-invalid @enderror" type="password" name="password">
                    @error('password')
                    <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                  </div>
                  <input type="hidden" class="form-control" value="{{$user->id}}" name="member_id">    
                  <div class="form-group col-md-6">
                    <label>تأكيد كلمة المرور</label>
                    <input minLength="8" required class="form-control m-input m-input--square @error('password_confirmation') is-invalid @enderror" type="password" name="password_confirmation">
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
<script>
   document.getElementById("users").className += " kt-menu__item--active";
   document.getElementById("sub-users").className += " kt-menu__item  kt-menu__item--active";
   document.getElementById("admins").className += " kt-menu__item  kt-menu__item--active";
</script>           
@endsection