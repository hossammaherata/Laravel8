@extends('cms.parent')
@section('title','الكُتاب')
@section('style')

<link rel="stylesheet" href="{{asset('cms/assets/vendor/jquery-datatable/dataTables.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('cms/assets/vendor/jquery-datatable/fixedeader/dataTables.fixedcolumns.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('cms/assets/vendor/jquery-datatable/fixedeader/dataTables.fixedheader.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('cms/assets/vendor/sweetalert/sweetalert.css')}}"/>

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
                        <h1>Authors</h1>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#">ِAuthors</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Authors</li>
                            </ol>
                        </nav>
                    </div>

                </div>
            </div>

            <div class="row clearfix">

                <div class="col-lg-12">
                    <div class="card">

                        <div class="body">
                            <div class="table-responsive">
                                <table class="table table-striped table-hover dataTable js-exportable">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                          <th>Name</th>
                                          <th>Image</th>
                                            <th>Email</th>
                                            <th>Mobile</th>
                                            <th>Status</th>
                                            <th>Address</th>
                                            <th>CreatedAt</th>
                                             <th>Settings</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>#</th>
                                            <th>Name</th>
                                            <th>Image</th>
                                            <th>Email</th>
                                            <th>Mobile</th>
                                            <th>Status</th>
                                            <th>Address</th>
                                            <th>CreatedAt</th>
                                            <th>Settings</th>

                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <span hidden>{{$i=0}}</span>
                                            @foreach ($authors as $admin)
                                    <span hidden>{{$i++}}</span>

                                        <tr>
                                        <td>{{$i}}</td>
                                            <td>{{$admin->name}}</td>
                                               <td class="w60">
                                            <img src="{{url('images/authors/'.$admin->image)}}" data-toggle="tooltip" data-placement="top" title="{{$admin->name}}" alt="{{$admin->name}}" class="w35 h35 rounded">
                                        </td>
                                            <td>{{$admin->email}}</td>
                                            <td>{{$admin->mobile}}</td>
                                            <td>
                                                     @if($admin->status=='Active')
                                        <span style="font-size: 17px" class="badge badge-success">نشطة</span>
                                        @else
                                    <span style="font-size: 17px" class="badge badge-danger">متوقفة</span>
                                        @endif

                                            </td>
                                            <td>{{$admin->address}}</td>
                                            <td>{{$admin->created_at}}</td>
                                            <td>

                                        <a href="{{route('author.edit',[$admin->token])}}" type="button" style="font-size: 20px" class="btn btn-sm btn-default" title="تعديل"><i class="fa fa-edit"></i> تعديل</a>
                                        <a onclick="confirmDelete(this, '{{$admin->token}}')" type="button" style="font-size: 20px" class="btn btn-sm btn-default js-sweetalert" title="حذف" data-type="confirm"><i class="fa fa-trash-o text-danger"> حذف </i></a>


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
            axios.delete('/cms/author/' + id)
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
