<?php $settings = App\Models\Setting::where('id','=', 1)->get()->first();?>
@extends('../layouts.include-site')
@section('title', 'التحقق من البريد الإلكتروني') 
@section('content')
<div class="banner-area three">
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
        <div class="card-body">
          <h6 style="color: white; font-size: 15px;">
            @if (session('resent'))
            <div class="alert alert-success" role="alert">
              {{ __('تم إرسال رابط التحقق لبريدك؛ يرجى التحقق') }}
            </div>
            @endif
            {{ __('قبل المتابعة يرجى التحقق من البريد الإلكتروني') }}
            <br>
            <br>
            {{ __('إن لم يصلك البريد اطلب آخر') }}
            <br>
            <br>
          </h6>
          <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
            @csrf
            <div class="col-lg-3">
              <button type="submit" class="btn btn-primary">من هنا</button>
            </div>
          </form>
          <h6 style="color: white; font-size: 15px;">
            <br>
            <br>
            اذا كنت تواجهه مشكلات في تفعيل حسابك تواصل معنا عبر الواتس اب  اضغط 
            <span><a href="{{$settings->whatsapp}}"> هنا</a></span>
          </h6>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection