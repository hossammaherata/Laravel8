  @extends('user.parent')
@section('content')
<div id="main-content">
        <div class="container-fluid">
            <div class="block-header">
                <div class="row clearfix">
                    <div class="col-md-6 col-sm-12">
                        <h1>الرئيسية</h1>

                    </div>
                    <div class="col-md-6 col-sm-12 text-right hidden-xs">
                        {{-- <a href="javascript:void(0);" class="btn btn-sm btn-primary" title="">Create Campaign</a>
                        <a href="https://themeforest.net/item/oculux-bootstrap-4x-admin-dashboard-clean-modern-ui-kit/23091507" class="btn btn-sm btn-success" title="Themeforest"><i class="icon-basket"></i> Buy Now</a> --}}
                    </div>
                </div>
            </div>

            <div class="row clearfix">
                <div class="col-lg-6 col-md-12">
                    <div class="card">
                        <div class="body">
                            <div class="d-flex align-items-center">
                                <div class="icon-in-bg bg-indigo text-white rounded-circle"><i class="fa fa-briefcase"></i></div>
                                <div class="ml-4">
                                    <span>عدد الطلبيات</span>
                                <h4 class="mb-0 font-weight-medium">{{$bills->count()}}</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-12">
                    <div class="card">
                        <div class="body">
                            <div class="d-flex align-items-center">
                                <div class="icon-in-bg bg-azura text-white rounded-circle"><i class="fa fa-credit-card"></i></div>
                                <div class="ml-4">
                                    <span>إجمالي الربح</span>
                                    <h4 class="mb-0 font-weight-medium">{{Auth::user()->profit}}</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


            </div>



        </div>
    </div>
@endsection
