  <div  id="editmodelbill" class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
      aria-hidden="true">
      <div class="modal-dialog modal-lg">
          <div class="modal-content">
              <div class="modal-header">
                  <h5 class="modal-title h4" id="myLargeModalLabel">تعديل زبون</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">×</span>
                  </button>
              </div>
              <div class="modal-body">
                  <div class="col-12">
                      <div class="card">

                          <form action="{{ route('bill.update',[$item->id]) }}" role="form" method="POST">

                              @csrf
                              @method("PUT")
                              <div class="body">


                                  <div class="row">


                                      <div class="col-lg-3 col-md-3 col-sm-6">
                                          <label style="font-size: 20px">الإسم</label>

                                          <div class="input-group">
                                              <input type="text" name="name" id="name" class="form-control"
                                                  value="{{ $item->name }}" placeholder="اسم الزبون">
                                          </div>
                                      </div>



                                      <div class="col-lg-3 col-md-3 col-sm-6">
                                          <label style="font-size: 20px">رقم الهاتف</label>

                                          <div class="input-group">
                                              <input type="text" id="mobile" name="mobile" class="form-control"
                                                  value="{{ $item->mobile }}" placeholder="رقم الهاتف">
                                          </div>
                                      </div>

                                        <div class="col-lg-3 col-md-3 col-sm-6">
                                            <label style="font-size: 20px">___</label>
                                            <div class="custom-control custom-switch">
                                                <input type="checkbox" class="custom-control-input" name="status"
                                                    id="status" @if ($item->status == 'yes')
                                                checked @endif>
                                                <label class="custom-control-label" style="font-size: 20px"
                                                    for="status">التقييم</label>

                                            </div>
                                        </div>



                                    <div class="col-lg-3 col-md-3 col-sm-6">
                                          <label style="font-size: 20px">___</label>

                                          <div class="input-group">
                                              <button class="btn btn-sm btn-primary" type="submit" title="">تعديل
                                              </button>

                                          </div>
                                      </div>



                                  </div>

                                  <hr>

                              </div>

                              </div>


                          </form>

                      </div>

                  </div>
              </div>
          </div>
      </div>

  </div>
