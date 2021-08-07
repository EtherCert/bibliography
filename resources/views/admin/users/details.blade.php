<?php 
  $mobile = $user->mobile;
  if(substr($mobile, 0, 3 ) !== "966" && substr($mobile, 0, 4 ) !== "+966" && substr($mobile, 0, 5 ) !== "00966")
  $mobile = '966'.$mobile;
  ?>
@extends('../layouts.include-admin')
@section('title', 'المستخدم | التفاصيل') 
@section('content')
<div class="kt-content  kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor" id="kt_content">
  <!-- begin:: Content Head -->
  <div class="kt-subheader  kt-grid__item" id="kt_subheader">
    <div class="kt-container  kt-container--fluid ">
      <div class="kt-subheader__main">
        <h3 class="kt-subheader__title">المستخدم</h3>
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
          <a title="تواصل عبر الواتساب" href="http://wa.me/{{$mobile}}" class="kt-demo-icon__preview kt-font-success">
          <i class="fab fa-whatsapp"></i>
          </a>
        </div>
      </div>
    </div>
  </div>
  <!-- end:: Content Head -->
  <!-- begin:: Content -->
  <div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">
    <div class="row">
      <div class="col-xl-12 col-lg-12 order-lg-1 order-xl-1">
        <!--begin:: Widgets/Last Updates-->
        <div class="kt-portlet kt-portlet--height-fluid">
          <div class="kt-portlet__head">
            <div class="kt-portlet__head-label">
              <h3 class="kt-portlet__head-title">
                بيانات المستخدم  {{$user->name}}
              </h3>
            </div>
          </div>
          <div class="kt-portlet__body">
            <!--begin::widget 12-->
            <div class="kt-widget4">
              <div class="kt-widget4__item">
                <p class="">الإسم: 
                  {{$user->name}}
                </p>
                <span class="kt-widget4__icon">
                <i class="flaticon-pie-chart-1 "></i>
                </span>
              </div>
              <div class="kt-widget4__item">
                <p class="">اسم المستخدم: 
                  {{$user->username}}
                </p>
                <span class="kt-widget4__icon">
                <i class="flaticon2-rocket  "></i>
                </span>
              </div>
              <div class="kt-widget4__item">
                <p class="">
                  تاريخ إنشاء الحساب: 
                  {{explode(' ',$user->created_at)[0]}}
                </p>
                <span class="kt-widget4__icon">
                <i class="flaticon2-line-chart "></i>
                </span>
              </div>
              <div class="kt-widget4__item">
                <p class="kt-font-{{$user->status == 'مفعل' ? 'success':'danger'}}">
                  الحالة:
                  {{$user->status}}
                </p>
                <span class="kt-widget4__icon">
                <i class="flaticon-safe-shield-protection kt-font-{{$user->status == 'مفعل' ? 'success':'danger'}}"></i>
                </span>
              </div>
              <div class="kt-widget4__item">
                <p class="">
                  رقم الجوال: 
                  {{$user->mobile}}
                </p>
                <span class="kt-widget4__icon">
                <i class="fas fa-phone "></i>
                </span>
              </div>
              <div class="kt-widget4__item">
                <p class="">
                  رقم السجل المدني: 
                  {{$user->identity}}
                </p>
                <span class="kt-widget4__icon">
                <i class="fa fa-certificate "></i>
                </span>
              </div>
              <div class="kt-widget4__item">
                <p class="kt-font-{{$user->email_verified_at != null? 'success':'danger'}}">
                  البريد الإلكتروني:  
                  {{$user->email}}
                </p>
                <span class="kt-widget4__icon">
                <i class="fas fa-envelope kt-font-{{$user->email_verified_at != null? 'success':'danger'}}"></i>
                </span>
              </div>
              <div class="kt-widget4__item">
                <p class="">
                  تاريخ الميلاد  
                  {{$user->birthday}}
                </p>
                <span class="kt-widget4__icon">
                <i class="fa fa-calendar "></i>
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
  <!-- end:: Content -->
</div>
<script>
   document.getElementById("users").className += " kt-menu__item--active";
   document.getElementById("sub-users").className += " kt-menu__item  kt-menu__item--active";
   document.getElementById("admins").className += " kt-menu__item  kt-menu__item--active";
</script>              
@endsection