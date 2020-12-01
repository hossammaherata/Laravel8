  <div  id="editmodel" class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
      aria-hidden="true">
      <div class="modal-dialog modal-lg">
          <div class="modal-content">
              <div class="modal-header">
                  <h5 class="modal-title h4" id="myLargeModalLabel">تعديل صنف</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">×</span>
                  </button>
              </div>
              <div class="modal-body">
                  <div class="col-12">
                      <div class="card">

                          <form action="{{ route('order.update',[$item->id]) }}" role="form" method="POST">

                              @csrf
                              @method("PUT")
                              <div class="body">


                                  <div class="row">


                                      <div class="col-lg-4 col-md-4 col-sm-6">
                                          <label style="font-size: 20px">اسم الصنف</label>

                                          <div class="input-group">
                                              <input type="text" name="name" id="name" class="form-control"
                                                  value="{{ $item->name }}" placeholder="اسم الصنف">
                                          </div>
                                      </div>



                                      <div class="col-lg-4 col-md-4 col-sm-6">
                                          <label style="font-size: 20px">الكمية</label>

                                          <div class="input-group">
                                              <input type="number" id="count" name="count" class="form-control"
                                                  value="{{ $item->count }}" placeholder="الكمية">
                                          </div>
                                      </div>
                                                              <div class="col-lg-4 col-md-4 col-sm-6">
                                          <label style="font-size: 20px">ربح التاجر</label>

                                          <div class="input-group">
                                              <input type="number"  name="profitadmin" class="form-control"
                                                  value="{{ $item->profitadmin }}" placeholder="الكمية">
                                          </div>
                                      </div>







                                  </div>

                                  <hr>
                                  <div class="row">
                                      <div class="col-lg-4 col-md-4 col-sm-6">
                                          <label style="font-size: 20px">سعر الجملة</label>

                                          <div class="input-group">
                                              <input type="number" id="realprice" name="realprice" class="form-control"
                                                  value="{{ $item->realprice }}" placeholder="سعر الجملة">
                                          </div>
                                      </div>



                                      <div class="col-lg-4 col-md-4 col-sm-6">
                                          <label style="font-size: 20px">سعر البيع</label>

                                          <div class="input-group">
                                              <input name="payprice" id="payprice" type="number" class="form-control"
                                                  value="{{ $item->payprice }}" placeholder="سعر البيع">
                                          </div>
                                      </div>

                                      <div class="col-lg-4 col-md-4 col-sm-6">
                                          <label style="font-size: 20px">___</label>

                                          <div class="input-group">
                                              <button class="btn btn-sm btn-primary" type="submit" title="">حفظ
                                              </button>

                                          </div>
                                      </div>



                                  </div>
                              </div>
                               <div class="form-group">
                                        <label for="exampleInputPassword1">حالة الطلب</label>
                                        <div class="custom-control custom-radio">
                                            <input onclick="myFunction()"  class="custom-control-input" type="radio" id="wait"
                                                   name="status" value="wait"
                                                   @if($item->status == 'wait') checked @else checked @endif>
                                            <label for="wait" class="custom-control-label">قيد العمل</label>
                                        </div>
                                        <div class="custom-control custom-radio">
                                            <input onclick="myFunction()"  class="custom-control-input" type="radio" id="success"
                                                   name="status" value="success"
                                                   @if($item->status == 'success') checked @endif>
                                            <label for="success" class="custom-control-label">تم التسليم</label>
                                        </div>
                                        <div class="custom-control custom-radio">
                                            <input onclick="myFunction()"  class="custom-control-input" type="radio" id="cancel"
                                                   name="status" value="cancel"
                                                   @if($item->status == 'cancel') checked @endif>
                                            <label for="cancel" class="custom-control-label">مرفوضة</label>
                                        </div>
                                           <div class="custom-control custom-radio">
                                            <input onclick="myFunction()" class="custom-control-input" type="radio" id="return"
                                                   name="status" value="return"
                                                   @if($item->status == 'return') checked @endif>
                                            <label for="return" class="custom-control-label">مستردة</label>
                                        </div>
                                    </div>


                                      <div  class="form-group" id="note">
                                            <label style="font-size: 20px">الملاحظة </label>
                                      <input  type="text" class="form-control hosam" name="note" value="{{$item->note}}"
                                                style="font-size: 20px" >
                                        </div>
                                        @if($item->status=='return')
                                        <div class="col-lg-4 col-md-4 col-sm-6">
                                  <label style="font-size: 20px">الخصم</label>

                                  <div class="input-group">
                                  <input type="number" disabled   class="form-control" value="{{$item->discount}}"
                                          >
                                  </div>
                              </div>
                              @endif

                                    <div id="hid" style="display:none">

                                        <div class="col-lg-4 col-md-4 col-sm-6">
                                  <label style="font-size: 20px">الخصم</label>

                                  <div class="input-group">
                                      <input type="number" id="discount"  name="discount" class="form-control"
                                          placeholder="الخصم من المسوق">
                                  </div>
                              </div>
                              </div>


                          </form>

                      </div>

                  </div>
              </div>
          </div>
      </div>
      <script>
          function myFunction()
                {

               var radio = document.getElementById("return");
                 var text = document.getElementById("hid");
                  if (radio.checked == true){
                            text.style.display = "block";
                     } else {
                 text.style.display = "none";
                             }


                }
                    </script>
  </div>
