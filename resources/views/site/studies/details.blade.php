@extends('../layouts.include-site')
@section('title', 'تفاصيل الدراسة') 
@section('content')
<div class="page-title-area">
  <div class="d-table">
    <div class="d-table-cell">
      <div class="container">
        <div class="title-item">
          <h5 style="color: white;">{{$study->title_ar}}</h5>
          <ul>
            <li>
              <a href="/">الرئيسة</a>
            </li>
            <li>
              <i class='bx bx-chevrons-right'></i>
            </li>
            <li>
              <span>التفاصيل</span>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="blog-details-area ptb-100">
  <div class="container">
    <div class="row">
      <div class="col-lg-9">
        <div class="details-item" style="text-align: justify;">
          <div class="details-img">
            <img src="{{asset('storage/'.$study->main_img)}}" alt="التفاصيل" style="border-radius: 20px !important; width: 900px; height: 500px;">
            <ul>
              <li>
                <i class='bx bx-user'></i>
                <a>{{$study->researcher_name}}</a>
              </li>
              <li>
                <i class='bx bx-calendar-alt' title="تاريخ النشر"></i>
                {{explode(' ',$study->publish_date)[0]}}
              </li>
            </ul>
            <h5>{{$study->title_ar}}</h5>
            <h5 style="float: left;">{{$study->title_en}}</h5><br><br>
            <blockquote style="font-size: 80%;">
              <span>الملخص بالعربي</span>
              <br>
              {!!$study->summary_ar!!}
            </blockquote> 
            <blockquote dir="ltr" style="font-size: 90%;">
              <span dir="rtl">الملخص بالإنجليزي</span>
              <br>
              {!!$study->summary_en!!}
            </blockquote>
          </div>
        </div>
      </div>
      <div class="col-lg-3">
        <div class="widget-area">
          <div class="search widget-item">
            <form action="{{route('studies')}}#result" method="get">
              <input name="title_ar" type="text" class="form-control" placeholder="بحث ...">
              <button type="submit" class="btn">
              <i class='bx bx-search'></i>
              </button>
            </form>
          </div>
          <div class="tags widget-item">
            <h3>معلومات الدراسة</h3>
            <ul>
            <li>
            <span>التخصص:</span>
            {{$study->major}}
            </li>
            <br><br>    
            <li>
            <span>المرحلة:</span>
            {{$study->phase}}
            </li>
            <br><br>    
            <li>
            <span>القسم:</span>
            {{$study->department_name}}
            </li>
            <br><br>    
            <li>
            <span>مكان النشر:</span>
            {{$study->publish_place}}
            </li>
            <br><br>    
            <li>
            <span>عدد الصفحات:</span>
            {{$study->number_of_pages}}
            </li> 
            <br><br>    
            <li>
            <span>نوع الدراسة:</span>
            {{$study->study_type}}
            </li>
            </ul>
            </div>
         <div class="tags widget-item">
            <h3>معلومات الأشخاص</h3>
            <ul>
            <li>
            <span>الباحث:</span>
            {{$study->researcher_name}}
            </li>
            <br><br>    
            <li>
            <span>المشرف:</span>
            {{$study->supervisor_name}}
            </li>
            <br><br>    
            <li>
            <span>الناشر:</span>
            {{$study->publisher}}
            </li>
            </ul>
            </div>
          <div class="tags widget-item">
          <?php 
            $keys = explode(',', $study->keywords);
           ?>
            <h3>كلمات مفتاحية</h3>
            <ul>
            @foreach($keys as $key)
            @if ($loop->last)
            @continue;
            @endif
                 <li>
                <a>{{$key}}</a>
              </li>
            @endforeach
            </ul>
          </div>
    <div class="related widget-item">
            <h3>المرفقات</h3>
            <div class="related-inner">
            <ul class="align-items-center">
            <li>
             <a style="margin-right: 25px;" target="_blank" href="{{asset('storage/'.$study->summary_ar_file)}}">الملخص بالعربي</a>
            <span style="margin-top: -23px;"><a title="تنزيل" href="{{route('member.study.download-summary-ar',['id' => $study->id])}}"><i class="bx bx-download"></i></a></span>
            </li>
            </ul>
            </div>   
            <div class="related-inner">
            <ul class="align-items-center">
            <li>
             <a style="margin-right: 25px;" target="_blank" href="{{asset('storage/'.$study->summary_en_file)}}">الملخص بالإنجليزي</a>
            <span style="margin-top: -23px;"><a title="تنزيل" href="{{route('member.study.download-summary-en',['id' => $study->id])}}"><i class="bx bx-download"></i></a></span>
            </li>
            </ul>
            </div>    
            <div class="related-inner">
            <ul class="align-items-center">
            <li>
             <a style="margin-right: 25px;" target="_blank" href="{{asset('storage/'.$study->study_file)}}">ملف الدراسة</a>
            <span style="margin-top: -23px;"><a title="تنزيل" href="{{route('member.study.download-study',['id' => $study->id])}}"><i class="bx bx-download"></i></a></span>
            </li>
            </ul>
            </div>    
            <div class="related-inner">
            <ul class="align-items-center">
            <li>
             <a style="margin-right: 25px;" target="_blank" href="{{asset('storage/'.$study->search_leave_file)}}">ملف الإجازة</a>
            <span style="margin-top: -23px;"><a title="تنزيل" href="{{route('member.study.download-study-leave',['id' => $study->id])}}"><i class="bx bx-download"></i></a></span>
            </li>
            </ul>
            </div>    
          </div>    
        </div>
      </div>
    </div>
  </div>
</div>
@endsection