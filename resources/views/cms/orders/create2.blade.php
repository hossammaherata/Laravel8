@extends('cms.parent')
@section('title', ' | إنشاء فاتورة')

@section('content')

    <div id="main-content">
        <div class="container-fluid">
            <div class="block-header">
                <div class="row clearfix">
                    <div class="col-md-6 col-sm-12">
                        <h2>Ticket List</h2>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('bill.index') }}">الفواتير</a></li>
                                <li class="breadcrumb-item"><a href="{{ route('admin.dashbord') }}">الصفحة الرئيسية</a></li>
                                <li class="breadcrumb-item active" aria-current="page">إضافة صنف</li>
                            </ol>
                        </nav>
                    </div>
                    <div class="col-md-6 col-sm-12 text-right hidden-xs">
                        <a href="{{ route('bill.create') }}" class="btn btn-sm btn-primary" title="">طلبية أخرى لمسوق
                            جديد</a>
                              @if(!$bill->deleted_at)
                        <a href="{{ route('order.build',[$bill->user->token]) }}" class="btn btn-sm btn-success" title="">فاتورة جديدة لذات المسوق
                            </a>
                            @endif
                    </div>
                </div>
            </div>
            <div class="row clearfix">

                <div class="col-12">
                    <div class="card">

                        <div class="body">
                              @if ($errors->any())
                                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                        <ul>
                                            {{-- @foreach ($errors->all() as $error) --}}
                                                <li>{{ $errors->first() }}</li>
                                                {{--
                                            @endforeach --}}
                                        </ul>
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                    </div>
                                @endif



                            <div class="row">
                                <div class="col-lg-3 col-md-3 col-sm-6">
                                    <label style="font-size: 20px">اسم الزبون</label>

                                    <div class="input-group">
                                        <input type="text" class="form-control" name="namebill" value="{{ $bill->name }}"
                                            disabled placeholder="اسم الزبون">
                                    </div>
                                </div>



                                <div class="col-lg-3 col-md-3 col-sm-6">
                                    <label style="font-size: 20px">رقم الهاتف</label>

                                    <div class="input-group">
                                        <input id="" type="text" class="form-control" disabled name="mobilebill"
                                            value="{{ $bill->mobile }}" placeholder="رقم الهاتف">
                                    </div>
                                </div>

                                <div class="col-lg-3 col-md-3 col-sm-6">
                                    <label style="font-size: 20px">اسم المسوق</label>

                                    <div class="input-group">
                                        <input type="text" class="form-control" disabled value="{{ $bill->user->name }}"
                                            placeholder="اسم المسوق">
                                    </div>
                                    <input type="hidden" id="user_id" name="user_id" value="{{ $bill->user->id }}">
                                    <input type="hidden" id="bill_id" name="bill_id" value="{{ $bill->id }}">

                                </div>
                                                <div class="col-lg-3 col-md-3 col-sm-6">
                                        <label style="font-size: 20px">___</label>

                                        <div class="input-group">
                                              @if(!$bill->deleted_at)
                                           <button id="editbill" data-idbill="{{ $bill->id }}" type="button"
                                                style="font-size: 20px" class="btn btn-sm btn-success editbill" title="تعديل"><i
                                                    class="fa fa-edit"></i>
                                                تعديل</button>
                                                @endif

                                        </div>
                                    </div>

                                  {{-- <button class="btn btn-sm btn-primary" type="submit" title="">إنشاء
                                            </button> --}}


                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-12">
                    <div class="card">

                        <form id="create_admin_form" action="{{ route('order.post.create2') }}" role="form" method="POST">

                            @csrf
                            <div class="body">
                                <div class="alert alert-danger" id="error_alert" role="alert" hidden>
                                    <ul id="error_messages_ul"></ul>
                                </div>
                                @if (session()->has('message'))
                                    <div class="alert {{ session()->get('status') }} alert-dismissible fade show"
                                        role="alert">
                                        <span> {{ session()->get('message') }}</span>
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                @endif
                                <div class="row">
                                    <input type="hidden" id="user_id" name="user_id" value="{{ $bill->user->id }}">
                                    <input type="hidden" id="bill_id" name="bill_id" value="{{ $bill->id }}">

                                    <div class="col-lg-4 col-md-4 col-sm-6">
                                        <label style="font-size: 20px">اسم الصنف</label>

                                        <div class="input-group">
                                            <input type="text" name="name" id="name" class="form-control"
                                                value="{{ old('name') }}" placeholder="اسم الصنف">
                                        </div>
                                    </div>



                                    <div class="col-lg-4 col-md-4 col-sm-6">
                                        <label style="font-size: 20px">الكمية</label>

                                        <div class="input-group">
                                            <input type="number" id="count" name="count" class="form-control"
                                                value="{{ old('count') }}" placeholder="الكمية">
                                        </div>
                                    </div>
                                     <div class="col-lg-4 col-md-4 col-sm-6">
                                        <label style="font-size: 20px">ربح التاجر</label>

                                        <div class="input-group">
                                            <input type="number" id="profitadmin" name="profitadmin" class="form-control"
                                                value="{{ old('profitadmin') }}" placeholder="ربح التاجر">
                                        </div>
                                    </div>



                                    {{-- <div class="col-lg-4 col-md-4 col-sm-6">
                                        <label for="exampleInputPassword1" style="font-size: 20px">تاريخ الفاتورة</label>

                                        <div class="input-group">
                                            <input name="created_at" id="created_at" value="{{ old('created_at') }}"
                                                type="text" data-provide="datepicker" data-date-autoclose="true"
                                                class="form-control" placeholder="Select Date">
                                        </div>
                                    </div> --}}






                                </div>

                                <hr>
                                <div class="row">
                                    <div class="col-lg-4 col-md-4 col-sm-6">
                                        <label style="font-size: 20px">سعر الجملة</label>

                                        <div class="input-group">
                                            <input type="number" id="realprice" name="realprice" class="form-control"
                                                value="{{ old('realprice') }}" placeholder="سعر الجملة">
                                        </div>
                                    </div>



                                    <div class="col-lg-4 col-md-4 col-sm-6">
                                        <label style="font-size: 20px">سعر البيع</label>

                                        <div class="input-group">
                                            <input name="payprice" id="payprice" type="number" class="form-control"
                                                value="{{ old('payprice') }}" placeholder="سعر البيع">
                                        </div>
                                    </div>

                                    <div class="col-lg-4 col-md-4 col-sm-6">
                                        <label style="font-size: 20px">___</label>

                                        <div class="input-group">
                                             @if(!$bill->deleted_at)
                                            <button class="btn btn-sm btn-primary" type="submit" title="">إنشاء
                                            </button>
                                            @endif

                                        </div>
                                    </div>



                                </div>
                            </div>
                        </form>

                    </div>

                </div>
                <div class="col-12">
                    <div class="table-responsive">
                        <table class="table table-custom2 table-hover">
                            <thead>
                                <tr>


                                    <th style="background-color: #575a5c; color: rgb(250, 250, 250);  text-align: center"
                                        colspan="2">تاريخ
                                        الطلبية / {{ $bill->created_at->format('d.m.Y') }}</th>
                                    <th style="background-color: #575a5c; color: rgb(250, 250, 250); text-align: center"
                                        colspan="3">رقم الهاتف
                                        / {{ $bill->mobile }}</th>

                                    <th style="background-color: #575a5c; color: rgb(250, 250, 250); text-align: center"
                                        colspan="2">الزبون /
                                        {{ $bill->name }}
                                    </th>
                                    <th style="background-color: #575a5c; color: rgb(250, 250, 250); text-align: center"
                                        colspan="3">المسوق /
                                        {{ $bill->user->name }}
                                    </th>





                                </tr>
                                {{-- <tr>
                                    <th colspan="5">Ticket Detail</th>
                                    <th colspan="2">Activity</th>
                                    <th colspan="3">Activity</th>


                                </tr> --}}
                            </thead>

                            <tr>
                                <th>الإعدادات</th>
                                {{-- <th>التوصيل</th> --}}
                                <th style="background-color: rgb(22, 219, 88); color:rgb(14, 12, 12)">ربح المسوق</th>
                                <th>إجمالي البيع</th>
                                <th>سعر الجملة</th>
                                <th>سعر بيع القطعة </th>
                                <th>الكمية</th>
                                <th>الحالة</th>
                                <th>ربح التاجر</th>
                                <th>اسم الصنف</th>

                                <th>رقم الطلبية</th>


                            </tr>
                            <span hidden>{{ $i = 0 }}</span>



                            @foreach ($bill->orders as $item)
                                <span hidden>{{ ++$i }}</span>


                                <tbody id="orders">

                                    <tr>

                                        <td>

                                            @if(!$bill->deleted_at)
                                            <button id="edit" data-id="{{ $item->id }}" type="button"
                                                style="font-size: 20px" class="btn btn-sm btn-info edit" title="تعديل"><i
                                                    class="fa fa-edit"></i>
                                                تعديل</button>

                                                @endif

                                                {{-- <button type="button" class="btn btn-round btn-default" data-toggle="modal" data-target=".bd-example-modal-sm">Small modal</button> --}}



                                        </td>
                                        {{-- <td> --}}
                                            {{-- @if --}}
                                            {{-- {{ $i == 1 ? 30 : '___' }} --}}

                                        {{-- </td> --}}
                                        <td style="background-color: rgb(22, 219, 88); color:rgb(14, 12, 12)">
                                            <span>{{ $item->profit }}</span>
                                        </td>
                                        <td>{{ $item->payprice * $item->count }}</td>
                                        <td>{{ $item->realprice }}</td>
                                        <td><span>{{ $item->payprice }}</span></td>
                                         <td><span>{{ $item->count }}</span></td>

                                        <td>

                                            @if ($item->status == 'success')
                                                <span style="font-size: 17px" class="btn btn-success">تم التسليم</span>
                                            @elseif($item->status =='cancel')
                                                <span style="font-size: 17px" class="btn btn-danger">مرفوضة</span>
                                            @elseif($item->status =='wait')
                                                <span style="font-size: 17px" class="btn btn-warning">قيد العمل</span>
                                                {{-- pink --}}
                                            @else
                                                <span style="font-size: 17px" class="btn btn-info">مستردة</span>
                                            @endif
                                        </td>
                                        <td><span>{{ $item->profitadmin }}</span></td>
                                        <td><span>{{ $item->name }}</span></td>
                                        <td style="width: 2px">{{ $bill->id }}</td>
                                        {{-- //////////// --}}











                                    </tr>



                                </tbody>



                            @endforeach
                        </table>
                        <table style="width:30%; border: 1px solid black; border-collapse: collapse;">
                            <caption>التحصيل</caption>
                            <tr>
                                <th
                                    style="border-collapse: collapse; border: 1px solid black; padding: 5px;  text-align: left; ">
                                    إجمالي سعر الجملة</th>
                                <th
                                    style="border-collapse: collapse; border: 1px solid black; padding: 5px;  text-align: left; ">
                                    إجمالي سعر البيع</th>
                                    <th
                                    style="border-collapse: collapse; border: 1px solid black; padding: 5px;  text-align: left; background-color: rgb(180, 12, 12); color:rgb(14, 12, 12)">
                                    التوصيل </th>
                                <th
                                    style="border-collapse: collapse; border: 1px solid black; padding: 5px;  text-align: left; background-color: rgb(22, 219, 88); color:rgb(14, 12, 12)">
                                    ربح المسوق</th>
                                    <th
                                    style="border-collapse: collapse; border: 1px solid black; padding: 5px;  text-align: left; background-color: rgb(22, 219, 88); color:rgb(14, 12, 12)">
                                    ربح التاجر</th>

                            </tr>
                            <tr>

                                <td
                                    style="border-collapse: collapse; border: 1px solid black; padding: 5px;  text-align: left; ">
                                    {{ $bill->realprice }}
                                </td>

                                <td
                                    style="border-collapse: collapse; border: 1px solid black; padding: 5px;  text-align: left; ">
                                    {{ $bill->total }}
                                </td>
                                <td
                                    style="border-collapse: collapse; border: 1px solid black; padding: 5px;  text-align: left; background-color: rgb(180, 12, 12); color:rgb(255, 255, 255) ">
                                    -30
                                </td>
                                <td
                                    style="border-collapse: collapse; border: 1px solid black; padding: 5px;  text-align: left; background-color: rgb(22, 219, 88); color:rgb(14, 12, 12) ">
                                    {{ $bill->orders->where('status', 'success')->count() > 0 ? $bill->orders->sum('profit') - 30 : $bill->orders->sum('profit') }}
                                </td>
                                <td
                                    style="border-collapse: collapse; border: 1px solid black; padding: 5px;  text-align: left; background-color: rgb(22, 219, 88); color:rgb(14, 12, 12) ">
                                    {{ $bill->orders->where('status','success')->sum('profitadmin')}}
                                </td>
                            </tr>

                        </table>
                    </div>
                </div>
            </div>

        </div>
    </div>


    <div id="editmodel"></div>
    <div id="editmodelbill"></div>
    <input type="hidden" name="" id="token" value="{{ csrf_token() }}">
@endsection


@section('script')

    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>

    <script>
        $(".edit").click(function() {
            //   location.reload();
            var id = $(this).data('id');
            console.log(id);
            $.get('/cms/order/' + id + '/edit').done(function(item) {
                console.log(item);
                console.log(10);
                // $item.print();
                $('#editmodel').replaceWith(item);
                $('#editmodel').modal("show");
            });
        });

          $(".editbill").click(function() {
            var id = $(this).data('idbill');
            console.log(id);
            $.get('/cms/bill/' + id + '/edit').done(function(item) {
                console.log(item);
                //  window.print();
                $('#editmodelbill').replaceWith(item);
                $('#editmodelbill').modal("show");
            });
        });

        //  $(".edit").click(function() {
        //     var id = $(this).data('id');
        //     console.log(id);
        //     $.get('/cms/order/' + id + '/edit').done(function(item) {
        //         console.log(item);
        //         console.log(10);
        //         $('#editmodel').replaceWith(item);
        //         $('#editmodel').modal("show");
        //     });
        // });

        //    $(".edit").click(function(){
        //     var id = $(this).data('id');
        //     console.log(id)
        //     var token=$("#token").val();
        //     $.post('/cms/order/get/edit',{id : id ,_token : token}).done(function(data){
        //         console.log(data);
        //         $('#editmodel').replaceWith(data);

        //     });

        // });

        function h() {
            alert("erdsf");
        }


    </script>


@endsection
