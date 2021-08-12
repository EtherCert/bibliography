@extends('../layouts.include-member')
@section('title', 'الرئيسة | لا يمكن الوصول') 
@section('content')
   <div class="alert alert-solid-danger alert-bold" role="alert">
      <div class="alert-text">ليس لديك صلاحيات الوصول </div>
      <div class="alert-close">
         <button type="button" class="close" data-dismiss="alert" aria-label="Close">
         <span aria-hidden="true"><i class="la la-close"></i></span>
         </button>
      </div>
   </div>
@endsection