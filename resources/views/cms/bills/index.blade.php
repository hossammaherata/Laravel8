@extends('cms.parent')
@section('title', ' | الفواتير')
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
                                <li class="breadcrumb-item"><a href="#" data-toggle="modal" data-target="#allbill"
                                        style="font-size: 20px">التقويم</a></li>
                                @if ($search == 'no')
                                    @if ($print == 'all')
                                        <li class="breadcrumb-item"><a data-toggle="modal" data-target="#printbill" href="#"
                                                style="font-size: 20px">طباعة</a></li>
                                    @else
                                        <li class="breadcrumb-item"><a data-toggle="modal" data-target="#printbillUser"
                                                href="#" style="font-size: 20px">طباعة</a></li>
                                    @endif

                                @else
                                    <li class="breadcrumb-item"><a href="{{ route('report.bill.index') }}"
                                            style="font-size: 20px">طباعة</a></li>
                                @endif

                                <li class="breadcrumb-item " style="font-size: 20px" aria-current="page">الفواتير</li>

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
            <div hidden id="reportvalue">{{ $bills }}</div>
            @if ($search == 'yes')

                <div class="row clearfix">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="body">
                                <div class="input-group mb-3">
                                    <input id="searchbill" type="text" class="form-control" placeholder="أدخل اسم المسوق">
                                    <div class="input-group-append">
                                        <button class="btn btn-outline-secondary" type="button"></button>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            @endif
            <div class="row clearfix" id="bills">
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <div class="card">
                        @if ($search == 'no')
                            <div>من تاريخ <strong>{{ $from->format('d.m.Y') }}</strong> إلى
                                <strong>{{ $to->format('d.m.Y') }}</strong>
                            </div>
                        @endif
                        <div class="table-responsive">
                            <table class="table table-custom2 table-hover">
                                <thead>
                                    <tr>

                                        <th style="ba font-size: 17px;background-color: #221f1c; color :#fdfdfd">الإعدادات
                                        </th>
                                        <th style="font-size: 17px;background-color: #221f1c; color :#fdfdfd">عرض الفاتورة
                                        </th>
                                        <th style="font-size: 17px;background-color: #221f1c; color :#fdfdfd">تاريخ الفاتورة
                                        </th>
                                        <th style="font-size: 17px;background-color: #221f1c; color :#fdfdfd">هاتف المسوق
                                        </th>
                                        <th style="font-size: 17px;background-color: #221f1c; color :#fdfdfd">اسم الزبون
                                        </th>
                                        <th style="font-size: 17px;background-color: #221f1c; color :#fdfdfd">اسم المسوق
                                        </th>
                                        <th style="font-size: 17px;background-color: #221f1c; color :#fdfdfd; width:3px">رقم
                                            الفاتورة</th>

                                    </tr>
                                </thead>
                                <tbody id="users">
                                    <span hidden>{{ $i = 0 }}</span>
                                    @foreach ($bills as $item)
                                        <span hidden>{{ ++$i }}</span>
                                        <tr>
                                            <td style="color: #000000;">



                                                <a class="btn btn-primary btn-sm"
                                                    href="{{ route('order.get.create2', [$item->id]) }}">
                                                    <i class="icon-book">
                                                    </i>
                                                    عرض الفاتورة
                                                </a>

                                                <a onclick="confirmDelete(this, '{{ $item->id }}')" type="button"
                                                    style="font-size: 20px" class="btn btn-sm btn-default js-sweetalert"
                                                    title="حذف" data-type="confirm"><i class="fa fa-trash-o text-danger">
                                                        حذف </i></a>
                                                <span class="badge badge-dark"></span>



                                            </td>

                                            <td style="color: #000000;">
                                                @if ($item->status == 'yes')
                                                    <span style="font-size: 17px" class="badge badge-success">تم
                                                        التقييم</span>
                                                @else
                                                    <span style="font-size: 17px" class="badge badge-warning">قيد
                                                        الإنشاء</span>
                                                @endif

                                            </td>




                                            <td style="color: #000000;"><span
                                                    style="font-size: 17px">{{ $item->created_at->format('d.m.Y') }}</span>
                                            </td>

                                            <td style="color: #000000;"><span
                                                    style="font-size: 17px">{{ $item->user->mobile }}</span></td>

                                            <td style="color: #000000;">
                                                <div class="font-15">{{ $item->name }}</div>
                                            </td>
                                            <td style="color: #000000;">
                                                <div class="font-15">{{ $item->user->name }}</div>
                                            </td>
                                            <td style="color: #000000; width:3px">{{ $i }}</td>
                                            {{-- /////////////////////////////
                                            --}}





                                            {{-- <td><span
                                                    style="font-size: 17px">{{ $user->profit }}</span></td>
                                            --}}

                                            {{-- <td>
                                                @if ($user->status == 'Active')
                                                    <span style="font-size: 17px" class="badge badge-success">نشط</span>
                                                    @else
                                                    <span style="font-size: 17px" class="badge badge-danger">متوقف</span>
                                                @endif

                                            </td> --}}








                                        </tr>
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

    @if ($search == 'no')
        <div id="printbill" class="modal fade" role="dialog">
            <div class="modal-dialog">

                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">الفواتير</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body">
                        <form id="addform" action="{{ route('data.bill') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="exampleInputEmail1" style="font-size: 20px">من</label>
                                <div class="col-md-3 col-sm-6">
                                    <div class="input-group">
                                        <input name="from" value="{{ $from }}" type="text" data-provide="datepicker"
                                            data-date-autoclose="true" class="form-control" placeholder="Select Date">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1" style="font-size: 20px">إلى</label>
                                <div class="col-md-3 col-sm-6">
                                    <div class="input-group">
                                        <input name="to" type="text" value="{{ $to }}" data-provide="datepicker"
                                            data-date-autoclose="true" class="form-control" placeholder="Select Date">
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
    @endif

     @if ($search == 'no')
        <div id="printbillUser" class="modal fade" role="dialog">
            <div class="modal-dialog">

                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">الفواتير</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body">
                        <form id="addform" action="{{ route('data.user.bill') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="exampleInputEmail1" style="font-size: 20px">من</label>
                                <div class="col-md-3 col-sm-6">
                                    <div class="input-group">
                                        <input name="from" value="{{ $from }}" type="text" data-provide="datepicker"
                                            data-date-autoclose="true" class="form-control" placeholder="Select Date">
                                    </div>
                                </div>
                            </div>
                        <input type="hidden" name="user_id" value="{{$user_id}}">
                            <div class="form-group">
                                <label for="exampleInputPassword1" style="font-size: 20px">إلى</label>
                                <div class="col-md-3 col-sm-6">
                                    <div class="input-group">
                                        <input name="to" type="text" value="{{ $to }}" data-provide="datepicker"
                                            data-date-autoclose="true" class="form-control" placeholder="Select Date">
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
    @endif
@endsection
@section('script')

    {{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js">
    </script> --}}

    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>

    <script>
        $("#searchbill").keyup(function() {

            var text = $("#searchbill").val();
            //   var bills = $("#allbills").val();
            //   console.log(bills);

            var token = $("#token").val();
            $.post('/cms/serach/bill', {
                // bills:bills,
                text: text,
                _token: token
            }).done(function(data) {
                console.log(data)

                $('#bills').replaceWith(data);

            });

        });

    </script>
    <script>
        function reprot() {
            console.log(document.getElementById('reportvalue').value);
            axios.post('/cms/report/bills/', {
                    bills: document.getElementById("reportvalue").value,
                })
                .then(function(response) {
                    clearAndHideErrors();
                    clearForm();
                    showMessage(response.data);
                })
                .catch(function(error) {
                    if (error.response.data.errors !== undefined) {
                        showErrorMessages(error.response.data.errors);
                    } else {
                        showMessage(error.response.data);
                    }
                });
        }

    </script>
    <script>
        function confirmDelete(app, id) {
            Swal.fire({
                title: 'هل انت متأكد من الحذف ؟',
                text: "لن تكون قادرا على استرجاعها",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'حذف',
                cancelButtonText: 'تراجع'
            }).then((result) => {
                if (result.value) {
                    deletecategory(app, id)
                }
            })
        }

        function deletecategory(app, id) {
            axios.delete('/cms/bill/' + id)
                .then(function(response) {
                    // handle success (Status Code: 200)
                    console.log(response);
                    console.log(response.data);
                    showMessage(response.data);
                    app.closest('tr').remove();
                })
                .catch(function(error) {
                    // handle error (Status Code: 400)
                    console.log(error);
                    console.log(error.response.data);
                    showMessage(error.response.data);
                })
                .then(function() {
                    // always executed
                });
        }

        function showMessage(data) {
            Swal.fire({
                position: 'center',
                icon: data.icon,
                title: data.title,
                showConfirmButton: false,
                timer: 1500
            })
        }

    </script>

@endsection
