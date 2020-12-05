   <!-- Setup New Project -->
   <div id="editevent" class="modal fade new-project-modal" tabindex="-1" role="dialog"
       aria-labelledby="exampleModalLabel" aria-hidden="true">
       <div class="modal-dialog" role="document">
           <form action="{{route('event.update',[$event->id])}}" method="POST" enctype="multipart/form-data">
               @csrf
               @method("PUT")
               <div class="modal-content">
                   <div class="modal-header">
                       <h5 class="modal-title" id="exampleModalLabel">مسابقة جديدة</h5>
                       <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                           <span aria-hidden="true">&times;</span>
                       </button>
                   </div>
                   <div class="modal-body">
                       <div class="input-group mb-3">
                           <input type="text" class="form-control" name="desc" value="{{ $event->desc }}"
                               placeholder="وصف المسابقة">
                       </div>
                       <input type="file" data-default-file="{{ url('images/events/' . $event->image) }}" name="image"
                           class="dropify">
                            <div class="form-group">
                                <label for="exampleInputPassword1" style="font-size: 20px">تاريخ الإنتهاء</label>
                                <div class="col-md-3 col-sm-6">
                                    <div class="input-group">
                                    <input value="{{$event->end}}" name="end" type="text" data-provide="datepicker"
                                            data-date-autoclose="true" class="form-control" placeholder="Select Date">
                                    </div>
                                </div>
                            </div>
                       <div class="form-group">
                           <label style="font-size: 20px">الحالة </label>
                           <div class="custom-control custom-switch">
                               <input type="checkbox" class="custom-control-input" name="status" id="status"
                                   @if ($event->status == 'Visible')
                               checked @endif>
                               <label class="custom-control-label" style="font-size: 20px" for="status">مُفعل</label>

                           </div>
                       </div>
                   </div>
                   <div class="modal-footer">
                       <button type="button" class="btn btn-round btn-default" data-dismiss="modal">إغلاق</button>
                       <button type="submit" class="btn btn-round btn-success">تعديل</button>
                   </div>
               </div>
           </form>
       </div>
   </div>

   <script src="{{ asset('cms/assets/vendor/dropify/js/dropify.min.js') }}"></script>
   <script src="{{ asset('cms/assets/js/dropify/js/dropify.min.js') }}"></script>
   <script src="{{ asset('cms/html/assets/js/pages/forms/dropify.js') }}"></script>

   {{-- //////////////// --}}
