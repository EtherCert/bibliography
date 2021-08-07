<?php 
  use Carbon\Carbon;
  Carbon::setLocale('ar');
  ?>
@extends('layouts.include-admin')
@section('title', 'الإشعارات') 
@section('content')
<div class="kt-content  kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor" id="kt_content">
  <!-- begin:: Content Head -->
  <div class="kt-subheader  kt-grid__item" id="kt_subheader">
    <div class="kt-container  kt-container--fluid ">
      <div class="kt-subheader__main">
        <h3 class="kt-subheader__title">الإشعارات</h3>
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
        @if(count($notifications) > 0)
        <form action="{{route('admin.notifications-delete-all')}}" method="post">
          @method('delete')
          @csrf
          <button  style="float: left;" onclick="return confirm('هل أنت متأكد من حذف كل الإشعارات ؟')" type="submit" class="popupFormBtn btn btn-danger"><i class="kt-nav__link-icon fa fa-trash"></i>&nbsp;حذف الكل</button> 
        </form>
        @endif 
      </div>
    </div>
  </div>
  <!-- end:: Content Head -->
  <div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">
    <div class="row">
      <div class="col-md-12">
        <!--begin::Portlet-->
        <div class="kt-portlet">
          <div class="kt-portlet__head">
            <div class="kt-portlet__head-label">
              <h3 class="kt-portlet__head-title">الإشعارات</h3>
            </div>
            <div class="kt-portlet__head-toolbar"></div>
          </div>
          <!--begin::Form-->
          <div class="kt-portlet__body">
            <div class="row">
              <div class="col-md-12">
                <div class="table-responsive">
                  <table class="table table-hover table-striped">
                    <thead>
                      <tr>
                        <th class="text-center">رمز العملية</th>
                        <th class="text-center">الحدث</th>
                        <th class="text-center">التاريخ</th>
                        <th class="text-center" width="10%"></th>
                      </tr>
                    </thead>
                    <tbody>
                      @if(count($notifications) == 0)
                      <tr>
                        <td class="text-center" colspan="8">
                          <div class="alert alert-solid-brand alert-bold" role="alert">
                            <div class="alert-text">لا يوجد إشعارات لعرضها </div>
                            <div class="alert-close">
                              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                              <span aria-hidden="true"><i class="la la-close"></i></span>
                              </button>
                            </div>
                          </div>
                        </td>
                      </tr>
                      @endif
                      @foreach($notifications as $notification)    
                      <tr>
                        {{$notification->markAsRead()}}
                        <td class="text-center">
                          <li class="{{$notification->data['icon']}}"></li>
                        </td>
                        <td class="text-center">{{$notification->data['message']}}</td>
                        <td class="text-center">{{$notification->created_at->diffForHumans()}}</td>
                        <td class="fitwidth">
                          <div class="kt-widget2__actions">
                            <a href="#" class="btn btn-clean btn-sm btn-icon btn-icon-md" data-toggle="dropdown" aria-expanded="false">
                            <i class="flaticon-more-1"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-fit dropdown-menu-right" x-placement="bottom-end" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(39px, 39px, 0px);">
                              <ul class="kt-nav">
                                <li class="kt-nav__item">
                                  <a href="{{$notification->data['url']}}" class="kt-nav__link">
                                  <i class="kt-nav__link-icon fa fa-eye"></i>
                                  <span class="kt-nav__link-text">التفاصيل</span>
                                  </a>
                                </li>
                                <li class="kt-nav__item">
                                  <form method="post" class="form-inline" action="{{route('admin.notifications.delete',['id'=> $notification->id])}}">
                                    @csrf
                                    @method('DELETE')
                                    <button onclick="return confirm('هل أنت متأكد من حذف الإشعار  '{{$notification->data['message']}}'؟')" style="margin-right: 12px;" type="submit" class="btn btn-elevate btn-pill">
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
                        {{$notifications->links()}}
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
</div>
@endsection