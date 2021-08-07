@extends('../layouts.include-admin')
@section('title', 'المشترك | التفاصيل') 
@section('content')
<div class="kt-content  kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor" id="kt_content">
  <!-- begin:: Content Head -->
  <div class="kt-subheader  kt-grid__item" id="kt_subheader">
    <div class="kt-container  kt-container--fluid ">
      <div class="kt-subheader__main">
        <h3 class="kt-subheader__title">دراسات {{$study_state}}</h3>
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
    <div class="row">
      <div class="col-md-12">
        <!--begin::Portlet-->
        <div class="kt-portlet">
          <div class="kt-portlet__head">
            <div class="kt-portlet__head-label">
              <h3 class="kt-portlet__head-title">دراسات {{$study_state}}</h3>
            </div>
            <div class="kt-portlet__head-toolbar"></div>
          </div>
          <!--begin::Form-->
          <div class="kt-portlet__body">
            <div class="row">
              <div class="col-md-12">
                    <form action="{{route('admin.studies.index', ['study_state' => $study_state])}}" method="get" novalidate="novalidate">
                    <div class="row">
                      <div class="col-md-5">
                        <div class="form-group">
                          <label for="Username">نوع الدراسة</label>
                          <select name="study_type" class="form-control">
                            <option value=""></option>
                            <option {{ $study_type == 'دراسة علمية'? ' selected' : '' }} value="دراسة علمية"> دراسة علمية</option>
                            <option {{ $study_type == 'دراسة في مرحلة دراسات عليا'? ' selected' : '' }} value="دراسة في مرحلة دراسات عليا">دراسة في مرحلة دراسات عليا</option>
                          </select>
                        </div>
                      </div>
                      <div class="col-md-5">
                        <div class="form-group">
                          <label for="Username">العنوان بالعربي</label>
                          <input value="{{$title_ar}}" class="form-control m-input m-input--square" name="title_ar" type="text" value="">
                        </div>
                      </div>
                      <div class="col-md-2">
                        <div class="form-group">
                          <button type="submit" class="btn btn-danger" style="margin-top: 25px;"><i class="la la-search"></i></button>
                        </div>
                      </div>
                    </div>
                  </form>
                  <div class="table-responsive">
                    <table class="table table-hover table-striped">
                      <thead>
                        <tr>
                          <th class="text-center" width="10%">#</th>
                          <th class="text-center">العنوان</th>
                          <th class="text-center">الباحث</th>
                          <th class="text-center">الناشر</th>
                          <th class="text-center">نوع الدراسة</th>
                          <th class="text-center">الصفحات</th>
                          <th class="text-center">المرحلة</th>
                          <th class="text-center">الحالة</th>
                          <th class="text-center" width="10%"></th>
                        </tr>
                      </thead>
                      <tbody>
                        @if(count($studies) == 0)
                        <tr>
                          <td class="text-center" colspan="9">
                            <div class="alert alert-solid-brand alert-bold" role="alert">
                              <div class="alert-text">لا يوجد دراسات لعرضها </div>
                            </div>
                          </td>
                        </tr>
                        @endif
                        <?php $count = 0;?>
                        @foreach($studies as $study)
                        <?php 
                          $style = 'btn-label-danger'; 
                          if($study->study_state == 'قيد المراجعة')
                          $style = 'btn-label-warning';
                          else if($study->study_state == 'منشورة')
                          $style = 'btn-label-success';    
                          ?>
                        <tr>
                          <td class="text-center">{{++$count}}</td>
                          <td class="text-center">{{$study->title_ar}}</td>
                          <td class="text-center">{{$study->researcher_name}}</td>
                          <td class="text-center">{{$study->publisher}}</td>
                          <td class="text-center">{{$study->study_type}}</td>
                          <td class="text-center">
                            <span class="kt-badge kt-badge--danger kt-badge--md">{{$study->number_of_pages}}</span>
                          </td>
                          <td class="text-center">{{$study->phase}}</td>
                          <td class="text-center">
                            <span class="btn btn-bold btn-sm btn-font-sm {{$style}}">{{$study->study_state}}</span>
                          </td>
                          <td class="fitwidth">
                            <div class="kt-widget2__actions">
                              <a href="#" class="btn btn-clean btn-sm btn-icon btn-icon-md" data-toggle="dropdown" aria-expanded="false">
                              <i class="flaticon-more-1"></i>
                              </a>
                              <div class="dropdown-menu dropdown-menu-fit dropdown-menu-right" x-placement="top-end" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(15px, 5px, 0px);">
                                <ul class="kt-nav">
                                  <li class="kt-nav__item" style="float: center;">
                                    <a href="{{route('admin.study.details' , ['id' => $study->id])}}" class="kt-nav__link"> 
                                    <i class="kt-nav__link-icon fa fa-eye"></i>
                                    <span class="kt-nav__link-text">التفاصيل</span>
                                    </a>
                                  </li> 
                                  <li class="kt-nav__item" style="float: center;">
                                    <a href="{{route('admin.members.details', ['id' => $study->member_id])}}" class="kt-nav__link"> 
                                    <i class="kt-nav__link-icon fa fa-eye"></i>
                                    <span class="kt-nav__link-text">تفاصيل المشترك</span>
                                    </a>
                                  </li>
                                </ul>
                              </div>
                            </div>
                          </td>
                        </tr>
                        @endforeach
                      </tbody>
                    </table>
                    <div class="text-center">
                      <div class="ls-button-group demo-btn ls-table-pagination">
                        <div class="pagination-container">
                          {{$studies->links()}}
                        </div>
                      </div>
                    </div>
                  </div>
              </div>
            </div>
          </div>
          <div class="kt-portlet__foot"></div>
          <!--end::Form-->
        </div>
        <!--end::Portlet-->
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
    if($study_state == 'قيد المراجعة')
        $var = "under_review";
    else if($study_state == 'منشورة')
        $var = "published";
?>
document.getElementById("{{$var}}").className += " kt-menu__item  kt-menu__item--active";
</script> 
@endsection