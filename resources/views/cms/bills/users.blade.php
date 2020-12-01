@extends('cms.parent')
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
                                <li class="breadcrumb-item " style="font-size: 20px" aria-current="page">المسوقين</li>
                            </ol>
                        </nav>
                    </div>

                </div>
            </div>

            <div class="row clearfix">
                <div class="col-md-12">
                    <div class="card">
                        <div class="body">
                            <div class="input-group mb-3">
                                <input id="searchuser" type="text" class="form-control" placeholder="أدخل اسم المسوق">
                                <div class="input-group-append">
                                    <button class="btn btn-outline-secondary" type="button"></button>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <div class="card">

                        <div class="table-responsive">
                            <table class="table table-hover js-basic-example dataTable table-custom spacing5 mb-0">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th style="font-size: 17px">الإسم</th>
                                        <th style="font-size: 17px"> رقم الهوية</th>

                                        <th style="font-size: 17px"> طلبية </th>
                                    </tr>
                                </thead>
                                <tbody id="users">
                                    <span hidden>{{ $i = 0 }}</span>
                                    @foreach ($users as $user)
                                        <span hidden>{{ $i++ }}</span>

                                        <tr>
                                            <td>{{ $i }}</td>

                                            <td>
                                                <div class="font-15">{{ $user->name }}</div>
                                            </td>
                                            <td><span style="font-size: 17px">{{ $user->idint }}</span></td>

                                            <td>
                                                <a href="{{route('order.build',[$user->token])}}"   type="button"
                                                    style="font-size: 20px" class="btn btn-sm btn-success"
                                                     title="طلبية جديدة"><i
                                                        class="fa fa-diamond "></i> فاتورة جديدة</a>
                                                {{-- <a
                                                    onclick="confirmDelete(this, '{{ $user->id }}')" type="button"
                                                    style="font-size: 20px" class="btn btn-sm btn-default js-sweetalert"
                                                    title="حذف" data-type="confirm"><i class="fa fa-trash-o text-danger">
                                                        حذف </i></a> --}}
                                                {{-- <button type="button"
                                                    class="btn btn-sm btn-default" title="عرض"><i
                                                        class="icon-diamond"></i></button> --}}

                                            </td>




                                            {{-- <td>
                                                <a href="javascript:void(0);" class="btn btn-info btn-round">Interview</a>

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
@endsection
@section('script')

    {{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js">
    </script> --}}

    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>

    <script>
        $("#searchuser").keyup(function() {

            var text = $("#searchuser").val();
            console.log(text);
            var token = $("#token").val();
            $.post('/cms/user/serach/bill', {
                text: text,
                _token: token
            }).done(function(data) {

                // console.log(data);
                $('#users').replaceWith(data);

            });

        });

    </script>


@endsection
