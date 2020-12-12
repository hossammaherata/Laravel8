@extends('user.parent')

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

                                <li class="breadcrumb-item " style="font-size: 20px" aria-current="page">
                                 الرسائل
                                </li>
                            </ol>
                        </nav>
                    </div>

                </div>
            </div>

            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <div class="card">
                        <div class="header">
                            <h2 style="font-size: 20px">الرسائل</h2>

                        </div>
                        <div class="table-responsive">
                            <table class="table table-hover js-basic-example dataTable table-custom spacing5 mb-0">
                                <thead>
                                    <tr>
                                        <th>#</th>

                                        <th style="font-size: 17px">الموضوع</th>
                                        <th style="font-size: 17px"> عرض </th>
                                        <th style="font-size: 17px">تاريخ الإنشاء</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <span hidden>{{ $i = 0 }}</span>
                                    @foreach ($messages as $item)
                                        <span hidden>{{ $i++ }}</span>

                                        <tr>
                                            <td>{{ $i }}</td>


                                            <td><span style="font-size: 17px">{{ $item->title }}</span></td>

                                            <td>
                                                <a data-id="{{ $item->id }}" class=" btn btn-info btn-sm show" href="#">
                                                    <i class="icon-note">
                                                    </i>
                                                    عرض
                                                </a>
                                                <span class="badge badge-dark"></span>
                                            </td>

                                            <td><span
                                                    style="font-size: 17px">{{ $item->created_at->format('Y.m.d') }}</span>
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

    <div id="showMessage"></div>
@endsection
@section('script')


    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
    <script>
        $(".show").click(function() {

            var id = $(this).data('id');


            $.get('/auth/user/message/show/' + id).done(function(item) {
                console.log(item);

                $('#showMessage').replaceWith(item);
                $('#showMessage').modal("show");
            });
        });

    </script>

@endsection
