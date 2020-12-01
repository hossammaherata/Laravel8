  <div id="editmodelpaid" class="modal fade" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">تعديل دفعة</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <form id="addform" action="{{ route('paid.update',[$paid->id]) }}" method="POST">
                        @csrf
                        @method("PUT")
                        <div class="form-group">
                            <label for="exampleInputEmail1" style="font-size: 20px">بداية الكشف</label>
                            <div class="col-md-3 col-sm-6">
                                <div class="input-group">
                                    <input name="from" type="text" data-provide="datepicker" data-date-autoclose="true"
                                class="form-control" value="{{$paid->from}}" placeholder="Select Date">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1" style="font-size: 20px">نهاية الكشف</label>
                            <div class="col-md-3 col-sm-6">
                                <div class="input-group">
                                    <input name="to" type="text" data-provide="datepicker" data-date-autoclose="true"
                                      value="{{$paid->to}}"  class="form-control" placeholder="Select Date">
                                </div>
                            </div>
                        </div>
                        <div class="form-group" >
                            <label style="font-size: 20px">المبلغ</label>
                            <input type="number" class="form-control"
                        style="font-size: 20px" name="value" value="{{$paid->value}}" placeholder=" ادخل  المبلغ ">
                        </div>

                        <div class="form-group" >
                            <label style="font-size: 20px">ملاححظة</label>
                            <input type="text" class="form-control hosam" value="{{$paid->note}}"
                                style="font-size: 20px" name="note" placeholder=" ملاحظة ">
                        </div>


                        <div class="modal-footer">
                            <button type="submit" id="add" class=" btn btn-primary">ذهاب</button>
                            <button type="button" class="btn btn-danger " data-dismiss="modal">إغلاق</button>
                        </div>
                    </form>
                </div>


            </div>

        </div>
    </div>
