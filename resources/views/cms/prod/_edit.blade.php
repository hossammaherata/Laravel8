  <div id="editproduct" class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog"
      aria-labelledby="myLargeModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg">
          <div class="modal-content">
              <div class="modal-header">
                  <h5 class="modal-title h4" id="myLargeModalLabel">تعديل فاتورة تاجر</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">×</span>
                  </button>
              </div>
              <div class="modal-body">
                  <div class="col-12">
                      <div class="card">

                          <form action="{{ route('proud.update', [$item->id]) }}" role="form" method="POST">

                              @csrf
                              @method("PUT")
                              <div class="body">


                                  <div class="row">


                                      <div class="col-lg-4 col-md-4 col-sm-6">
                                          <label style="font-size: 20px">اسم التاجر</label>

                                          <div class="input-group">
                                              <input type="text" class="form-control" value="{{ $item->deal->name }}"
                                                  disabled>
                                          </div>
                                      </div>



                                      <div class="col-lg-4 col-md-4 col-sm-6">
                                          <label style="font-size: 20px">التاريخ</label>

                                          <div class="input-group">
                                              <input id="created" name="date" type="text" data-provide="datepicker"
                                                  onchange="dat()" data-date-autoclose="true"
                                                  value="{{ $item->created_at->format('d.m.Y') }}" class="form-control"
                                                  placeholder="اختر التاريخ">
                                          </div>
                                      </div>
                                      <div class="col-lg-4 col-md-4 col-sm-6">
                                          <label style="font-size: 20px">المبلغ المُعطى </label>

                                          <div class="input-group">
                                              <input type="number" name="gave" class="form-control"
                                                  value="{{ $item->gave }}" placeholder="المبلغ المٌعطى">
                                          </div>
                                      </div>


                                      <input hidden type="text" value="" name="day" id="dayy">




                                  </div>

                                  <hr>
                                  <div class="row">
                                      <div class="col-lg-4 col-md-4 col-sm-6">
                                          <label style="font-size: 20px">المبلغ المُرجع </label>

                                          <div class="input-group">
                                              <input type="number" name="discount" class="form-control"
                                                  value="{{ $item->discount }}" placeholder="المبلغ المُرجع">
                                          </div>
                                      </div>



                                      <div class="col-lg-4 col-md-4 col-sm-6">
                                          <label style="font-size: 20px">سعر البضاعة الأصلي</label>

                                          <div class="input-group">
                                              <input name="real" id="payprice" type="number" class="form-control"
                                                  value="{{ $item->real }}" placeholder="سعر البضاعة الأصلي">
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
                                      <input class="custom-control-input" type="radio" id="wait" name="status"
                                          value="wait" @if ($item->status == 'wait')
                                  checked @else checked @endif>
                                      <label for="wait" class="custom-control-label">قيد العمل</label>
                                  </div>
                                  <div class="custom-control custom-radio">
                                      <input class="custom-control-input" type="radio" id="success" name="status"
                                          value="success" @if ($item->status == 'success') checked @endif>
                                      <label for="success" class="custom-control-label">تم التقييم</label>
                                  </div>

                              </div>







                          </form>

                      </div>

                  </div>
              </div>
          </div>
      </div>
      <script>
          function dat() {


              var day = document.getElementById("created").value;
              var d = new Date(day);
              var weekday = new Array(7);
               weekday[0] = "الأحد";
              weekday[1] = "الإثنين";
              weekday[2] = "الثلاثاء";
              weekday[3] = "الأربعاء";
              weekday[4] = "الخميس";
              weekday[5] = "الجمعة";
              weekday[6] = "السبت";

              var n = weekday[d.getDay()];
              document.getElementById("dayy").setAttribute("value", n);
          }

      </script>
  </div>
