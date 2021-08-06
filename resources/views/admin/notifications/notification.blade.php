<?php 
  use Carbon\Carbon;
  Carbon::setLocale('ar');
?>
@extends('layouts.include-admin')
@section('title', 'الإشعارات') 
@section('content')
<div class="container-fluid">
<div class="block-header">
  <div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
      <ul class="breadcrumb breadcrumb-style ">
        <li class="breadcrumb-item">
          <h4 class="page-title">الإشعارات</h4>
        </li>
        <li class="breadcrumb-item bcrumb-1">
          <a href="/">
          <i class="fas fa-home"></i> الرئيسة</a>
        </li>
        <li class="breadcrumb-item active">التفاصيل</li>
      </ul>
      @if(count($notifications) > 0)
      <form action="{{route('admin.notifications-delete-all')}}" method="post">
        @method('delete')
        @csrf
        <button  style="float: left;" onclick="return confirm('هل أنت متأكد ؟')" type="submit" class="btn btn-outline-danger">حذف الكل</button> 
      </form>
      @endif 
    </div>
  </div>
</div>
<div class="profile-content">
  <div class="row">
    <div class="col-md-12">
      <div class="portlet light ">
        <div class="portlet-body">
          <div class="body">
            <div class="table-responsive">
              <table id="tableExport" class="display table table-hover table-checkable order-column width-per-100">
                <thead>
                  <tr>
                    <th  style="text-align: right;">رمز العملية</th>
                    <th  style="text-align: right;">الإجاراء</th>
                    <th  style="text-align: right;">التاريخ</th>
                    <th  style="text-align: right;">الإجراء</th>
                  </tr>
                </thead>
                <tbody>
                  @if(count($notifications) == 0)
                  <tr>
                    <div  class="alert bg-blue alert-dismissible" role="alert">
                      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">×</span>
                      </button>
                      <p style="text-align: right;">لا يوجد إشعارات لعرضها</p>
                    </div>
                  </tr>
                  @endif
                  @foreach($notifications as $notification)
                  <tr style="text-align: right;">
                    {{$notification->markAsRead()}}
                    <th style="text-align: right;">
                      <li class="{{$notification->data['icon']}}"></li>
                    </th>
                    <th style="text-align: right;">{{$notification->data['message']}} </th>
                    <td style="text-align: right;">{{$notification->created_at->diffForHumans()}}</td>
                    <td>
                      <form action="{{route('admin.notifications-delete',['id'=> $notification->id])}}" method="post">
                        @csrf
                        @method('DELETE')
                        <button onclick="confirm('هل أنت متأكد ؟')"type="submit" class="btn btn-danger btn-circle waves-effect waves-circle waves-float"title="حذف">
                        <i class="material-icons">delete</i>
                        </button>
                      </form>
                    </td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
              {{$notifications->links()}}
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<script>
  document.getElementById("home").className += " active";
</script> 
@endsection