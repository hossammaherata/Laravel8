@extends('cms.parent')
@section('title', ' | فاتورة تاجر')
@section('content')


    <div id="main-content">
        <div class="container-fluid">
            <div class="block-header">
                <div class="row clearfix">
                    <div class="col-md-6 col-sm-12">
                    <h2>{{$deal->name}}</h2>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{route('deal.index')}}">التجار</a></li>
                                <li class="breadcrumb-item"><a href="{{route('admin.dashbord')}}">الرئيسية</a></li>
                            <li class="breadcrumb-item active" aria-current="page">{{$deal->name}}</li>
                            </ol>
                        </nav>
                    </div>

                </div>
            </div>
              <div class="row clearfix">
                <div class="col-lg-3 col-md-6">
                    <div class="card">
                        <div class="body">
                            <div class="d-flex align-items-center">
                                <div class="icon-in-bg bg-indigo text-white rounded-circle"><i class="fa fa-briefcase"></i></div>
                                <div class="ml-4">
                                    <span>عدد الفواتير</span>
                                <h4 class="mb-0 font-weight-medium">{{$deal->products->count()}}</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="card">
                        <div class="body">
                            <div class="d-flex align-items-center">
                                <div class="icon-in-bg bg-azura text-white rounded-circle"><i class="fa fa-credit-card"></i></div>
                                <div class="ml-4">
                                    <span>المبلغ المُرجع</span>
                                <h4 class="mb-0 font-weight-medium">$ <span>{{$deal->mony}}</span></h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <div class="row clearfix">
                <div class="col-12">
                    <div class="card">
                        <form action="{{ route('prod.deal.store') }}" method="POST">
                            @csrf
                            <div class="body">
                                <input type="number" hidden name="deal_id" value="{{ $deal->id }}">
                                @if ($errors->any())
                                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                        <ul>

                                            <li>{{ $errors->first() }}</li>

                                        </ul>
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                    </div>
                                @endif
                                @if (session()->has('message'))
                                    <div class="alert {{ session()->get('status') }} alert-dismissible fade show"
                                        role="alert">
                                        <span> {{ session()->get('message') }}</span>
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                @endif
                                                                      <input hidden  type="text" value="" name="day" id="daystore">

                                <div class="row">
                                    <div class="col-lg-2 col-md-4 col-sm-6">
                                        <div class="input-group">
                                            <input name="date" id="store" type="text" data-provide="datepicker"
                                                data-date-autoclose="true" value="{{ old('date') }}" class="form-control"
                                          onchange="gg()"      placeholder="اختر التاريخ">
                                        </div>
                                    </div>
                                    <div class="col-lg-2 col-md-4 col-sm-6">
                                        <div class="input-group">
                                            <input type="number" class="form-control" name="gave" value="{{ old('gave') }}"
                                                placeholder="المبلغ المُعطى">
                                        </div>
                                    </div>
                                    <div class="col-lg-2 col-md-4 col-sm-6">
                                        <div class="input-group">
                                            <input type="number" class="form-control " name="discount"
                                                value="{{ old('discount') }}" placeholder="المبلغ المُرجع">
                                        </div>
                                    </div>
                                    <div class="col-lg-2 col-md-4 col-sm-6">
                                        <div class="input-group">
                                            <input type="number" name="real" value="{{ old('real') }}" class="form-control"
                                                placeholder="سعر البضاعة الأصلي">
                                        </div>
                                    </div>


                                    <div class="col-lg-2 col-md-4 col-sm-6">
                                        <button type="submit" class="btn btn-sm btn-primary btn-block"
                                            title="">إنشاء</button>
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

                                    <th>الإعدادات</th>
                                    <th>الحالة</th>
                                    <th>المٌرجع</th>
                                    <th>سعر البضاعة الأصلي</th>
                                    <th>السعر المُعطى</th>
                                    <th>التاريخ</th>
                                    <th class="w30">&nbsp;</th>
                                </tr>
                            </thead>
                            <tbody>
                                <span hidden>{{ $i = 0 }}</span>
                                @foreach ($deal->products as $item)
                                    <span hidden>{{ ++$i }}</span>

                                    <tr>

                                        <td>

                                            <a href="#" data-id="{{ $item->id }}"  type="button" style="font-size: 20px" class="btn edit btn-sm btn-default"
                                                title="تعديل"><i class="fa fa-edit"></i> تعديل</a>
                                            {{-- <a onclick="confirmDelete(this, '1')" type="button" style="font-size: 20px"
                                                class="btn btn-sm btn-default js-sweetalert" title="حذف"
                                                data-type="confirm"><i class="fa fa-trash-o text-danger"> حذف </i></a> --}}


                                        </td>
                                        <td>
                                            @if ($item->status == 'wait')
                                                <span class="badge badge-warning">قيد المتابعة</span>
                                            @else
                                                <span class="badge badge-success">تم التقييم</span>
                                            @endif

                                        </td>
                                        <td><span class="btn btn-danger btn-sm">{{ $item->discount }}</span></td>
                                        <td><span>{{ $item->real }}</span></td>
                                        <td><span>{{ $item->gave }}</span></td>
                                    <input type="text" value="{{$item->created_at}}" hidden class="created">
                                    <td><span>{{ $item->created_at->format('d.m.Y') }}</span> <span class="day"> |{{  $item->day }}| </span></td>
                                        <td>
                                            <label class="fancy-checkbox margin-0">
                                                <span>{{ $i }}</span>
                                            </label>
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
<div id="editproduct"></div>
@endsection
@section('script')

<script>
     var day = document.getElementById("store").value;
              var d = new Date(day);
              var weekday = new Array(7);
              weekday[0] = "الأحد";
              weekday[1] = "الإثنين";
              weekday[2] = "الثلاثاء";
              weekday[3] = "الأربعاء";
              weekday[4] = "الخميس";
              weekday[5] = "الجمعة";
              weekday[6] = "السبت";

              var n = weekday[d.getDay()];
              document.getElementById("daystore").setAttribute("value", n);
</script>
    <script>
         $(".edit").click(function() {

            var id = $(this).data('id');
            console.log(id);
            $.get('/cms/proud/' + id + '/edit').done(function(item) {

                // $item.print();
                $('#editproduct').replaceWith(item);
                $('#editproduct').modal("show");
            });
        });
    </script>

    <script>
   function gg() {


              var day = document.getElementById("store").value;
              var d = new Date(day);
              var weekday = new Array(7);
                weekday[0] = "الأحد";
              weekday[1] = "الإثنين";
              weekday[2] = "الثلاثاء";
              weekday[3] = "الأربعاء";
              weekday[4] = "الخميس";
              weekday[5] = "الجمعة";
              weekday[6] = "السبت";

              var n = weekday[d.getDay()];
              document.getElementById("daystore").setAttribute("value", n);
          }
</script>
@endsection
