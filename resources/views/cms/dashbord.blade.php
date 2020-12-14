  @extends('cms.parent')
@section('content')
<div id="main-content">
        <div class="container-fluid">
            <div class="block-header">
                <div class="row clearfix">
                    <div class="col-md-6 col-sm-12">
                        <h1>الصفحة الرئيسية</h1>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                            {{-- <li class="breadcrumb-item"><a href="{{route('bill.index')}}">الفواتير</a></li> --}}
                            {{-- <li class="breadcrumb-item active" aria-current="page">My Page</li> --}}
                            </ol>
                        </nav>
                    </div>
                    <div class="col-md-6 col-sm-12 text-right hidden-xs">
                        <a href="{{route('bill.create')}}" class="btn btn-sm btn-success" title="">فاتورة جديدة</a>
                        {{-- <a href="https://themeforest.net/item/oculux-bootstrap-4x-admin-dashboard-clean-modern-ui-kit/23091507" class="btn btn-sm btn-success" title="Themeforest"><i class="icon-basket"></i> Buy Now</a> --}}
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
                                    <span>مجموع الربح</span>
                                <h4 class="mb-0 font-weight-medium">{{$orders->where('status','success')->sum('profitadmin')}}</h4>
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
                                    <span>عدد المسوقين</span>
                                    <h4 class="mb-0 font-weight-medium">{{$users->count()}}</h4>
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
                                    <span>إجمالي سعر الجملة</span>
                                    <h4 class="mb-0 font-weight-medium">{{$bills->sum('realprice')}}</h4>
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
                                    <span>إجمالي مبلغ الدفعات</span>
                                    <h4 class="mb-0 font-weight-medium">{{$paids->sum('value')}}</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row clearfix">


                <div class="col-lg-12 col-md-12">
                    <div class="table-responsive">
                        <table class="table table-hover table-custom spacing5">
                            <thead>
                                <tr>
                                    <th style="width: 20px;">#</th>
                                    <th>الصورة</th>
                                    <th style="width: 50px;">الإسم</th>
                                    <th style="width: 50px;">رقم الهاتف</th>
                                    {{-- <th style="width: 110px;">Action</th> --}}
                                      <th style="width: 50px;">حالة الحساب</th>
                                    <th style="width: 110px;">الإعدادات</th>
                                </tr>
                            </thead>
                            <tbody>
                                <span hidden>{{$i=0}}</span>
                                @foreach ($users->where('status','!=','Active') as $item)
                                    <span hidden>{{$i++}}</span>

                                 <tr>
                                    <td>
                                    <span>{{$i}}</span>
                                    </td>
                                         <td class="w60">
                                            <img src="{{url('images/users/'.$item->image)}}" data-toggle="tooltip" data-placement="top" title="{{$item->name}}" alt="{{$item->name}}" class="w35 h35 rounded">
                                        </td>
                                    <td>
                                      {{$item->name}}
                                    </td>
                                <td>{{$item->mobile}}</td>
                                    <td>
                                        @if($item->status =='Blocked')
                                        <span class="badge badge-danger ml-0 mr-0">
                                                محظور
                                                @elseif($item->status =='Wait')
                                                <span class="badge badge-warning ml-0 mr-0">
                                                قيد المراجعة
                                            @endif


                                        </span></td>
                                    <td>
                                        <a href="{{route('user.edit',[$item->token])}}" type="button"
                                                    style="font-size: 20px" class="btn btn-sm btn-default" title="تعديل"><i
                                                        class="fa fa-edit"></i> تعديل</a>
                                    </td>

                                </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>

            </div>

        </div>
    </div>
@endsection
