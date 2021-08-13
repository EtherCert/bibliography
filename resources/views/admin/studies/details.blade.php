<?php 
$mobile = $study->userMembers->mobile;
if(substr($mobile, 0, 3 ) !== "966" && substr($mobile, 0, 4 ) !== "+966" && substr($mobile, 0, 5 ) !== "00966")
$mobile = '966'.$mobile;
?>
@extends('../layouts.include-admin')
@section('title', 'الدراسة | التفاصيل') 
@section('content')
<div class="kt-content  kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor" id="kt_content">
  <!-- begin:: Content Head -->
  <div class="kt-subheader  kt-grid__item" id="kt_subheader">
    <div class="kt-container  kt-container--fluid ">
      <div class="kt-subheader__main">
        <h3 class="kt-subheader__title">الدراسة</h3>
        <span class="kt-subheader__separator kt-subheader__separator--v"></span>
        <span class="kt-subheader__desc">التفاصيل</span>
        <div class="kt-input-icon kt-input-icon--right kt-subheader__search kt-hidden">
          <input type="text" class="form-control" placeholder="Search order..." id="generalSearch">
          <span class="kt-input-icon__icon kt-input-icon__icon--right">
          <span><i class="flaticon2-search-1"></i></span>
          </span>
        </div>
      </div>
      <div class="kt-portlet__head-toolbar" style="margin-top: 7px;">
        <div class="kt-demo-icon">
          <a title="تواصل مع المشترك عبر الواتساب" href="http://wa.me/{{$mobile}}" class="kt-demo-icon__preview kt-font-success">
          <i class="fab fa-whatsapp"></i>
          </a>
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
                المعلومات الأساسية
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" data-toggle="tab" href="#kt_apps_user_edit_tab_4" role="tab">
                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1" class="kt-svg-icon">
                  <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                    <rect id="bound" x="0" y="0" width="24" height="24" />
                    <path d="M6,2 L18,2 C18.5522847,2 19,2.44771525 19,3 L19,12 C19,12.5522847 18.5522847,13 18,13 L6,13 C5.44771525,13 5,12.5522847 5,12 L5,3 C5,2.44771525 5.44771525,2 6,2 Z M7.5,5 C7.22385763,5 7,5.22385763 7,5.5 C7,5.77614237 7.22385763,6 7.5,6 L13.5,6 C13.7761424,6 14,5.77614237 14,5.5 C14,5.22385763 13.7761424,5 13.5,5 L7.5,5 Z M7.5,7 C7.22385763,7 7,7.22385763 7,7.5 C7,7.77614237 7.22385763,8 7.5,8 L10.5,8 C10.7761424,8 11,7.77614237 11,7.5 C11,7.22385763 10.7761424,7 10.5,7 L7.5,7 Z" id="Combined-Shape" fill="#000000" opacity="0.3" />
                    <path d="M3.79274528,6.57253826 L12,12.5 L20.2072547,6.57253826 C20.4311176,6.4108595 20.7436609,6.46126971 20.9053396,6.68513259 C20.9668779,6.77033951 21,6.87277228 21,6.97787787 L21,17 C21,18.1045695 20.1045695,19 19,19 L5,19 C3.8954305,19 3,18.1045695 3,17 L3,6.97787787 C3,6.70173549 3.22385763,6.47787787 3.5,6.47787787 C3.60510559,6.47787787 3.70753836,6.51099993 3.79274528,6.57253826 Z" id="Combined-Shape" fill="#000000" />
                  </g>
                </svg>
                 التفاصيل
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" data-toggle="tab" href="#kt_apps_user_edit_tab_2" role="tab">
                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1" class="kt-svg-icon">
                  <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                    <polygon id="Shape" points="0 0 24 0 24 24 0 24" />
                    <path d="M12,11 C9.790861,11 8,9.209139 8,7 C8,4.790861 9.790861,3 12,3 C14.209139,3 16,4.790861 16,7 C16,9.209139 14.209139,11 12,11 Z" id="Mask" fill="#000000" fill-rule="nonzero" opacity="0.3" />
                    <path d="M3.00065168,20.1992055 C3.38825852,15.4265159 7.26191235,13 11.9833413,13 C16.7712164,13 20.7048837,15.2931929 20.9979143,20.2 C21.0095879,20.3954741 20.9979143,21 20.2466999,21 C16.541124,21 11.0347247,21 3.72750223,21 C3.47671215,21 2.97953825,20.45918 3.00065168,20.1992055 Z" id="Mask-Copy" fill="#000000" fill-rule="nonzero" />
                  </g>
                </svg>
                ملخص الدراسة
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" data-toggle="tab" href="#kt_apps_user_edit_tab_3" role="tab">
                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1" class="kt-svg-icon">
                  <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                    <rect id="bound" x="0" y="0" width="24" height="24" />
                    <path d="M4,4 L11.6314229,2.5691082 C11.8750185,2.52343403 12.1249815,2.52343403 12.3685771,2.5691082 L20,4 L20,13.2830094 C20,16.2173861 18.4883464,18.9447835 16,20.5 L12.5299989,22.6687507 C12.2057287,22.8714196 11.7942713,22.8714196 11.4700011,22.6687507 L8,20.5 C5.51165358,18.9447835 4,16.2173861 4,13.2830094 L4,4 Z" id="Path-50" fill="#000000" opacity="0.3" />
                    <path d="M12,11 C10.8954305,11 10,10.1045695 10,9 C10,7.8954305 10.8954305,7 12,7 C13.1045695,7 14,7.8954305 14,9 C14,10.1045695 13.1045695,11 12,11 Z" id="Mask" fill="#000000" opacity="0.3" />
                    <path d="M7.00036205,16.4995035 C7.21569918,13.5165724 9.36772908,12 11.9907452,12 C14.6506758,12 16.8360465,13.4332455 16.9988413,16.5 C17.0053266,16.6221713 16.9988413,17 16.5815,17 C14.5228466,17 11.463736,17 7.4041679,17 C7.26484009,17 6.98863236,16.6619875 7.00036205,16.4995035 Z" id="Mask-Copy" fill="#000000" opacity="0.3" />
                  </g>
                </svg>
                الإجراءات
              </a>
            </li>
          </ul>
        </div>
      </div>
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
                        <!--begin::widget 12-->
                        <div class="kt-widget4">
                          <div class="kt-widget4__item">
                            <p class="">عنوان الدراسة بالعربي: 
                              {{$study->title_ar}}
                            </p>
                            <span class="kt-widget4__icon">
                            <i class="flaticon-pie-chart-1 "></i>
                            </span>
                          </div>
                          <div class="kt-widget4__item">
                            <p class="">عنوان الدراسة بالإنجليزي: 
                              {{$study->title_en}}
                            </p>
                            <span class="kt-widget4__icon">
                            <i class="flaticon2-rocket  "></i>
                            </span>
                          </div>
                          <div class="kt-widget4__item">
                            <p class="">
                              تاريخ النشر: 
                              {{$study->publish_date}}
                            </p>
                            <span class="kt-widget4__icon">
                            <i class="fa fa-calendar "></i>
                            </span>
                          </div>
                        <?php 
                          $style = 'btn-label-danger'; 
                          if($study->study_state == 'قيد المراجعة')
                          $style = 'btn-label-warning';
                          else if($study->study_state == 'منشورة')
                          $style = 'btn-label-success';    
                          ?>    
                          <div class="kt-widget4__item">
                            <p>
                              حالة الدراسة: 
                              <span class="btn btn-bold btn-sm btn-font-sm {{$style}}">{{$study->study_state}}</span>
                            </p>
                            <span class="kt-widget4__icon">
                            <i class="fa fa-certificate "></i>
                            </span>
                          </div>
                          <div class="kt-widget4__item">
                            <p class="">
                              نوع الدراسة:
                              {{$study->study_type}}
                            </p>
                            <span class="kt-widget4__icon">
                            <i class="flaticon2-line-chart "></i>
                            </span>
                          </div>
                          <div class="kt-widget4__item">
                            <p class="">
                              عدد الصفحات:
                              <span class="kt-badge kt-badge--danger kt-badge--md">{{$study->number_of_pages}}</span>
                            </p>
                            <span class="kt-widget4__icon">
                            <i class="fa fa-book"></i>
                            </span>
                          </div>
                        </div>
                        <!--end::Widget 12-->
                      </div>
                    </div>
                    <!--end:: Widgets/Last Updates-->
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="tab-pane" id="kt_apps_user_edit_tab_2" role="tabpanel">
            <div class="kt-form kt-form--label-right">
              <div class="kt-form__body">
                <div class="kt-section kt-section--first">
                  <div class="col-xl-12 col-lg-12 order-lg-1 order-xl-1">
                    <!--begin:: Widgets/Last Updates-->
                    <div class="kt-portlet kt-portlet--height-fluid">
                      <div class="kt-portlet__body">
                        <!--begin::widget 12-->
                        <div class="kt-widget4">
                            <h5>ملخص الدراسة بالعربي: 
                             <a href="{{route('admin.study.download-summary-ar', ['id' => $study->id])}}" class="btn btn-label-success btn-sm btn-upper">
                            <span class="kt-widget4__icon">
                            <i class="fas fa-download "></i>
                            </span> تحميل</a>
                            </h5>
                          <div class="kt-widget4__item">
                            <p class="">
                              {!!$study->summary_ar!!}
                            </p>
                          </div>
                            <br>
                            <h5>ملخص الدراسة بالإنجليزي: 
                            <a href="{{route('admin.study.download-summary-en', ['id' => $study->id])}}" class="btn btn-label-success btn-sm btn-upper">
                            <span class="kt-widget4__icon">
                            <i class="fas fa-download "></i>
                            </span> تحميل</a>
                            </h5>
                          <div class="kt-widget4__item">
                            <p class=""> 
                               {!!$study->summary_en!!}
                            </p>
                          </div>
                        </div>
                        <!--end::Widget 12-->
                      </div>
                    </div>
                    <!--end:: Widgets/Last Updates-->
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="tab-pane" id="kt_apps_user_edit_tab_3" role="tabpanel">
                <div class="kt-form kt-form--label-right">
              <div class="kt-form__body">
                <div class="kt-section kt-section--first">
                  <div class="col-xl-12 col-lg-12 order-lg-1 order-xl-1">
                    <!--begin:: Widgets/Last Updates-->
                    <div class="kt-portlet kt-portlet--height-fluid">
                      <div class="kt-portlet__body">
                        <!--begin::widget 12-->
                        <div class="kt-widget4">
                            <h5>ملف الدراسة: 
                            <a href="{{route('admin.study.download-study', ['id' => $study->id])}}" class="btn btn-label-success btn-sm btn-upper">
                            <span class="kt-widget4__icon">
                            <i class="fas fa-download "></i>
                            </span> تحميل</a>
                            <a title="مشاهدة" href="{{asset('storage/'.$study->study_file)}}" class="btn btn-label-primary btn-sm btn-upper">
                            <span class="kt-widget4__icon">
                            <i class="fas fa-eye "></i>
                            </span></a>
                            </h5>
                        @if($study->study_type == 'دراسة في مرحلة دراسات عليا')    
                          <div class="kt-widget4__item">
                          </div>
                            <br>
                            <h5>إجازة البحث من القسم العلمي: 
                            <a href="{{route('admin.study.download-study-leave', ['id' => $study->id])}}" class="btn btn-label-success btn-sm btn-upper">
                            <span class="kt-widget4__icon">
                            <i class="fas fa-download "></i>
                            </span> تحميل</a>
                            <a title="مشاهدة" href="{{asset('storage/'.$study->search_leave_file)}}" class="btn btn-label-primary btn-sm btn-upper">
                            <span class="kt-widget4__icon">
                            <i class="fas fa-eye "></i>
                            </span></a>
                            </h5>
                        @endif   
                        <div class="kt-widget4__item"></div>
                            <div class="kt-widget4__item" style="margin:auto;">
                <form action="{{route('admin.change-status-or-transfere', ['id' => $study->id])}}" method="post" novalidate="novalidate">
                    @csrf
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <label for="Username">الحالة</label>
                          <select name="study_state" class="form-control">
                            <option value=""></option>
                            <option {{ $study->study_state == 'قيد المراجعة'? ' selected' : '' }} value="قيد المراجعة">قيد المراجعة</option>
                            @if($study->userAdmins) 
                            @if($study->userAdmins->type != 3) 
                            <option {{ $study->study_state == 'منشورة'? ' selected' : '' }} value="منشورة">منشورة</option>
                            @endif  
                            @endif 
                            <option {{ $study->study_state == 'مرفوضة'? ' selected' : '' }} value="مرفوضة">مرفوضة</option>
                          </select>
                        </div>
                      </div>
                     @if($study->userAdmins)
                     @if($study->userAdmins->type == 3)  
                        <?php $users = App\Models\User::where('type' , '=' , '1')
                                       ->orWhere('type' , '=' , '2')->get();
                        ?> 
                      <div class="col-md-12">
                        <div class="form-group">
                          <label for="Username">إحالة للمعتمد أو المسؤول</label>
                          <select name="admin_id" class="form-control selectpicker" data-live-search="true">
                            <option value=""></option>
                            @foreach($users as $user)  
                            <option {{ old('admin_id') == $user->id ? ' selected' : '' }} value="{{$user->id}}">{{$user->name}}</option>
                            @endforeach  
                          </select>
                        </div>
                      </div>
                      @endif     
                      @endif     
                      <div class="col-md-12">
                        <div class="form-group">
                          <label for="Username">ملاحظات الأدمن</label>
                            <textarea rows="6" value="" class="form-control m-input m-input--square" name="admin_note">{{$study->admin_note}}</textarea>
                        </div>
                      </div>
                      <div class="col-md-12">
                        <div class="form-group">
                          <label for="Username">سبب الرفض</label>
                            <textarea rows="6" value="" class="form-control m-input m-input--square" name="refuse_reason">{{$study->refuse_reason}}</textarea>
                        </div>
                      </div>
                      <div class="col-md-2">
                        <div class="form-group">
                          <button type="submit" class="btn btn-danger" style="margin-top: 25px;">حفظ</button>
                        </div>
                      </div>
                    </div>
                  </form>
                                </div>
                  
                        </div>
                        <!--end::Widget 12-->
                      </div>
                    </div>
                    <!--end:: Widgets/Last Updates-->
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="tab-pane" id="kt_apps_user_edit_tab_4" role="tabpanel">
            <div class="kt-form kt-form--label-right">
              <div class="kt-form__body">
                <div class="kt-section kt-section--first">
                  <div class="col-xl-12 col-lg-12 order-lg-1 order-xl-1">
                    <!--begin:: Widgets/Last Updates-->
                    <div class="kt-portlet kt-portlet--height-fluid">
                      <div class="kt-portlet__body">
                        <!--begin::widget 12-->
                        <div class="kt-widget4">
                          <div class="kt-widget4__item">
                            <p class="">المشترك: 
                             <span><a title="تفاصيل المشترك" href="{{route('admin.members.details', ['id' => $study->userMembers->id])}}">{{$study->userMembers->name}}</a></span>
                            </p>
                            <span class="kt-widget4__icon">
                            <i class="fa fa-user "></i>
                            </span>
                          </div>
                          <div class="kt-widget4__item">
                            <p class="">التخصص: 
                              {{$study->major}}
                            </p>
                            <span class="kt-widget4__icon">
                            <i class="flaticon2-rocket  "></i>
                            </span>
                          </div>
                          <div class="kt-widget4__item">
                            <p class="">
                              اسم الباحث: 
                              {{$study->researcher_name}}
                            </p>
                            <span class="kt-widget4__icon">
                            <i class="fas fa-search "></i>
                            </span>
                          </div>
                        @if($study->study_type == 'دراسة في مرحلة دراسات عليا')    
                          <div class="kt-widget4__item">
                            <p class="">
                              اسم المشرف: 
                              {{$study->supervisor_name}}
                            </p>
                            <span class="kt-widget4__icon">
                            <i class="fas fa-user-cog"></i>
                            </span>
                          </div>
                          <div class="kt-widget4__item">
                            <p class="">
                              المرحلة: 
                              {{$study->phase}}
                            </p>
                            <span class="kt-widget4__icon">
                            <i class="flaticon2-line-chart "></i>
                            </span>
                          </div>
                        <div class="kt-widget4__item">
                            <p class="">
                              القسم العلمي: 
                              {{$study->department_name}}
                            </p>
                            <span class="kt-widget4__icon">
                            <i class="flaticon2-line-chart "></i>
                            </span>
                          </div>    
                        @endif    
                          <div class="kt-widget4__item">
                            <p class="">
                              الناشر: 
                              {{$study->publisher}}
                            </p>
                            <span class="kt-widget4__icon">
                            <i class="fas fa-user "></i>
                            </span>
                          </div> 
                          <div class="kt-widget4__item">
                            <p class="">
                              مكان النشر: 
                              {{$study->publish_place}}
                            </p>
                            <span class="kt-widget4__icon">
                            <i class="fas fa-map"></i>
                            </span>
                          </div>
                          <div class="kt-widget4__item">
                            <p class="">
                               كلمات مفتاحية: 
                              {{$study->keywords}}
                            </p>
                            <span class="kt-widget4__icon">
                            <i class="fas fa-gem"></i>
                            </span>
                          </div>
                        </div>
                        <!--end::Widget 12-->
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
    </div>
  </div>
  <!-- end:: Content -->
</div>
<script>
document.getElementById("studies").className += " kt-menu__item--active";
document.getElementById("sub-studies").className += " kt-menu__item  kt-menu__item--active";
<?php 
    $var = "refused";
    if($study->study_state == 'قيد المراجعة')
        $var = "under_review";
    else if($study->study_state == 'منشورة')
        $var = "published";
?>
document.getElementById("{{$var}}").className += " kt-menu__item  kt-menu__item--active";
</script>               
@endsection