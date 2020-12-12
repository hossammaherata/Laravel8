   <!-- Setup New Project -->
   <div id="loginimage" class="modal fade new-project-modal" tabindex="-1" role="dialog"
       aria-labelledby="exampleModalLabel" aria-hidden="true">
       <div class="modal-dialog" role="document">
           <form action="{{route('image.store')}}" method="POST" enctype="multipart/form-data">
               @csrf
               {{-- @method("PUT") --}}
               <div class="modal-content">
                   <div class="modal-header">
                       <h5 class="modal-title" id="exampleModalLabel">صورة تسجيل الدخول</h5>
                       <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                           <span aria-hidden="true">&times;</span>
                       </button>
                   </div>
                   <div class="modal-body">

                       <input type="file"@if($image) data-default-file="{{url('images/images/' . $image->imagelogin) }}" @endif name="image"
                           class="dropify">


                   </div>
                   <div class="modal-footer">
                       <button type="button" class="btn btn-round btn-default" data-dismiss="modal">إغلاق</button>
                       <button type="submit" class="btn btn-round btn-success">حفظ</button>
                   </div>
               </div>
           </form>
       </div>
   </div>

   <script src="{{ asset('cms/assets/vendor/dropify/js/dropify.min.js') }}"></script>
   <script src="{{ asset('cms/assets/js/dropify/js/dropify.min.js') }}"></script>
   <script src="{{ asset('cms/html/assets/js/pages/forms/dropify.js') }}"></script>

   {{-- //////////////// --}}
