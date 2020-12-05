@extends('cms.parent')
@section('title', ' | مسوق')
@section('content')
    <div id="main-content">
        <div class="container-fluid">
            <div class="block-header">
                <div class="row clearfix">
                    <div class="col-md-6 col-sm-12">
                        <h2>الصفحة الشخصية</h2>
                        <nav aria-label="breadcrumb">
                         <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{route('admin.dashbord')}}" style="font-size: 20px">الرئيسية</a></li>
                                <li class="breadcrumb-item " style="font-size: 20px" aria-current="page">مسوق</li>
                            </ol>
                        </nav>
                    </div>
                    <div class="col-md-6 col-sm-12 text-right hidden-xs">
                        <a href="javascript:void(0);" class="btn btn-sm btn-primary btn-round" title="">Add New</a>
                    </div>
                </div>
            </div>
            <div class="row clearfix">
                <div class="col-md-12">
                    <div class="card social">
                        <div class="profile-header d-flex justify-content-between justify-content-center">
                            <div class="d-flex">
                                <div class="mr-3">
                                   <img src="{{url('images/users/'.$user->image)}}" class="rounded" alt="">
                                </div>
                                <div class="details">
                                    <h5 class="mb-0">{{ $user->name }}</h5>
                                    <p class="mb-0"><span>الفواتير <strong>{{ $user->bills_count }}</strong></span>
                                </div>
                            </div>
                            <div>
                                <a href="#"  data-toggle="modal" data-target="#userpaid" class="btn btn-primary btn-sm">كشف الدفعات</a>
                                <a href="#" data-toggle="modal" data-target="#userBill" class="btn btn-success btn-sm">كشف الفواتير</a>
                            <a href="{{route('user.edit',[$user->token])}}" class="btn btn-danger btn-sm">تعديل</a>



                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-4 col-lg-4 col-md-5">
                    <div class="card">
                        <div class="header">

                        </div>
                        <div class="body">
                            <small class="text-muted">العنوان: </small>
                            <p>{{$user->address}}</p>

                            <hr>
                            <small class="text-muted">الإيميل : </small>
                            <p>{{$user->email}}</p>
                            <hr>
                            <small class="text-muted">ألهاتف: </small>
                        <p>{{$user->mobile}}</p>
                            <hr>
                            <small class="text-muted">رقم الهوية: </small>
                        <p class="m-b-0">{{$user->idint}}</p>
                            <hr>

                        </div>
                    </div>
                </div>

                <div class="col-xl-8 col-lg-8 col-md-7">

                    <div class="card">

                        <div class="body">
                            <div class="row clearfix">

                                <div class="col-lg-12 col-md-12">
                                    <hr>
                                    <h6>كلمة السر</h6>
                                    <div class="form-group">
                                    <input type="text" disabled class="form-control" value="{{$user->viewPassword}}">
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="userpaid" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">كشف دفعات</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <form action="{{ route('paid.user') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="exampleInputEmail1" style="font-size: 20px">من</label>
                        <div class="col-md-3 col-sm-6">
                            <div class="input-group">
                                <input name="from" type="text" data-provide="datepicker" data-date-autoclose="true"
                                    class="form-control" placeholder="Select Date">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1" style="font-size: 20px">إلى</label>
                        <div class="col-md-3 col-sm-6">
                            <div class="input-group">
                                <input name="to" type="text" data-provide="datepicker" data-date-autoclose="true"
                                    class="form-control" placeholder="Select Date">
                            </div>
                        </div>
                    </div>
                <input type="hidden" value="{{$user->id}}" name="user_id">

                    <div class="modal-footer">
                        <button type="submit" id="add" class=" btn btn-primary">ذهاب</button>
                        <button type="button" class="btn btn-danger " data-dismiss="modal">إغلاق</button>
                    </div>
                </form>
            </div>


        </div>

    </div>
</div>

 <div id="userBill" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">كشف فواتير</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <form action="{{ route('user.bill.index') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="exampleInputEmail1" style="font-size: 20px">من</label>
                        <div class="col-md-3 col-sm-6">
                            <div class="input-group">
                                <input name="from" type="text" data-provide="datepicker" data-date-autoclose="true"
                                    class="form-control" placeholder="Select Date">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1" style="font-size: 20px">إلى</label>
                        <div class="col-md-3 col-sm-6">
                            <div class="input-group">
                                <input name="to" type="text" data-provide="datepicker" data-date-autoclose="true"
                                    class="form-control" placeholder="Select Date">
                            </div>
                        </div>
                    </div>
                <input type="hidden" value="{{$user->id}}" name="user_id">

                    <div class="modal-footer">
                        <button type="submit" id="add" class=" btn btn-primary">ذهاب</button>
                        <button type="button" class="btn btn-danger " data-dismiss="modal">إغلاق</button>
                    </div>
                </form>
            </div>


        </div>

    </div>
</div>
@endsection
