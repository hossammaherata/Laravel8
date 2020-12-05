@extends('cms.parent')
@section('title', ' | المسابقات')
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
                                <li class="breadcrumb-item " style="font-size: 20px" aria-current="page">المسابقات</li>
                            </ol>
                        </nav>
                    </div>
                    <div class="col-md-6 col-sm-12 text-right hidden-xs">
                        <a data-toggle="modal" data-target=".new-project-modal" href="#" class="btn btn-sm btn-primary"
                            title="">مسابقة جديدة</a>
                    </div>
                </div>
            </div>


            <div class="row clearfix" id="users">
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <div class="card">

                        <div class="table-responsive">
                            <table class="table table-hover js-basic-example dataTable table-custom spacing5 mb-0">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th style="font-size: 17px">الصورة</th>
                                        <th style="font-size: 17px">الوصف</th>
                                        <th style="font-size: 17px">الحالة</th>
                                        <th style="font-size: 17px">تاريخ الإنشاء</th>
                                         <th style="font-size: 17px">تاريخ الإنتهاء</th>
                                        <th style="font-size: 17px">الإعدادات</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <span hidden>{{ $i = 0 }}</span>
                                    @foreach ($events as $item)
                                        <span hidden>{{ $i++ }}</span>

                                        <tr>
                                            <td>{{ $i }}</td>
                                            <td class="w60">
                                            <img src="{{url('images/events/'.$item->image)}}" data-toggle="tooltip" data-placement="top" title="{{$item->name}}" alt="{{$item->name}}" class="w35 h35 rounded">
                                        </td>



                                            <td>
                                                <div class="font-15">{{ $item->desc }}</div>
                                            </td>
                                            <td>
                                                @if ($item->status == 'InVisible')
                                                    <span class="badge badge-danger">غير معروضة</span>
                                                @else
                                                    <span class="badge badge-success">معروضة</span>
                                                @endif

                                            </td>
                                             <td style="color: #000000;"><span
                                                    style="font-size: 17px">{{ $item->created_at->format('d.m.Y') }}</span>
                                            </td>
                                            <td style="color: #000000;"><span
                                                    style="font-size: 17px">{{ $item->end }}</span>
                                            </td>

                                            <td>
                                             <button id="edit" data-id="{{ $item->id }}" type="button"
                                                style="font-size: 20px" class="btn btn-sm btn-info editevent" title="تعديل"><i
                                                    class="fa fa-edit"></i>
                                                تعديل</button>
                                                <a onclick="confirmDelete(this, '{{ $item->id }}')" type="button"
                                                    style="font-size: 20px" class="btn btn-sm btn-default js-sweetalert"
                                                    title="حذف" data-type="confirm"><i class="fa fa-trash-o text-danger">
                                                        حذف </i></a>


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

<div id="editevent"></div>
    </div>


@endsection
@section('script')

    {{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js">
    </script> --}}

    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>


    <script>

             $(".editevent").click(function() {
            //   location.reload();
            var id = $(this).data('id');
            console.log(id);
            $.get('/cms/event/' + id + '/edit').done(function(item) {
                console.log(item);
                console.log(10);
                // $item.print();
                $('#editevent').replaceWith(item);
                $('#editevent').modal("show");
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
            axios.delete('/cms/event/delete/' + id)
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
