@extends('../layouts.include-admin')
@section('title', 'الإعدادات') 
@section('content')
<div class="kt-content  kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor" id="kt_content">
  <!-- begin:: Content Head -->
  <div class="kt-subheader  kt-grid__item" id="kt_subheader">
     <div class="kt-container  kt-container--fluid ">
        <div class="kt-subheader__main">
           <h3 class="kt-subheader__title">الإعدادات</h3>
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
            <a href="{{route('admin.settings.edit',['setting'=>$settings->id])}}" data-title="تعديل" class="popupFormBtn btn btn-danger">
            <i class="fa fa-edit"></i>&nbsp;تعديل 
            </a>
         </div>
     </div>
  </div>
  <!-- end:: Content Head -->
  <!-- begin:: Content -->
  <div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">
    <div class="row">
    <div class="col-xl-4 col-lg-6 order-lg-1 order-xl-1">
                    <!--begin:: Widgets/Last Updates-->
                    <div class="kt-portlet kt-portlet--height-fluid">
                        <div class="kt-portlet__head">
                            <div class="kt-portlet__head-label">
                                <h3 class="kt-portlet__head-title">
                                    معلومات أساسية
                                </h3>
                            </div>
                        </div>
                        <div class="kt-portlet__body">

                            <!--begin::widget 12-->
                            <div class="kt-widget4">
                                <div class="kt-widget4__item">

                                    <p class="kt-font-info">اسم الشركة: 
                                        {{$settings->siteName}}
                                    </p>
                                    <span class="kt-widget4__icon">
                                        <i class="flaticon-pie-chart-1 kt-font-info"></i>
                                    </span>
                                </div>
                                <div class="kt-widget4__item">
                                    <p class="kt-font-success">اسم الشركة بالإنجليزية: 
                                        {{$settings->siteNameEng}}
                                    </p>
                                    <span class="kt-widget4__icon">
                                        <i class="flaticon-safe-shield-protection  kt-font-success"></i>
                                    </span>
                                </div>
                                <div class="kt-widget4__item">
                                  <p class="kt-font-danger">
                                        عدد العناصر في الصفحات: 
                                        {{$settings->num_of_elements}}
                                    </p>
                                    <span class="kt-widget4__icon">
                                        <i class="flaticon2-line-chart kt-font-danger"></i>
                                    </span>
                                </div>
                                <div class="kt-widget4__item">
                     <p class="kt-font-primary">
                                        الشعار:
                     </p>
                      <span>
                        <a href="{{asset($settings->logo)}}"><img class="img-thumbnail img-responsive" alt="attachment" style="width:170px; height:100px;" src="{{asset($settings->logo)}}"></a>
                       </span> 

                        <span class="kt-widget4__icon">
                                        <i class="flaticon2-rocket kt-font-primary"></i>
                        </span>
                                </div>
                                <div class="kt-widget4__item">
                                    <p class="kt-font-warning">
                                        الختم: 
                                    </p>
                          <span>
                            <a href="{{asset($settings->seal)}}"><img class="img-thumbnail img-responsive" alt="attachment" style="width:170px; height:100px;" src="{{asset($settings->seal)}}"></a>
                          </span>
                                    <span class="kt-widget4__icon">
                                        <i class="fa fa-certificate kt-font-warning"></i>
                                    </span>
                                </div>
                            </div>

                            <!--end::Widget 12-->
                        </div>
                    </div>

                    <!--end:: Widgets/Last Updates-->
                </div>
    <div class="col-xl-4 col-lg-6 order-lg-1 order-xl-1">
                    <!--begin:: Widgets/Last Updates-->
                    <div class="kt-portlet kt-portlet--height-fluid">
                        <div class="kt-portlet__head">
                            <div class="kt-portlet__head-label">
                                <h3 class="kt-portlet__head-title">
                                    معلومات التواصل الإجتماعي
                                </h3>
                            </div>
                        </div>
                        <div class="kt-portlet__body">
                            <!--begin::widget 12-->
                            <div class="kt-widget4">
                                <div class="kt-widget4__item">
                                    <span class="kt-widget4__icon">
                                        <i class="fas fa-envelope kt-font-info"></i>
                                    </span>
                                    <p class="kt-widget4__title kt-widget4__title--light">
                                        {{$settings->email}}
                                    </p>
                                </div>
                                <div class="kt-widget4__item">
                                    <span class="kt-widget4__icon">
                                        <i class="fas fa-phone  kt-font-success"></i>
                                    </span>
                                    <p class="kt-widget4__title kt-widget4__title--light">
                                        {{$settings->mobile}}
                                    </p>
                                </div>
                                <div class="kt-widget4__item">
                                    <span class="kt-widget4__icon">
                                        <i class="fas fa-map-marker-alt kt-font-danger"></i>
                                    </span>
                                    <p class="kt-widget4__title kt-widget4__title--light">
                                        {{$settings->address}}
                                    </p>
                                </div>
                                <div class="kt-widget4__item">
                                    <span class="kt-widget4__icon">
                                        <i class="fab fa-twitter kt-font-primary"></i>
                                    </span>
                                    <p class="kt-widget4__title kt-widget4__title--light">
                                        {{$settings->twitter}}
                                    </p>
                                </div>	
                                <div class="kt-widget4__item">
                                    <span class="kt-widget4__icon">
                                        <i class="fab fa-instagram kt-font-black"></i>
                                    </span>
                                    <p class="kt-widget4__title kt-widget4__title--light">
                                        {{$settings->instegram}}
                                    </p>
                                </div>
                                <div class="kt-widget4__item">
                                    <span class="kt-widget4__icon">
                                        <i class="fab fa-facebook-f kt-font-brand"></i>
                                    </span>
                                    <a href="#" class="kt-widget4__title kt-widget4__title--light">
                                        {{$settings->facebook}}
                                    </a>
                                </div>
                                <div class="kt-widget4__item">
                                    <span class="kt-widget4__icon">
                                        <i class="fab fa-snapchat-ghost kt-font-warning"></i>
                                    </span>
                                    <a href="#" class="kt-widget4__title kt-widget4__title--light">
                                        {{$settings->snapchat}}
                                    </a>
                                </div>
                                 <div class="kt-widget4__item">
                                    <span class="kt-widget4__icon">
                                        <i class="fab fa-whatsapp  kt-font-success"></i>
                                    </span>
                                    <p class="kt-widget4__title kt-widget4__title--light">
                                        {{$settings->whatsapp}}
                                    </p>
                                </div>
                            </div>

                            <!--end::Widget 12-->
                        </div>
                    </div>

                    <!--end:: Widgets/Last Updates-->
                </div>
    <div class="col-xl-12 col-lg-12 order-lg-1 order-xl-1">
                    <!--begin:: Widgets/Last Updates-->
                    <div class="kt-portlet kt-portlet--height-fluid">
                        <div class="kt-portlet__head">
                            <div class="kt-portlet__head-label">
                                <h3 class="kt-portlet__head-title">
                                    الشروط والأحكام
                                </h3>
                            </div>
                        </div>
                        <div class="kt-portlet__body">

                            <!--begin::widget 12-->
                            <div class="kt-widget4">
                                <div class="kt-widget4__item">
                                    <p class="kt-widget4__title kt-widget4__title--light">
                                        {!!$settings->privacy!!}
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
  <!-- end:: Content -->
</div>
<script>
   document.getElementById("manage").className += " kt-menu__item--active";
   document.getElementById("sub-manager").className += " kt-menu__item  kt-menu__item--active";
   document.getElementById("settings").className += " kt-menu__item  kt-menu__item--active";
</script>            
@endsection