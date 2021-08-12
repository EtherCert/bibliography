@extends('../layouts.include-admin')
@section('title', 'المحادثات') 
@section('content')
<div class="kt-content  kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor" id="kt_content">
  <!-- begin:: Content Head -->
  <div class="kt-subheader  kt-grid__item" id="kt_subheader">
    <div class="kt-container  kt-container--fluid ">
      <div class="kt-subheader__main">
        <h3 class="kt-subheader__title">المحادثات</h3>
        <span class="kt-subheader__separator kt-subheader__separator--v"></span>
        <span class="kt-subheader__desc">{{$from_user->name}}</span>
        <div class="kt-input-icon kt-input-icon--right kt-subheader__search kt-hidden">
          <input type="text" class="form-control" placeholder="Search order..." id="generalSearch">
          <span class="kt-input-icon__icon kt-input-icon__icon--right">
          <span><i class="flaticon2-search-1"></i></span>
          </span>
        </div>
      </div>
    </div>
  </div>
  <!-- begin:: Content -->
  <div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">
    <div class="row">
      <div class="col-md-12">
        <!--begin::Portlet-->
        <div class="kt-portlet">
          <div class="kt-grid__item kt-grid__item--fluid kt-app__content" id="kt_chat_content">
            <div class="kt-chat">
              <div class="kt-portlet kt-portlet--head-lg- kt-portlet--last">
                <div class="kt-portlet__head">
                  <div class="kt-chat__head ">
                    <div class="kt-chat__center">
                      <div class="kt-chat__pic">
                        <span class="kt-userpic kt-userpic--sm kt-userpic--circle" data-toggle="kt-tooltip" data-placement="top" title="" data-original-title="Jason Muller">
                          <div class="pagination-container">
                            {{$chats->links()}}
                          </div>
                        </span>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="kt-portlet__body">
                  <div class="kt-scroll kt-scroll--pull" data-mobile-height="300" style="height: auto; overflow: hidden;">
                    <div class="kt-chat__messages">
                      @if(count($chats) == 0)
                                  لا رسائل!
                      @endif 
                      @foreach($chats->reverse() as $chat)
                            <?php
                            $writer = \App\Models\User::findOrFail($chat->from_user_id);
                            $message  = "kt-chat__message kt-chat__message--right";
                            $message2 = "kt-chat__text kt-bg-light-brand";
                            $img      = "admin_avatar.png";
                            $date_time = explode(' ',$chat->created_at);

                            if($chat->from_user_id == $from_user->id){
                                $message  = "kt-chat__message";
                                $message2 = "kt-chat__text kt-bg-light-success";
                                $img      = "user_avatar.png";
                            }

                            if($chat->from_user_id == $from_user->id)
                               $name = "العضو : " . $from_user->name; 

                            else if($chat->from_user_id == $user->id)
                             $name = "أنت";

                            else{
                                $name ='من الإدارة : '. $writer->name;
                                } 
                            ?>    
                      <div class="{{$message}}">
                        <div class="kt-chat__user">
                        @if($name == 'أنت' || $name == ('من الإدارة : '. $writer->name))
                         <span class="kt-chat__datetime">{{$chat->created_at->diffForHumans()}}</span>
                          <a href="#" class="kt-chat__username">{{$name}}</a>
                          <span class="kt-userpic kt-userpic--circle kt-userpic--sm">
                          <img src="{{asset('assets/users_avatar/'.$img)}}" alt="image">
                          </span>
                        @else    
                          <span class="kt-userpic kt-userpic--circle kt-userpic--sm">
                          <img src="{{asset('assets/users_avatar/'.$img)}}" alt="image">
                          </span>
                          <a href="#" class="kt-chat__username">{{$name}}</a>
                          <span class="kt-chat__datetime">{{$chat->created_at->diffForHumans()}}</span>
                        @endif    
                        </div>
                        <div style="text-align: right;" class="{{$message2}}"  id="{{$chat->id}}" title="{{$chat->created_at}}">
                          {!!$chat->body!!}
                        </div>
                      </div>
                      @endforeach  
                    </div>
                  </div>
                </div>
                <div class="kt-portlet__foot">
                <form action="{{route('admin.chat.store')}}" method="post">
                 @csrf   
                  <input hidden name="member_id"    value="{{$from_user->id}}">    
                  <input hidden name="to_user_id"   value="{{$from_user->id}}">    
                  <input hidden name="from_user_id" value="{{$user->id}}">    
                  <div class="kt-chat__input">
                    <div class="kt-chat__editor">
                      <textarea style="height: 50px" placeholder="أرسل رسالة .." required type="text" name = "body">{{old('body')}}</textarea>
                      @error('body')
                      <p class="text-danger">{{$message}}</p>
                      @enderror    
                    </div>
                    <div class="kt-chat__toolbar">
                      <div class="kt_chat__tools">
                        <button class="btn btn-brand btn-md btn-upper btn-bold kt-chat__reply">أرسل</button>
                      </div>
                    </div>
                  </div>
                    </form>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!--end::Portlet-->
      </div>
    </div>
  </div>
  <!-- end:: Content -->    
</div>
@section('scripts')
<!--begin::Page Scripts(used by this page) -->
<script src="{{asset('assets/js/demo1/pages/custom/chat/chat.js')}}" type="text/javascript"></script>
<!--end::Page Scripts -->
@endsection
@endsection