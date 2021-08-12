@extends('../layouts.include-member')
@section('title', 'إنشاء دراسة') 
@section('content')
<div class="kt-content  kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor" id="kt_content">
  <!-- begin:: Content Head -->
  <div class="kt-subheader  kt-grid__item" id="kt_subheader">
    <div class="kt-container  kt-container--fluid ">
      <div class="kt-subheader__main">
        <h3 class="kt-subheader__title">إنشاء دراسة</h3>
        <span class="kt-subheader__separator kt-subheader__separator--v"></span>
        <span class="kt-subheader__desc">التفاصيل</span>
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
    <div class="kt-portlet kt-portlet--tabs">
      <div class="kt-portlet__head">
        <div class="kt-portlet__head-toolbar">
          <ul class="nav nav-tabs nav-tabs-space-xl nav-tabs-line nav-tabs-bold nav-tabs-line-3x nav-tabs-line-brand" role="tablist">
            <li class="nav-item">
              <a class="nav-link active" data-toggle="tab" href="#kt_apps_user_edit_tab_1" role="tab">
                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1" class="kt-svg-icon">
                  <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                    <polygon id="Bound" points="0 0 24 0 24 24 0 24" />
                    <path d="M12.9336061,16.072447 L19.36,10.9564761 L19.5181585,10.8312381 C20.1676248,10.3169571 20.2772143,9.3735535 19.7629333,8.72408713 C19.6917232,8.63415859 19.6104327,8.55269514 19.5206557,8.48129411 L12.9336854,3.24257445 C12.3871201,2.80788259 11.6128799,2.80788259 11.0663146,3.24257445 L4.47482784,8.48488609 C3.82645598,9.00054628 3.71887192,9.94418071 4.23453211,10.5925526 C4.30500305,10.6811601 4.38527899,10.7615046 4.47382636,10.8320511 L4.63,10.9564761 L11.0659024,16.0730648 C11.6126744,16.5077525 12.3871218,16.5074963 12.9336061,16.072447 Z" id="Shape" fill="#000000" fill-rule="nonzero" />
                    <path d="M11.0563554,18.6706981 L5.33593024,14.122919 C4.94553994,13.8125559 4.37746707,13.8774308 4.06710397,14.2678211 C4.06471678,14.2708238 4.06234874,14.2738418 4.06,14.2768747 L4.06,14.2768747 C3.75257288,14.6738539 3.82516916,15.244888 4.22214834,15.5523151 C4.22358765,15.5534297 4.2250303,15.55454 4.22647627,15.555646 L11.0872776,20.8031356 C11.6250734,21.2144692 12.371757,21.2145375 12.909628,20.8033023 L19.7677785,15.559828 C20.1693192,15.2528257 20.2459576,14.6784381 19.9389553,14.2768974 C19.9376429,14.2751809 19.9363245,14.2734691 19.935,14.2717619 L19.935,14.2717619 C19.6266937,13.8743807 19.0546209,13.8021712 18.6572397,14.1104775 C18.654352,14.112718 18.6514778,14.1149757 18.6486172,14.1172508 L12.9235044,18.6705218 C12.377022,19.1051477 11.6029199,19.1052208 11.0563554,18.6706981 Z" id="Path" fill="#000000" opacity="0.3" />
                  </g>
                </svg>
                الرجاء ملئ البيانات التالية
              </a>
            </li>
          </ul>
        </div>
      </div>
      <form action="{{route('member.studies.store')}}" enctype='multipart/form-data' method="post">
       @csrf
      <div class="kt-portlet__body">
        <div class="tab-content">
          <div class="tab-pane active" id="kt_apps_user_edit_tab_1" role="tabpanel">
            <div class="kt-form kt-form--label-right">
              <div class="kt-form__body">
                <div class="kt-section kt-section--first">
                  <div class="col-xl-12 col-lg-12 order-lg-1 order-xl-1">
                    <!--begin:: Widgets/Last Updates-->
                    <div class="kt-portlet kt-portlet--height-fluid">
                     <div class="kt-portlet__body">
                    <div class="row">
                      <div class="form-group col-md-6">
                        <label for="User_FirstName">العنوان بالعربي </label>
                        <input required class="arabic form-control @error('title_ar') is-invalid @enderror m-input m-input--square" name="title_ar" type="text" value="{{old('title_ar')}}" maxlength="200">
                        @error('title_ar')
                        <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                      </div>
                      <div class="form-group col-md-6">
                        <label for="User_FirstName">العنوان بالإنجليزي</label>
                        <input id="english" required class="form-control @error('title_en') is-invalid @enderror m-input m-input--square" name="title_en" type="text" value="{{old('title_en')}}" maxlength="200">
                        @error('title_en')
                        <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                      </div>
                      <div class="form-group col-md-6">
                        <label for="User_FirstName">اسم الباحث</label>
                        <input required class="form-control @error('researcher_name') is-invalid @enderror m-input m-input--square" name="researcher_name" type="text" value="{{old('researcher_name')}}" maxlength="200">
                        @error('researcher_name')
                        <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                      </div> 
                      @if($study_type == 'دراسة في مرحلة دراسات عليا')    
                      <div class="form-group col-md-6">
                        <label for="User_FirstName">اسم المشرف</label>
                        <input class="form-control @error('supervisor_name') is-invalid @enderror m-input m-input--square" name="supervisor_name" type="text" value="{{old('supervisor_name')}}" maxlength="200">
                        @error('supervisor_name')
                        <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                      </div>
                      <div class="form-group col-md-6">
                        <label>المرحلة</label>
                        <select class="form-control kt-selectpicker @error('type') is-invalid @enderror m-input m-input--square" data-val="true" name="phase" tabindex="-98">
                          <option value=""></option>
                          <option {{ old('phase') == 'ماجستير'? ' selected' : '' }}  value="ماجستير">ماجستير</option>
                          <option {{ old('phase') == 'دكتوراة'? ' selected' : '' }} value="دكتوراة">دكتوراة</option>
                          @error('phase')
                          <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                          </span>
                          @enderror
                        </select>
                        <span class="field-validation-valid" data-valmsg-for="User.DepartmentId" data-valmsg-replace="true"></span>
                      </div>
                       <div class="form-group col-md-6">
                        <label>القسم العلمي</label>
                        <input class="form-control m-input m-input--square @error('department_name') is-invalid @enderror" name="department_name" type="text" value="{{old('department_name')}}" maxlength="200">
                        @error('department_name')
                        <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                      </div>   
                      <div class="form-group col-md-6">
                        <label>إجازة البحث من القسم العلمي</label>
                        <div class="custom-file">
                            <input name="search_leave_file" type="file" accept="application/pdf,image/*"  class="custom-file-input" id="customFile">
                            <label class="custom-file-label" for="customFile">اختر</label>
                        </div>  
                        @error('search_leave_file')
                        <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                      </div>    
                      @endif    
                      <div class="form-group col-md-6">
                        <label for="User_FirstName">التخصص</label>
                        <input required class="form-control @error('major') is-invalid @enderror m-input m-input--square" name="major" type="text" value="{{old('major')}}" maxlength="200">
                        @error('major')
                        <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                      </div>
                      <input name="study_type" value="{{$study_type}}" type="hidden"> 
                      <div class="form-group col-md-6">
                        <label>الناشر</label>
                        <input required class="form-control m-input m-input--square @error('publisher') is-invalid @enderror" name="publisher" type="text" value="{{old('publisher')}}" maxlength="200">
                        @error('publisher')
                        <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                      </div>
                      <div class="form-group col-md-6">
                        <label>مكان النشر</label>
                        <input required class="form-control m-input m-input--square @error('publish_place') is-invalid @enderror" name="publish_place" type="text" value="{{old('publish_place')}}" maxlength="200">
                        @error('publish_place')
                        <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                      </div> 
                      <div class="form-group col-md-3">
                        <label>عدد الصفحات</label>
                        <input required min="1" class="form-control m-input m-input--square @error('number_of_pages') is-invalid @enderror" name="number_of_pages" type="number" value="{{old('number_of_pages')}}">
                        @error('number_of_pages')
                        <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                      </div>
                      <div class="form-group col-md-3">
                        <label>تاريخ النشر</label>
                        <input required class="form-control m-input m-input--square @error('publish_date') is-invalid @enderror" name="publish_date" type="date" value="{{old('publish_date')}}" maxlength="4">
                        @error('publish_date')
                        <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                      </div> 
                      <div class="form-group col-md-6">
                        <label>الكلمات المفتاحية</label>
                        <select required class="form-control @error('keywords') is-invalid @enderror kt-select2" id="kt_select2_11" multiple name="keywords[]">
                            <option></option>
                        </select>  
                        @error('keywords')
                        <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                      </div>
                     <div class="form-group col-md-6">
                        <label>ملف ملخص الدراسة بالعربي</label>
                        <div class="custom-file">
                            <input required name="summary_ar_file" value="{{old('summary_ar_file')}}" type="file" accept="application/pdf,image/*"  class="custom-file-input" id="customFile">
                            <label class="custom-file-label" for="customFile">اختر</label>
                        </div>  
                        @error('summary_ar_file')
                        <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                      </div>  
                      <div class="form-group col-md-6">
                        <label>ملف ملخص الدراسة بالإنجليزي</label>
                        <div class="custom-file">
                            <input required name="summary_en_file" value="{{old('summary_en_file')}}" type="file" accept="application/pdf,image/*"  class="custom-file-input" id="customFile">
                            <label class="custom-file-label" for="customFile">اختر</label>
                        </div>  
                        @error('summary_en_file')
                        <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                      </div>  
                      <div class="form-group col-md-6">
                        <label>ملف الدراسة</label>
                        <div class="custom-file">
                            <input required name="study_file" value="{{old('study_file')}}" type="file" accept="application/pdf,image/*"  class="custom-file-input" id="customFile">
                            <label class="custom-file-label" for="customFile">اختر</label>
                        </div>  
                        @error('study_file')
                        <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                      </div>   
                      <div class="form-group col-md-6">
                        <label>صورة توضيحية</label>
                        <div class="custom-file">
                            <input required name="main_img" value="{{old('main_img')}}" type="file" accept="application/pdf,image/*"  class="custom-file-input" id="customFile">
                            <label class="custom-file-label" for="customFile">اختر</label>
                        </div>  
                        @error('main_img')
                        <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                      </div>
                        <div class="form-group col-md-12">
                        <label for="User_FirstName">الملخص بالعربي</label>
                        <textarea type="text" rows="20" name= "summary_ar" class="summernote form-control @error('summary_ar') is-invalid @enderror" required> {{old('summary_ar')}}</textarea>
                        @error('summary_ar')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                      </div>
                      <div class="form-group col-md-12">
                        <label for="User_FirstName">الملخص بالإنجليزي</label>
                        <textarea type="text" rows="20" name= "summary_en" class="summernote form-control @error('summary_en') is-invalid @enderror" required> {{old('summary_en')}}</textarea>
                        @error('summary_en')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                      </div>
                    <div class="form-group checkbox">
                    <label style="margin-left: 10px;margin-right: 10px;">
                    <input required {{ old('accept_conditions') ? ' checked' : '' }} name="accept_conditions" type="checkbox">
                    &nbsp; أوافق على الشروط والأحكام للإطلاع على الشروط والأحكام من
                    </label>
                    <label style="margin-left: 10px;">
                    <a style="margin-right: -10px;" class="btn btn-bold btn-sm btn-font-sm btn-label-danger" href="#" data-toggle="modal" data-target="#kt_modal_4">هنا</a>
                    </label>
                     </div>     
                     </div>
                    <div class="clearfix"></div>
                    <div class="form-group">
                      <button class="btn btn-danger" type="submit">
                      <i class="fa fa-save"></i>&nbsp;حفظ
                      </button>
                    </div>
                    </div>
                    </div>
                    <!--end:: Widgets/Last Updates-->
                  </div>
                </div>
              </div>
            </div>
          </div>
       </div>
      </div>
    </form>    
    </div>
  </div>
  <!-- end:: Content -->
<!--begin::Modal-->
<div class="modal fade" id="kt_modal_4" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">الأحكام والشروط</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                </button>
            </div>
            <div class="modal-body" style="height: 400px; overflow: auto;">
               <p style="font-size: 80%; text-align: justify;">{!!$settings->privacy!!}</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-dismiss="modal">إغلاق</button>
            </div>
        </div>
    </div>
</div>

<!--end::Modal-->    
</div>
@endsection