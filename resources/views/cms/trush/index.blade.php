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
                                <li class="breadcrumb-item"><a href="{{ route('admin.dashbord') }}"
                                        style="font-size: 20px">الرئيسية</a></li>

                                <li class="breadcrumb-item"><a href="{{ route('bill.index') }}" href="#"
                                        style="font-size: 20px">الفواتير</a></li>

                                <li class="breadcrumb-item"><a href="{{ route('report.bill.index') }}"
                                        style="font-size: 20px">المحذوفات</a></li>



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

            <div class="row clearfix" id="bills">
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <div class="card">

                        <div class="table-responsive">
                            <table class="table table-custom2 table-hover">
                                <thead>
                                    <tr>

                                        <th style="ba font-size: 17px;background-color: #221f1c; color :#fdfdfd">الإعدادات
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

                                                <a onclick="confirmDelete(this, '{{ $item->id }}')" type="button"
                                                    style="font-size: 20px" class="btn btn-sm btn-default js-sweetalert"
                                                    title="حذف" data-type="confirm"><i class="fa fa-trash-o text-success">
                                                        إستعادة </i></a>

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








                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

            </div>

            <div class="row clearfix" id="bills">
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <div class="card">

                        <div class="table-responsive">
                            <table class="table table-custom2 table-hover">
                                <thead>
                                    <tr>

                                        <th style="ba font-size: 17px;background-color: #221f1c; color :#fdfdfd">الإعدادات
                                        </th>

                                        <th style="font-size: 17px;background-color: #221f1c; color :#fdfdfd">هاتف المسوق
                                        </th>

                                        <th style="font-size: 17px;background-color: #221f1c; color :#fdfdfd">اسم المسوق
                                        </th>
                                        <th style="font-size: 17px;background-color: #221f1c; color :#fdfdfd; width:3px">رقم
                                            المسوق</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    <span hidden>{{ $i = 0 }}</span>
                                    @foreach ($users as $item)
                                        <span hidden>{{ ++$i }}</span>
                                        <tr>
                                            <td style="color: #000000;">

                                                <a onclick="confirmRestore(this, '{{ $item->id }}')" type="button"
                                                    style="font-size: 20px" class="btn btn-sm btn-default js-sweetalert"
                                                    title="حذف" data-type="confirm"><i class="fa fa-trash-o text-success">
                                                        إستعادة </i></a>

                                            </td>

                                            <td style="color: #000000;"><span
                                                    style="font-size: 17px">{{ $item->mobile }}</span></td>

                                            <td style="color: #000000;">
                                                <div class="font-15">{{ $item->name }}</div>
                                            </td>

                                            <td style="color: #000000; width:3px">{{ $i }}</td>








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

@endsection
@section('script')

    {{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js">
    </script> --}}

    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>


    <script>
        function reprot() {
            console.log(document.getElementById('reportvalue').value);
            axios.post('/cms/truch/restore/', {
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
                title: 'هل انت متأكد من إسترجاعها ؟',
                text: "",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3fe663',
                cancelButtonColor: '#d33',
                confirmButtonText: 'إسترجاع',
                cancelButtonText: 'تراجع'
            }).then((result) => {
                if (result.value) {
                    deletecategory(app, id)
                }
            })
        }



        function confirmRestore(app, id) {
            Swal.fire({
                title: 'هل انت متأكد من إسترجاعها ؟',
                text: "",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3fe663',
                cancelButtonColor: '#d33',
                confirmButtonText: 'إسترجاع',
                cancelButtonText: 'تراجع'
            }).then((result) => {
                if (result.value) {
                    restoreUser(app, id)
                }
            })
        }



        function deletecategory(app, id) {
            axios.delete('/cms/truch/restore/' + id)
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


        function restoreUser(app, id) {
            axios.delete('/cms/truch/restore/user/' + id)
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
