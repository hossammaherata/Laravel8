@extends('cms.parent')
@section('title', ' | التجار')
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
                                 <li class="breadcrumb-item"><a href="{{route('deal.create')}}" style="font-size: 20px">تاجر جديد</a></li>
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

             <div class="row clearfix">
                <div class="col-md-12">
                    <div class="card">
                        <div class="body">
                            <div class="input-group mb-3">
                                <input id="searchdeal" type="text" class="form-control" placeholder="أدخل اسم التاجر">
                                <div class="input-group-append">
                                    <button class="btn btn-outline-secondary" type="button"></button>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <div class="row clearfix" id="dealers">
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <div class="card">

                        <div class="table-responsive">
                            <table class="table table-hover js-basic-example dataTable table-custom spacing5 mb-0">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th style="font-size: 17px">الإسم</th>
                                        <th style="font-size: 17px">الهاتف</th>
                                        <th style="font-size: 17px">المبلغ الحالي</th>
                                        <th style="font-size: 17px">عرض المستخدم</th>
                                        <th style="font-size: 17px">الإعدادات</th>
                                    </tr>
                                </thead>
                                <tbody >
                                    <span hidden>{{ $i = 0 }}</span>
                                    @foreach ($deals as $deal)
                                        <span hidden>{{ $i++ }}</span>

                                        <tr>
                                            <td>{{ $i }}</td>

                                            <td>
                                                <div class="font-15">{{ $deal->name }}</div>
                                            </td>
                                            <td><span style="font-size: 17px">{{ $deal->mobile }}</span></td>

                                            <td>
                                                 <a class="btn btn-danger btn-sm"
                                                  {{--
                                                    href="{{ route('deal.details', [$deal->id]) }}">
                                                    --}}
                                                    href="#">

                                                    <i class="fa fa-dollar">
                                                    </i>
                                                    {{-- ({{ $deal->details_count }}) عدد
                                                    الطلبات --}}
                                                   {{$deal->mony}}
                                                </a>
                                                <span class="badge badge-dark"></span>
                                            </td>
                                            {{-- <td><span style="font-size: 17px">{{ $deal->profit }}</span></td> --}}

                                            <td>
                                                <a class="btn btn-success btn-sm"
                                                   
                                                    href="{{route('deal.proud',[$deal->id])}}">

                                                    <i class="icon-deal">
                                                    </i>
                                                
                                                    عرض الفواتير
                                                </a>
                                                <span class="badge badge-dark"></span>
                                            </td>
                                            {{-- <td>
                                                @if ($deal->status == 'Active')
                                                    <span style="font-size: 17px" class="badge badge-success">نشط</span>
                                                    @else
                                                    <span style="font-size: 17px" class="badge badge-danger">متوقف</span>
                                                @endif

                                            </td> --}}



                                            <td>
                                                <a href="{{ route('deal.edit', [$deal->id]) }}" type="button"
                                                    style="font-size: 20px" class="btn btn-sm btn-default" title="تعديل"><i
                                                        class="fa fa-edit"></i> تعديل</a>
                                                 <a
                                                    onclick="confirmDelete(this, '{{ $deal->id }}')" type="button"
                                                    style="font-size: 20px" class="btn btn-sm btn-default js-sweetalert"
                                                    title="حذف" data-type="confirm"><i class="fa fa-trash-o text-danger">
                                                        حذف </i></a> 
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
<input type="hidden" name="" id="token" value="{{csrf_token()}}">
@endsection
@section('script')

{{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> --}}

    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>

    <script>
        $("#searchdeal").keyup(function(){

            var text=$("#searchdeal").val();

            var token=$("#token").val();
            $.post('/cms/dealer/search',{text : text ,_token : token}).done(function(data){
 

                $('#dealers').replaceWith(data);

            });

        });
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
            axios.delete('/cms/deal/' + id)
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
