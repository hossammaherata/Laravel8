  @extends('cms.parent')
  @section('title',' | Dashbord')
@section('content')
<div id="main-content">
        <div class="container-fluid">
            <div class="block-header">
                <div class="row clearfix">
                    <div class="col-md-6 col-sm-12">
                        <h1>My Page</h1>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#">Oculux</a></li>
                            <li class="breadcrumb-item active" aria-current="page">My Page</li>
                            </ol>
                        </nav>
                    </div>
                    <div class="col-md-6 col-sm-12 text-right hidden-xs">
                        <a href="javascript:void(0);" class="btn btn-sm btn-primary" title="">Create Campaign</a>
                        <a href="https://themeforest.net/item/oculux-bootstrap-4x-admin-dashboard-clean-modern-ui-kit/23091507" class="btn btn-sm btn-success" title="Themeforest"><i class="icon-basket"></i> Buy Now</a>
                    </div>
                </div>
            </div>

            <div class="row clearfix">
                <div class="col-lg-3 col-md-6">
                    <div class="card">
                        <div class="body">
                            <div class="d-flex align-items-center">
                                <div class="icon-in-bg bg-indigo text-white rounded-circle"><i class="fa fa-briefcase"></i></div>
                                <div class="ml-4">
                                    <span>عدد الفئات</span>
                                <h4 class="mb-0 font-weight-medium">10</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="card">
                        <div class="body">
                            <div class="d-flex align-items-center">
                                <div class="icon-in-bg bg-azura text-white rounded-circle"><i class="fa fa-credit-card"></i></div>
                                <div class="ml-4">
                                    <span>New expense</span>
                                    <h4 class="mb-0 font-weight-medium">$3,651</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="card">
                        <div class="body">
                            <div class="d-flex align-items-center">
                                <div class="icon-in-bg bg-orange text-white rounded-circle"><i class="fa fa-users"></i></div>
                                <div class="ml-4">
                                    <span>Daily Visits</span>
                                    <h4 class="mb-0 font-weight-medium">5,805</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="card">
                        <div class="body">
                            <div class="d-flex align-items-center">
                                <div class="icon-in-bg bg-pink text-white rounded-circle"><i class="fa fa-life-ring"></i></div>
                                <div class="ml-4">
                                    <span>Bounce rate</span>
                                    <h4 class="mb-0 font-weight-medium">$13,651</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row clearfix">
                <div class="col-lg-4 col-md-12">
                    <div class="card">
                        <div class="header">
                            <h2>Users</h2>
                        </div>
                        <div class="body">
                            <div class="row text-center">
                                <div class="col-6 border-right pb-4 pt-4">
                                    <label class="mb-0">New Users</label>
                                    <h4 class="font-30 font-weight-bold text-col-blue">2,025</h4>
                                </div>
                                <div class="col-6 pb-4 pt-4">
                                    <label class="mb-0">Return Visitors</label>
                                    <h4 class="font-30 font-weight-bold text-col-blue">1,254</h4>
                                </div>
                            </div>
                        </div>
                        <div class="body">
                            <div class="form-group">
                                <label class="d-block">New Users <span class="float-right">77%</span></label>
                                <div class="progress progress-xxs">
                                    <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="77" aria-valuemin="0" aria-valuemax="100" style="width: 77%;"></div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="d-block">Return Visitors <span class="float-right">50%</span></label>
                                <div class="progress progress-xxs">
                                    <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="width: 50%;"></div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="d-block">Engagement <span class="float-right">23%</span></label>
                                <div class="progress progress-xxs">
                                    <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="23" aria-valuemin="0" aria-valuemax="100" style="width: 23%;"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8 col-md-12">
                    <div class="card user_statistics">
                        <div class="header">
                            <h2>Earning Report</h2>
                        </div>
                        <div class="body">
                            <div id="chart-bar" style="height: 302px"></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8 col-md-12">
                    <div class="table-responsive">
                        <table class="table table-hover table-custom spacing5">
                            <thead>
                                <tr>
                                    <th style="width: 20px;">#</th>
                                    <th>Client</th>
                                    <th style="width: 50px;">Amount</th>
                                    <th style="width: 50px;">Status</th>
                                    <th style="width: 110px;">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <span hidden>{{$i=0}}</span>
                                @foreach ($users as $item)
                                    <span hidden>{{$i++}}</span>

                                 <tr>
                                    <td>
                                    <span>{{$i}}</span>
                                    </td>
                                         <td class="w60">
                                            <img src="{{url('images/users/'.$item->image)}}" data-toggle="tooltip" data-placement="top" title="{{$item->name}}" alt="{{$item->name}}" class="w35 h35 rounded">
                                        </td>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <div class="avtar-pic w35 bg-red" data-toggle="tooltip" data-placement="top" title="Avatar Name"><span>SS</span></div>
                                            <div class="ml-3">
                                                <a href="page-invoices-detail.html" title="">{{$item->name}}</a>
                                                <p class="mb-0">{{$item->email}}</p>
                                            </div>
                                        </div>
                                    </td>
                                <td>{{$item->mobile}}</td>
                                    <td><span class="badge badge-success ml-0 mr-0">Done</span></td>
                                    <td>
                                        <button type="button" class="btn btn-sm btn-default" title="Send Invoice" data-toggle="tooltip" data-placement="top"><i class="icon-envelope"></i></button>
                                        <button type="button" class="btn btn-sm btn-default " title="Print" data-toggle="tooltip" data-placement="top"><i class="icon-printer"></i></button>
                                        <button type="button" class="btn btn-sm btn-default" title="Delete" data-toggle="tooltip" data-placement="top"><i class="icon-trash"></i></button>
                                    </td>

                                </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="col-lg-4 col-md-12">
                    <a class="card" href="javascript:void(0)">
                        <div class="body text-center">
                        <img class="img-thumbnail rounded-circle" src="{{asset('cms/assets/images/sm/avatar1.jpg')}}" alt="">
                            <h6 class="mt-3">Michelle Green</h6>
                            <div class="text-center text-muted">Intranet Developer</div>
                        </div>
                        <div class="card-footer text-center">
                            <div class="row clearfix">
                                <div class="col-6">
                                    <i class="fa fa-tag font-22"></i>
                                    <div><span class="text-muted">9 Badges</span></div>
                                </div>
                                <div class="col-6">
                                    <i class="fa fa-dollar font-22"></i>
                                    <div><span class="text-muted">$ 3.100</span></div>
                                </div>
                            </div>
                        </div>
                    </a>
                    <div class="card">
                        <div class="body">
                            <div class="card-text">
                                <div class="mt-0">
                                    <small class="float-right text-muted">10/200 GB</small>
                                    <span>Memory</span>
                                    <div class="progress progress-xxs">
                                        <div style="width: 60%;" class="progress-bar"></div>
                                    </div>
                                </div>
                                <div class="mt-4">
                                    <small class="float-right text-muted">40 MB</small>
                                    <span>Bandwidth</span>
                                    <div class="progress progress-xxs">
                                        <div style="width: 50%;" class="progress-bar"></div>
                                    </div>
                                </div>
                                <div class="mt-4">
                                    <small class="float-right text-muted">73%</small>
                                    <span>Activity</span>
                                    <div class="progress progress-xxs">
                                        <div style="width: 40%;" class="progress-bar"></div>
                                    </div>
                                </div>
                                <div class="mt-4">
                                    <small class="float-right text-muted">400 GB</small>
                                    <span>FTP</span>
                                    <div class="progress progress-xxs mb-0">
                                        <div style="width: 80%;" class="progress-bar bg-danger"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
