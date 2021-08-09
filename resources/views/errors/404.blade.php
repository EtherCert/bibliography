@extends('../layouts.include-site')
@section('title', 'الصفحة غير موجودة') 
@section('content')
<div class="error-area">
<div class="error-item">
<div class="d-table">
<div class="d-table-cell">
<div class="container">
<div class="error-img">
<img src="{{asset('site-assets/img/error-main.png')}}" alt="Error">
<img src="{{asset('site-assets/img/error-shape1.png')}}" alt="Shape">
<img src="{{asset('site-assets/img/error-shape2.png')}}" alt="Shape">
<img src="{{asset('site-assets/img/error-shape3.png')}}" alt="Shape">
</div>
<p>عذرًا، الصفحة غير موجوة</p>
</div>
</div>
</div>
</div>
</div>
@endsection