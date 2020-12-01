@extends('cms.parent')
@section('title', ' | مسوق')
@section('content')
    <div id="main-content">
        <div class="container-fluid">
            <div class="block-header">
                <div class="row clearfix">
                    <div class="col-md-6 col-sm-12">
                        <h2>User Profile</h2>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="#">Oculux</a></li>
                                <li class="breadcrumb-item"><a href="#">Pages</a></li>
                                <li class="breadcrumb-item active" aria-current="page">User Profile</li>
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
                                    <img src="{{ asset('cms/assets/images/user.png') }}" class="rounded" alt="">
                                </div>
                                <div class="details">
                                    <h5 class="mb-0">{{ $user->name }}</h5>
                                    <p class="mb-0"><span>الفواتير <strong>{{ $user->bills_count }}</strong></span>
                                        <span>Followers: <strong>4,230</strong></span> <span>Following:
                                            <strong>560</strong></span></p>
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
                            <h2>Info</h2>
                            <ul class="header-dropdown dropdown">
                                <li><a href="javascript:void(0);" class="full-screen"><i class="icon-frame"></i></a></li>
                                <li class="dropdown">
                                    <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown"
                                        role="button" aria-haspopup="true" aria-expanded="false"></a>
                                    <ul class="dropdown-menu">
                                        <li><a href="javascript:void(0);">Action</a></li>
                                        <li><a href="javascript:void(0);">Another Action</a></li>
                                        <li><a href="javascript:void(0);">Something else</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                        <div class="body">
                            <small class="text-muted">Address: </small>
                            <p>795 Folsom Ave, Suite 600 San Francisco, 94107</p>

                            <hr>
                            <small class="text-muted">Email address: </small>
                            <p>louispierce@example.com</p>
                            <hr>
                            <small class="text-muted">Mobile: </small>
                            <p>+ 202-222-2121</p>
                            <hr>
                            <small class="text-muted">Birth Date: </small>
                            <p class="m-b-0">October 17th, 93</p>
                            <hr>
                            <small class="text-muted">Social: </small>
                            <p><i class="fa fa-twitter m-r-5"></i> twitter.com/example</p>
                            <p><i class="fa fa-facebook  m-r-5"></i> facebook.com/example</p>
                            <p><i class="fa fa-github m-r-5"></i> github.com/example</p>
                            <p><i class="fa fa-instagram m-r-5"></i> instagram.com/example</p>
                        </div>
                    </div>
                </div>

                <div class="col-xl-8 col-lg-8 col-md-7">
                    <div class="card">
                        <div class="header">
                            <h2>Basic Information</h2>
                            <ul class="header-dropdown dropdown">
                                <li><a href="javascript:void(0);" class="full-screen"><i class="icon-frame"></i></a></li>
                                <li class="dropdown">
                                    <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown"
                                        role="button" aria-haspopup="true" aria-expanded="false"></a>
                                    <ul class="dropdown-menu">
                                        <li><a href="javascript:void(0);">Action</a></li>
                                        <li><a href="javascript:void(0);">Another Action</a></li>
                                        <li><a href="javascript:void(0);">Something else</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                        <div class="body">
                            <div class="row clearfix">
                                <div class="col-lg-6 col-md-12">
                                    <div class="form-group">
                                        <input type="text" class="form-control" placeholder="First Name">
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-12">
                                    <div class="form-group">
                                        <input type="text" class="form-control" placeholder="Last Name">
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-12">
                                    <div class="form-group">
                                        <select class="form-control">
                                            <option value="">-- Select Gander --</option>
                                            <option value="AF">Male</option>
                                            <option value="AX">Female</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-12">
                                    <div class="form-group">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="icon-calendar"></i></span>
                                            </div>
                                            <input data-provide="datepicker" data-date-autoclose="true" class="form-control"
                                                placeholder="Birthdate">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-12">
                                    <div class="form-group">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="icon-globe"></i></span>
                                            </div>
                                            <input type="text" class="form-control" placeholder="http://">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-4 col-md-12">
                                    <div class="form-group">
                                        <input type="text" class="form-control" placeholder="State/Province">
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-12">
                                    <div class="form-group">
                                        <input type="text" class="form-control" placeholder="City">
                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-12">
                                    <div class="form-group">
                                        <textarea rows="4" type="text" class="form-control"
                                            placeholder="Address"></textarea>
                                    </div>
                                </div>

                            </div>
                            <button type="button" class="btn btn-round btn-primary">Update</button> &nbsp;&nbsp;
                            <button type="button" class="btn btn-round btn-default">Cancel</button>
                        </div>
                    </div>
                    <div class="card">
                        <div class="header">
                            <h2>Account Data</h2>
                        </div>
                        <div class="body">
                            <div class="row clearfix">
                                <div class="col-lg-4 col-md-12">
                                    <div class="form-group">
                                        <input type="text" class="form-control" value="louispierce" disabled
                                            placeholder="Username">
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-12">
                                    <div class="form-group">
                                        <input type="email" class="form-control" value="louis.info@yourdomain.com"
                                            placeholder="Email">
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-12">
                                    <div class="form-group">
                                        <input type="text" class="form-control" placeholder="Phone Number">
                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-12">
                                    <hr>
                                    <h6>Change Password</h6>
                                    <div class="form-group">
                                        <input type="password" class="form-control" placeholder="Current Password">
                                    </div>
                                    <div class="form-group">
                                        <input type="password" class="form-control" placeholder="New Password">
                                    </div>
                                    <div class="form-group">
                                        <input type="password" class="form-control" placeholder="Confirm New Password">
                                    </div>
                                </div>
                            </div>
                            <button type="button" class="btn btn-round btn-primary">Update</button> &nbsp;&nbsp;
                            <button type="button" class="btn btn-round btn-default">Cancel</button>
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
@endsection
