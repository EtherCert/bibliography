@extends('../layouts.include-admin')
@section('title', 'عن المركز') 
@section('content')
 <div class="kt-content  kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor" id="kt_content">
 <!-- begin:: Content Head -->
   <div class="kt-subheader  kt-grid__item" id="kt_subheader">
     <div class="kt-container  kt-container--fluid ">
        <div class="kt-subheader__main">
           <h3 class="kt-subheader__title">عن المركز</h3>
           <span class="kt-subheader__separator kt-subheader__separator--v"></span>
           <span class="kt-subheader__desc">تعديل</span>
        </div>
     </div>
   </div>
 <!-- end:: Content Head -->
   <div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">
     <div class="row">
        <div class="col-lg-12">
            <!--begin::Portlet-->
            <div class="kt-portlet">
                <div class="kt-portlet__head">
                    <div class="kt-portlet__head-label">
                        <h3 class="kt-portlet__head-title">
                            تعديل عن المركز
                        </h3>
                    </div>
                </div>
            @foreach($infos as $info)
                <!--begin::Form-->
                <form action="{{route('admin.info.update',['id'=>$info->id])}}" method="post" class="kt-form kt-form--label-right">
                    @csrf
                    @method('PUT')
                    <div class="kt-portlet__body">
                       <div class="form-group row">
                            <div class="col-lg-12">
                                <label>{{$info->name}}</label>
                                <textarea type="text" rows="4" name= "description" value ="" class="summernote form-control @error('description') is-invalid @enderror"> {{old('description', $info->description)}}</textarea>
                                @error('description')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="kt-form__actions">
                            <div class="row">
                                <div class="col-lg-6">
                                    <button type="submit" class="btn btn-primary">حفظ</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    @if(!$loop->last)
                     <hr>
                    @endif
                </form>
                @endforeach
                <!--end::Form-->
            </div>
            <!--end::Portlet-->
        </div>
     </div>
   </div> 
</div>
<script>
   document.getElementById("manage").className += " kt-menu__item--active";
   document.getElementById("sub-manager").className += " kt-menu__item  kt-menu__item--active";
   document.getElementById("infos").className += " kt-menu__item  kt-menu__item--active";
</script>
@endsection