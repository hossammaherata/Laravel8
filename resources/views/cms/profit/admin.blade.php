@extends('cms.parent')
@section('title', ' | فاتورة تاجر')
@section('content')


    <div id="main-content">
        <div class="container-fluid">
            <div class="block-header">
                <div class="row clearfix">
                    <div class="col-md-6 col-sm-12">
                    <h2>الربح</h2>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{route('deal.index')}}">التجار</a></li>
                                <li class="breadcrumb-item"><a href="{{route('admin.dashbord')}}">الرئيسية</a></li>
                            <li class="breadcrumb-item active" aria-current="page">الربح</li>
                            </ol>
                        </nav>
                    </div>

                </div>
            </div>
        <p>من تاريخ <strong>{{$from}}</strong>إلى تاريخ <strong>{{$to}}</strong></p>
              <div class="row clearfix">
                <div class="col-lg-3 col-md-6">
                    <div class="card">
                         <span hidden>{{ $count = 0 }}</span>
                         <span hidden>{{ $allprofit = 0 }}</span>
                                @foreach ($users as $item)
                                <span hidden>{{$profit=0}}</span>
                                @foreach ($item->bills as $bill)
                                @foreach ($bill->orders as $order)
                                @if($order->status=='success')
                                 <span hidden>  {{$profit+=$order->profitadmin}}</span>
                                 <span hidden>  {{$allprofit+=$order->profitadmin}}</span>
                                 <span hidden>  {{++$count}}</span>
                                @endif
                                @endforeach
                                @endforeach
                                @endforeach
                        <div class="body">
                            <div class="d-flex align-items-center">
                                <div class="icon-in-bg bg-indigo text-white rounded-circle"><i class="fa fa-briefcase"></i></div>
                                <div class="ml-4">
                                    <span> إجمالي الربح</span>
                                <h4 class="mb-0 font-weight-medium">$  {{$allprofit}}</h4>
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
                                    <span>عدد المنتجات الناجحة </span>
                                <h4 class="mb-0 font-weight-medium"><span>{{$count}}</span></h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <div class="row clearfix">

                <div class="col-12">
                    <div class="table-responsive">
                        <table class="table table-custom2 table-hover">
                            <thead>

                                <tr>


                                    <th>الربح</th>
                                    <th>المسوق</th>
                                    <th class="w30">&nbsp;</th>
                                </tr>
                            </thead>
                            <tbody>
                                <span hidden>{{ $i = 0 }}</span>
                                @foreach ($users as $item)
                                <span hidden>{{$profit=0}}</span>
                                @foreach ($item->bills as $bill)
                                @foreach ($bill->orders as $order)
                                @if($order->status=='success')
                                 <span hidden>  {{$profit+=$order->profitadmin}}</span>
                                @endif
                                @endforeach
                                @endforeach
                                    <span hidden>{{ ++$i }}</span>

                                    <tr>

                                        <td><span>{{ $profit }}</span></td>
                                    <td><span>{{ $item->name }}</span> <span></span></td>
                                        <td>
                                            <label class="fancy-checkbox margin-0">
                                                <span>{{ $i }}</span>
                                            </label>
                                        </td>
                                    </tr>

                                @endforeach

                            </tbody>
                        </table>
        