@extends('../layouts.include-admin')
@section('title', 'رسائل الزوار') 
@section('content')
<div class="kt-content  kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor" id="kt_content">
  <!-- begin:: Content Head -->
  <div class="kt-subheader  kt-grid__item" id="kt_subheader">
    <div class="kt-container  kt-container--fluid ">
      <div class="kt-subheader__main">
        <h3 class="kt-subheader__title">رسائل الزوار</h3>
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
              <h3 class="kt-portlet__head-title">رسائل الزوار</h3>
            </div>  
            <div class="kt-portlet__head-toolbar"></div>
            @if(count($contacts) > 0)  
              <div class="kt-portlet__head-toolbar" style="margin-top: 7px;">
                <a onclick="return confirm('هل أنت متأكد من حذف كافة الرسائل ؟')" style="font-size: 70%;" href="{{route('admin.contacts.delete.all')}}" class="btn btn-outline-danger">
                <i class="fa fa-trash"></i>&nbsp;حذف الكل
                </a>
             </div>
            @endif
          </div>
          <!--begin::Form-->
          <div class="kt-portlet__body">
            <div class="row">
              <div class="col-md-12">
               <div class="table-responsive">
                  <table class="table table-hover table-striped">
                    <thead>
                      <tr>
                        <th class="text-center" width="10%">#</th>
                        <th class="text-center">الاسم </th>
                        <th class="text-center">الموضوع</th>
                        <th class="text-center">الجوال</th>
                        <th class="text-center">الحالة</th>
                        <th class="text-center" width="10%"></th>
                      </tr>
                    </thead>
                    <tbody>
                      @if(count($contacts) == 0)
                      <tr>
                        <td class="text-center" colspan="8">
                          <div class="alert alert-solid-brand alert-bold" role="alert">
                            <div class="alert-text">لا يوجد رسائل لعرضها </div>
                          </div>
                        </td>
                      </tr>
                      @endif
                      <?php $count = 0;?>
                      @foreach($contacts as $contact)
                      <?php 
                        $mobile = $contact->mobile;
                        if(substr($mobile, 0, 3 ) !== "966" && substr($mobile, 0, 4 ) !== "+966" && substr($mobile, 0, 5 ) !== "00966")
                        $mobile = '966'.$mobile;
                        ?>
                      <tr>
                        <td class="text-center">{{++$count}}</td>
                        <td class="text-center">{{$contact->name}}</td>
                        <td class="text-center">{{$contact->subject}}</td>
                        <td class="text-center">{{$contact->mobile}}</td>
                        <td class="text-center">
                          <span class="btn btn-bold btn-sm btn-font-sm {{$contact->status == 'لم يتم الرد'? 'btn-label-danger' :'btn-label-success'}}">{{$contact->status}}</span>
                        </td>
                        <td class="fitwidth">
                          <div class="kt-widget2__actions">
                            <a href="#" class="btn btn-clean btn-sm btn-icon btn-icon-md" data-toggle="dropdown" aria-expanded="false">
                            <i class="flaticon-more-1"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-fit dropdown-menu-right" x-placement="top-end" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(15px, 5px, 0px);">
                              <ul class="kt-nav">
                                <li class="kt-nav__item" style="float: center;">
                                  <a  data-details="{{$contact->details}}"data-c_email="{{$contact->email}}"  class="kt-nav__link" data-toggle="modal" data-target="#kt_modal_1">  
                                  <i class="kt-nav__link-icon fa fa-eye"></i>
                                  <span class="kt-nav__link-text">التفاصيل</span>
                                  </a>
                                </li>  
                                <li class="kt-nav__item" style="float: center;">
                                  <a href="http://wa.me/{{$mobile}}" target="_blank" class="kt-nav__link"> 
                                  <i class="kt-nav__link-icon fab fa-whatsapp"></i>
                                  <span class="kt-nav__link-text">واتساب</span>
                                  </a>
                                </li>
                                @if($contact->status == 'لم يتم الرد')
                                <li class="kt-nav__item" style="float: center;">
                                  <a href="{{route('admin.contacts.mark-read' , ['id' => $contact->id])}}" class="kt-nav__link"> 
                                  <i class="kt-nav__link-icon fas fa-info-circle"></i>
                                  <span class="kt-nav__link-text">تحديد كمقروءة</span>
                                  </a>
                                </li>
                                @endif  
                                <li class="kt-nav__item">
                                  <form method="post" class="form-inline" action="{{ route('admin.contacts.destroy', ['contact' => $contact->id]) }}">
                                    @csrf
                                    @method('DELETE')
                                    <button onclick="return confirm('هل أنت متأكد من حذف الرسالة ؟')" style="margin-right: 12px;" type="submit" class="btn btn-elevate btn-pill">
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
                        {{$contacts->links()}}
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
<!--begin::Modal-->
<div class="modal fade" id="kt_modal_1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">التفاصيل</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        </button>
      </div>
      <div class="modal-body">
        <span>ايميل المرسل</span><p id="c_email" style="text-align: justify;"></p>
        <hr>
        <span>محتوى الرسالة</span><p id="details" style="text-align: justify;"></p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger waves-effect" data-dismiss="modal">إغلاق</button>
      </div>
    </div>
  </div>
</div>
<script>
  $(document).ready(function() {
   $('#kt_modal_1').on('show.bs.modal', function(e) {
   var details = $(e.relatedTarget).data('details');
   var c_email = $(e.relatedTarget).data('c_email');
   document.getElementById("details").textContent = details; 
   document.getElementById("c_email").textContent = c_email; 
   });
   });
</script>
<script>
   document.getElementById("messages").className += " kt-menu__item--active";
</script>           
@endsection