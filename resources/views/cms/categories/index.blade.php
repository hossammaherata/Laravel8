@extends('cms.parent')
@section('title','الفئات')

@section('content')

    <div id="main-content">
        <div class="container-fluid">
            <div class="block-header">
                <div class="row clearfix">
                    <div class="col-md-6 col-sm-12">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#" style="font-size: 20px">الرئيسية</a></li>
                            <li class="breadcrumb-item " style="font-size: 20px" aria-current="page">الفئات</li>
                            </ol>
                        </nav>
                    </div>
                    <div class="col-md-6 col-sm-12 text-right hidden-xs">
                    <a href="{{route('category.create')}}" class="btn btn-sm btn-primary" title="">فئة جديدة</a>
                        {{-- <a href="https://themeforest.net/item/oculux-bootstrap-4x-admin-dashboard-clean-modern-ui-kit/23091507" class="btn btn-sm btn-success" title="Themeforest"><i class="icon-basket"></i> Buy Now</a> --}}
                    </div>
                </div>
            </div>

            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <div class="card">
                        <div class="header">
                            <h2 style="font-size: 20px">الفئات</h2>

                        </div>
                        <div class="table-responsive">
                            <table class="table table-hover js-basic-example dataTable table-custom spacing5 mb-0">
                                <thead>
                                    <tr>
                                        <th >#</th>
                                          <th style="font-size: 17px">صورة الفئة</th>
                                        <th style="font-size: 17px">الفئة</th>
                                        {{-- <th style="font-size: 17px">منتجات الفئة</th> --}}
                                        <th style="font-size: 17px">حالة الفئة</th>

                                        {{-- <th style="font-size: 17px">منتجات الفئة</th> --}}
                                        <th style="font-size: 17px">الإعدادات</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <span hidden>{{$i=0}}</span>
                                    @foreach ($categories as $category)
                                <span hidden>{{$i++}}</span>

                                    <tr>
                                    <td>{{$i}}</td>
                                        <td class="w60">
                                            <img src="{{url('images/categories/'.$category->image)}}" data-toggle="tooltip" data-placement="top" title="Avatar Name" alt="Avatar" class="w35 h35 rounded">
                                        </td>

                                    <td><span style="font-size: 17px">{{$category->name}}</span></td>
                                      {{-- <td>
                                            <a class="btn btn-info btn-sm"
                                               href="{{route('category.product',[$category->id])}}">
                                                <i class="icon-note">
                                                </i>
                                                ({{$category->product_count}}) عدد المنتجات
                                            </a>
                                            <span class="badge badge-dark"></span>
                                        </td> --}}
                                     <td>
                                         @if($category->status=='Visible')
                                        <span style="font-size: 17px" class="badge badge-success">نشطة</span>
                                        @else
                                    <span style="font-size: 17px" class="badge badge-danger">متوقفة</span>
                                        @endif

                                    </td>
                                        <td>
                            <a href="{{route('category.edit',[$category->token])}}" type="button" style="font-size: 20px" class="btn btn-sm btn-default" title="تعديل"><i class="fa fa-edit"></i> تعديل</a>
                                        <a onclick="confirmDelete(this, '{{$category->token}}')" type="button" style="font-size: 20px" class="btn btn-sm btn-default js-sweetalert" title="حذف" data-type="confirm"><i class="fa fa-trash-o text-danger"> حذف </i></a>


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
@endsection
@section('script')
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>

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
                cancelButtonText:'تراجع'
            }).then((result) => {
                if (result.value) {
                    deletecategory(app, id)
                }
            })
        }

        function deletecategory(app, id) {
            axios.delete('/cms/category/' + id)
                .then(function (response) {
                    // handle success (Status Code: 200)
                    console.log(response);
                    console.log(response.data);
                    showMessage(response.data);
                    app.closest('tr').remove();
                })
                .catch(function (error) {
                    // handle error (Status Code: 400)
                    console.log(error);
                    console.log(error.response.data);
                    showMessage(error.response.data);
                })
                .then(function () {
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
