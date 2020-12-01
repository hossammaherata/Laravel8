@extends('cms.parent')
@section('title', ' | الدفعات')
@section('style')

    <link rel="stylesheet" href="{{ asset('cms/assets/vendor/jquery-datatable/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet"
        href="{{ asset('cms/assets/vendor/jquery-datatable/fixedeader/dataTables.fixedcolumns.bootstrap4.min.css') }}">
    <link rel="stylesheet"
        href="{{ asset('cms/assets/vendor/jquery-datatable/fixedeader/dataTables.fixedheader.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('cms/assets/vendor/sweetalert/sweetalert.css') }}" />

    <style>
        td.details-control {
            background: url('http://127.0.0.1:8000/cms/assets/images/details_open.png') no-repeat center center;
            cursor: pointer;
        }

        tr.shown td.details-control {
            background: url('http://127.0.0.1:8000/cms/assets/images/details_close.png') no-repeat center center;
        }

    </style>
@endsection

@section('content')


    <div id="main-content">
        <div class="container-fluid">
            <div class="block-header">
                <div class="row clearfix">
                    <div class="col-md-6 col-sm-12">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{route('admin.dashbord')}}" style="font-size: 20px">الرئيسية</a></li>
                            <li class="breadcrumb-item"><a data-toggle="modal" data-target="#printpaid_date" href="#" style="font-size: 20px">طباعة</a></li>
                                <li class="breadcrumb-item " style="font-size: 20px" aria-current="page">المسوقين</li>
                            </ol>
                        </nav>
                    </div>
                    <div class="col-md-6 col-sm-12 text-right hidden-xs">
                        <a href="{{ route('bill.create') }}" class="btn btn-sm btn-primary" title="">رفع فاتورة</a>
                        {{-- <a
                            href="https://themeforest.net/item/oculux-bootstrap-4x-admin-dashboard-clean-modern-ui-kit/23091507"
                            class="btn btn-sm btn-success" title="Themeforest"><i class="icon-basket"></i> Buy Now</a>
                        --}}
                    </div>
                </div>
            </div>
            <p>من تاريخ <strong>{{$from}}</strong>إلى تاريخ <strong>{{$to}}</strong></p>
            <div class="row clearfix" id="users">
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <div class="card">

                        <div class="table-responsive">
                            <table class="table table-hover js-basic-example dataTable table-custom spacing5 mb-0">
                                <thead>
                                    <tr>
                                         <th style="font-size: 17px">المبلغ الحالي</th>
                                             <th style="font-size: 17px">الهاتف</th>
                                             <th style="font-size: 17px">الهوية</th>
                                             <th style="font-size: 17px">الإسم</th>
                                            <th>#</th>



                                    </tr>
                                </thead>
                                <tbody>
                                    <span hidden>{{ $i = 0 }}</span>
                                    @foreach ($users as $user)
                                    @if($user->bills->count() >0)
                                        <span hidden>{{ $i++ }}</span>

                                        <tr>




                                            <td>
                                                @if ($user->bills->sum('profit') >= 0)
                                                <a class="btn btn-success btn-sm" @else <a class="btn btn-danger btn-sm"
                                                        @endif

                                                        href="#">

                                                        <i class="fa fa-dollar">
                                                        </i>

                                                        {{ $user->bills->sum('profit') }}
                                                    </a>
                                                    <span class="badge badge-dark"></span>
                                            </td>
                                            <td><span style="font-size: 17px">{{ $user->mobile }}</span></td>

                                            <td>
                                                <div class="font-15">{{ $user->idint }}</div>
                                            </td>
                                            <td>
                                                <div class="font-15">{{ $user->name }}</div>
                                            </td>
                                               <td>{{ $i }}</td>
                                        </tr>
                                        @endif
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <input type="hidden" name="" id="token" value="{{ csrf_token() }}">
    <div id="printpaid_date" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">الفواتير</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
            <form i action="{{route('print.paidusers')}}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="exampleInputEmail1" style="font-size: 20px">من</label>
                      <div class="col-md-3 col-sm-6">
                            <div class="input-group">
                            <input name="from" value="{{$from}}" type="text" data-provide="datepicker" data-date-autoclose="true" class="form-control" placeholder="Select Date">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1" style="font-size: 20px">إلى</label>
                       <div class="col-md-3 col-sm-6">
                            <div class="input-group">
                            <input name="to" type="text" value="{{$to}}" data-provide="datepicker" data-date-autoclose="true" class="form-control" placeholder="Select Date">
                            </div>
                        </div>
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
@endsection
@section('script')


@endsection
