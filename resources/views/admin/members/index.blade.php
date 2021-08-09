@extends('../layouts.include-admin')
@section('title', 'المشتركون') 
@section('content')
<div class="kt-content  kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor" id="kt_content">
  <!-- begin:: Content Head -->
  <div class="kt-subheader  kt-grid__item" id="kt_subheader">
    <div class="kt-container  kt-container--fluid ">
      <div class="kt-subheader__main">
        <h3 class="kt-subheader__title">المشتركون</h3>
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
              <h3 class="kt-portlet__head-title">المشتركون</h3>
            </div>
            <div class="kt-portlet__head-toolbar"></div>
            <div class="kt-portlet__head-toolbar" style="margin-top: 7px;">
                <a href="{{route('admin.members.excel')}}" class="btn btn-outline-success" class="popupFormBtn btn btn-success">
                <i class="fa fa-file-excel"></i>&nbsp;إكسل
                </a>
             </div>  
          </div>
          <!--begin::Form-->
          <div class="kt-portlet__body">
            <div class="row">
              <div class="col-md-12">
                <form action="{{ route('admin.members.index') }}" method="get" novalidate="novalidate">
                  <div class="row">
                    <div class="col-md-3">
                      <div class="form-group">
                        <label for="Username">الاسم</label>
                        <input value="{{$name}}" class="form-control m-input m-input--square" name="name" type="text" value="">
                      </div>
                    </div> 
                    <div class="col-md-3">
                      <div class="form-group">
                        <label for="Username">الجوال</label>
                        <input value="{{$mobile}}" class="form-control m-input m-input--square" name="mobile" type="text" value="">
                      </div>
                    </div>
                    <div class="col-md-3">
                      <div class="form-group">
                        <label>الإيميل</label>
                        <input value="{{$email}}" class="form-control m-input m-input--square" id="Name" name="email" type="text" value="">
                      </div>
                    </div>
                    <div class="col-md-3">
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
                        <th class="text-center">الاسم </th>
                        <th class="text-center">اسم المستخدم</th>
                        <th class="text-center">الإيميل</th>
                        <!-- <th class="text-center">تاريخ الميلاد</th>-->
                        <th class="text-center">الجوال</th>
                        <th class="text-center">رقم السجل المدني</th>
                        <!-- <th class="text-center">الحالة</th>-->
                        <th class="text-center" width="10%"></th>
                      </tr>
                    </thead>
                    <tbody>
                      @if(count($users) == 0)
                      <tr>
                        <td class="text-center" colspan="8">
                          <div class="alert alert-solid-brand alert-bold" role="alert">
                            <div class="alert-text">لا يوجد بيانات لعرضها </div>
                          </div>
                        </td>
                      </tr>
                      @endif
                      <?php $count = 0;?>
                      @foreach($users as $user)
                      <?php 
                        $mobile = $user->mobile;
                        if(substr($mobile, 0, 3 ) !== "966" && substr($mobile, 0, 4 ) !== "+966" && substr($mobile, 0, 5 ) !== "00966")
                        $mobile = '966'.$mobile;
                        ?>
                      @if(Auth::user()->id == $user->id)
                      @continue;
                      @endif
                      <tr>
                        <td class="text-center">{{++$count}}</td>
                        <td class="text-center">{{$user->name}}</td>
                        <td class="text-center">{{$user->username}}</td>
                        <td class="text-center" style="color: {{$user->email_verified_at ? '#0abb87' : '#fd397a'}}" title="{{$user->email_verified_at ? 'ايميل مفعل' : 'ايميل غير مفعل'}}">{{$user->email}}</td>
                        <!-- <td class="text-center">{{$user->birthday}}</td>-->
                        <td class="text-center">{{$user->mobile}}</td>
                        <td class="text-center">{{$user->identity}}</td>
                        <!--
                        <td class="text-center">
                          <span class="btn btn-bold btn-sm btn-font-sm {{$user->status == 'مفعل'? 'btn-label-success' :'btn-label-danger'}}">{{$user->status}}</span>
                        </td>
                        -->
                        <td class="fitwidth">
                          <div class="kt-widget2__actions">
                            <a href="#" class="btn btn-clean btn-sm btn-icon btn-icon-md" data-toggle="dropdown" aria-expanded="false">
                            <i class="flaticon-more-1"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-fit dropdown-menu-right" x-placement="top-end" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(15px, 5px, 0px);">
                              <ul class="kt-nav">
                                <li class="kt-nav__item" style="float: center;">
                                  <a href="{{ route('admin.users.edit', ['user' => $user->id]) }}" class="kt-nav__link"> 
                                  <i class="kt-nav__link-icon fa fa-edit"></i>
                                  <span class="kt-nav__link-text">تعديل</span>
                                  </a>
                                </li>
                                <li class="kt-nav__item" style="float: center;">
                                  <a href="{{ route('admin.members.details', ['id' => $user->id]) }}" class="kt-nav__link"> 
                                  <i class="kt-nav__link-icon fa fa-eye"></i>
                                  <span class="kt-nav__link-text">التفاصيل</span>
                                  </a>
                                </li>
                                <li class="kt-nav__item" style="float: center;">
                                  <a href="http://wa.me/{{$mobile}}" class="kt-nav__link"> 
                                  <i class="kt-nav__link-icon fab fa-whatsapp"></i>
                                  <span class="kt-nav__link-text">واتساب</span>
                                  </a>
                                </li>
                                <li class="kt-nav__item">
                                  <form method="post" class="form-inline" action="{{ route('admin.users.destroy', ['user' => $user->id]) }}">
                                    @csrf
                                    @method('DELETE')
                                    <button onclick="return confirm('هل أنت متأكد من حذف المشترك ؟')" style="margin-right: 12px;" type="submit" class="btn btn-elevate btn-pill">
                                    <i class="kt-nav__link-icon fa fa-trash"></i>
                                    <span class="kt-nav__link-text">حذف</span>
                                    </button>
                                  </form>
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
                        {{$users->links()}}
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
   document.getElementById("users").className += " kt-menu__item--active";
   document.getElementById("sub-users").className += " kt-menu__item  kt-menu__item--active";
   document.getElementById("members").className += " kt-menu__item  kt-menu__item--active";
</script>            
@endsection