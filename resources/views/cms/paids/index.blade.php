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
                                <li class="breadcrumb-item"><a href="{{ route('admin.dashbord') }}"
                                        style="font-size: 20px">الرئيسية</a></li>
                                <li class="breadcrumb-item"><a href="#" data-toggle="modal" data-target="#addpaids"
                                        style="font-size: 20px">دفعة جديدة</a></li>
                                <li class="breadcrumb-item " style="font-size: 20px" aria-current="page">المسوقين</li>
                            </ol>
                        </nav>
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

                                        <th style="font-size: 17px"> إعدادات</th>
                                        <th style="font-size: 17px"> الملاحظة</th>

                                        <th style="font-size: 17px"> نهاية تاريخ الدفعة الدفعة</th>
                                        <th style="font-size: 17px"> بداية تاريخ كشف الدفعة</th>

                                        <th style="font-size: 17px"> تاريخ دفعة الصرافة </th>
                                        <th style="font-size: 17px">المبلغ</th>
                                        <th>#</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <span hidden>{{ $i = 0 }}</span>
                                    @foreach ($paids as $item)
                                        <span hidden>{{ $i++ }}</span>

                                        <tr>
                                            <td>
                                                  <button  data-id="{{ $item->id }}" type="button"
                                                style="font-size: 20px" class="btn btn-sm btn-info edit" title="تعديل"><i
                                                    class="fa fa-edit"></i>
                                                تعديل</button>
                                            </td>
                                            @if ($item->note)
                                                <td>{{ $item->note }}</td>

                                            @else
                                                <td>لا يوجد</td>

                                            @endif
                                            <td>{{ $item->to }}</td>

                                            <td>
                                                <div class="font-15">{{ $item->from }}</div>
                                            </td>
                                            <td>
                                                <span
                                                    style="font-size: 17px">   {{ $item->created_at->format('Y.m.d') }}</span>
                                            </td>

                                            <td>
                                                <span class="btn btn-success btn-sm"> <i class="fa fa-dollar"></i> {{ $item->value }}</span>
                                            </td>
                                            <td>
                                                {{ $i }}

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
    </div>
  <div id="editmodelpaid"></div>
@endsection
@section('script')

    {{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js">
    </script> --}}

    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>


     <script>
            $(".edit").click(function() {
            //   location.reload();
            var id = $(this).data('id');
            console.log(id);
            $.get('/cms/paid/get/paid/' + id).done(function(item) {
                console.log(item);
                console.log(10);
                // $item.print();
                $('#editmodelpaid').replaceWith(item);
                $('#editmodelpaid').modal("show");
            });
        });
        </script>


@endsection
