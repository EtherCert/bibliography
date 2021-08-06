@extends('../layouts.include-admin')
@section('title', 'تعديل الإعدادات') 
@section('content')
 <div class="kt-content  kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor" id="kt_content">
 <!-- begin:: Content Head -->
   <div class="kt-subheader  kt-grid__item" id="kt_subheader">
     <div class="kt-container  kt-container--fluid ">
        <div class="kt-subheader__main">
           <h3 class="kt-subheader__title">الإعدادات </h3>
           <span class="kt-subheader__separator kt-subheader__separator--v"></span>
           <span class="kt-subheader__desc">تعديل</span>
        </div>
     </div>
   </div>
 <!-- end:: Content Head -->
   <div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">
     <div class="row">
        <div class="col-lg-12">

            <!--begin::Portlet-->
            <div class="kt-portlet">
                <div class="kt-portlet__head">
                    <div class="kt-portlet__head-label">
                        <h3 class="kt-portlet__head-title">
                            تعديل الإعدادات
                        </h3>
                    </div>
                </div>

                <!--begin::Form-->
                <form action="{{route('admin.settings.update',['setting'=>$settings->id])}}" method="post"  enctype='multipart/form-data' class="kt-form kt-form--label-right">
                    @csrf
                    @method('PUT')
                    <div class="kt-portlet__body">
                        <div class="form-group row">
                            <div class="col-lg-6">
                                <label>اسم الشركة </label>
                                <input required name="siteName" type="text" value="{{ old('siteName', $settings->siteName) }}" class="form-control">
                                @error('siteName')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-lg-6">
                                <label>اسم الشركة بالإنجليزي </label>
                                <input required name="siteNameEng" type="text" value="{{ old('siteNameEng', $settings->siteNameEng) }}" class="form-control">
                                @error('siteNameEng')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            
                        </div>
                        <div class="form-group row">
                            <div class="col-lg-6">
                                <label>البريد الإلكتروني</label>
                                <input required name="email" type="email" value="{{ old('email', $settings->email)}}" class="form-control">
                                @error('email')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                          <div class="col-lg-6">
                                <label>رقم الجوال</label>
                                <input required name="mobile" type="text" value="{{ old('mobile', $settings->mobile) }}" class="form-control" min="10" maxlength="13">
                                @error('mobile')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                          <div class="form-group row">
                            <div class="col-lg-6">
                                <label>اسم رئيس مجلس الإدارة</label>
                                <input required name="manager" type="text" value="{{ old('manager', $settings->manager)}}" class="form-control">
                                @error('manager')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                          <div class="col-lg-6">
                                <label>الواتساب</label>
                                <input required name="whatsapp" type="text" value="{{ old('whatsapp', $settings->whatsapp) }}" class="form-control" min="10" maxlength="13">
                                @error('whatsapp')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-lg-6">
                                <label>العنوان</label>
                                <input required name="address" type="text" value="{{ old('address', $settings->address)}}" class="form-control">
                                @error('address')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                          <div class="col-lg-6">
                                <label>رابط الفيسبوك</label>
                                <input required name="facebook" type="url" value="{{ old('facebook', $settings->facebook) }}" class="form-control">
                                @error('facebook')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-lg-6">
                                <label>رابط التويتر</label>
                                <input required name="twitter" type="url" value="{{ old('twitter', $settings->twitter)}}" class="form-control">
                                @error('twitter')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                          <div class="col-lg-6">
                                <label>رابط الإنستجرام</label>
                                <input required name="instegram" type="url" value="{{ old('instegram', $settings->instegram) }}" class="form-control">
                                @error('instegram')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>      
                        <div class="form-group row">
                            <div class="col-lg-6">
                                <label>رابط السناب شات</label>
                                <input required name="snapchat" type="url" value="{{ old('snapchat', $settings->snapchat)}}" class="form-control">
                                @error('snapchat')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                          <div class="col-lg-6">
                                <label>عدد العناصر بكل صفحة</label>
                                <input required name="num_of_elements" type="number" value="{{ old('num_of_elements', $settings->num_of_elements) }}" class="form-control" min="1">
                                @error('num_of_elements')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>   
                       <div class="form-group row">
                            <div class="col-lg-6">
                              <label for="User_FirstName">الشعار</label>
                              <div class="input-group">
                                 <span class="input-group-btn">
                                 <a id="lfm" data-input="thumbnail" data-preview="holder" class="btn btn-primary text-white">
                                 <i style="color:white;" class="fa fa-file-image"></i> اختر
                                 </a>
                                 </span>
                                 <input value="{{old('logo', $settings->logo)}}" required id="thumbnail" class="form-control @error('logo') is-invalid @enderror" type="text" name="logo">
                                 @error('logo')
                                 <span class="invalid-feedback" role="alert">
                                 <strong>{{ $message }}</strong>
                                 </span>
                                 @enderror
                              </div>
                              <div id="holder" style="margin-top:15px;max-height:100px;"></div>
                           </div>
                        <div class="col-md-6">
                              <label for="User_FirstName">الختم</label>
                              <div class="input-group">
                                 <span class="input-group-btn">
                                 <a id="lfm2" data-input="thumbnail2" data-preview="holder2" class="btn btn-primary text-white">
                                 <i style="color:white;" class="fa fa-file-image"></i> اختر
                                 </a>
                                 </span>
                                 <input value="{{old('seal', $settings->seal)}}" required id="thumbnail2" class="form-control @error('seal') is-invalid @enderror" type="text" name="seal">
                                 @error('seal')
                                 <span class="invalid-feedback" role="alert">
                                 <strong>{{ $message }}</strong>
                                 </span>
                                 @enderror
                              </div>
                              <div id="holder2" style="margin-top:15px;max-height:100px;"></div>
                           </div>
                           </div>
                        <div class="form-group row">
                            <div class="col-lg-12">
                                <label>الأحكام والشروط</label>
                                <textarea type="text" rows="4" name= "privacy" value ="" class="summernote form-control @error('privacy') is-invalid @enderror"> {{old('privacy', $settings->privacy)}}</textarea>
                                @error('privacy')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>
                 <div class="kt-portlet__foot">
                        <div class="kt-form__actions">
                            <div class="row">
                                <div class="col-lg-6">
                                    <button type="submit" class="btn btn-primary">حفظ</button>
                                    <button type="reset" class="btn btn-secondary">إلغاء</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>

                <!--end::Form-->
            </div>

            <!--end::Portlet-->
        </div>
     </div>
   </div> 
</div>
<script>
   document.getElementById("manage").className += " kt-menu__item--active";
   document.getElementById("sub-manager").className += " kt-menu__item  kt-menu__item--active";
   document.getElementById("settings").className += " kt-menu__item  kt-menu__item--active";
</script>
@endsection