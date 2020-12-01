@extends('cms.parent')
@section('title', '|دفعة  تاجر')

@section('content')
    <div id="main-content">
        <div class="container-fluid">
            <div class="block-header">
                <div class="row clearfix">
                    <div class="col-md-6 col-sm-12">
                        <h1 style="font-size: 20px">دفعة تاجر جديدة</h1>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('admin.dashbord') }}"
                                        style="font-size: 20px">الرئيسية</a></li>
                                <li class="breadcrumb-item"><a href="{{ route('deal.index') }}"
                                        style="font-size: 20px">التجار</a></li>
                                <li class="breadcrumb-item"><a href="{{ route('proud.create') }}"
                                        style="font-size: 20px">دفعة جديدة</a></li>
                                <li class="breadcrumb-item active" aria-current="page" style="font-size: 20px">دفعة جديدة
                                </li>
                            </ol>
                        </nav>
                    </div>
                    <div class="col-md-6 col-sm-12 text-right hidden-xs">
                        <a href="https://themeforest.net/item/oculux-bootstrap-4x-admin-dashboard-clean-modern-ui-kit/23091507"
                            class="btn btn-sm btn-success" title="Themeforest"><i class="icon-basket"></i> Buy Now</a>

                        <a href="https://themeforest.net/item/oculux-bootstrap-4x-admin-dashboard-clean-modern-ui-kit/23091507"
                            class="btn btn-sm btn-success" title="Themeforest"><i class="icon-basket"></i> Buy Now</a>




                    </div>
                </div>
            </div>

            <div class="row clearfix">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="body">
                            <form method="POST" action="{{ route('prod.deal.store') }}" enctype="multipart/form-data">


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
                                @csrf
                                <div class="form-group row">
                                    <div class="col-md-10 col-sm-10">

                                               <div class="form-group">
                                            <label style="font-size: 20px"> اسم التاجر</label>
                                               <input onkeydown="error()" value="{{$deal->name}}" class="form-control "
                                                value="{{ old('gave') }}" style="font-size: 20px" disabled
                                                >
                                               <input type="number" value="{{$deal->id}}" name="deal_id" hidden >

                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1" style="font-size: 20px">تاريخ الدفعة</label>
                                            <div class="col-md-3 col-sm-6">
                                                <div class="input-group">
                                                    <input name="date" type="text" data-provide="datepicker"
                                                data-date-autoclose="true" value="{{old('date')}}" class="form-control"
                                                        placeholder="اختر التاريخ">
                                                </div>
                                            </div>
                                        </div>


                                        <div class="form-group">
                                            <label style="font-size: 20px">المبلغ المُعطى</label>
                                            <input onkeydown="error()" type="number" class="form-control "
                                                value="{{ old('gave') }}" style="font-size: 20px" name="gave"
                                                placeholder="">


                                        </div>

                                        <div class="form-group">
                                            <label style="font-size: 20px">المبلغ المُرجع</label>
                                            <input onkeydown="error()" type="number" class="form-control "
                                                value="{{ old('discount') }}" style="font-size: 20px" name="discount"
                                                placeholder="المبلغ المُرجع">


                                        </div>
                                        <div class="form-group">
                                            <label style="font-size: 20px">المبلغ الأصلي للبضاعة</label>
                                            <input onkeydown="error()" type="number" class="form-control "
                                                value="{{ old('real') }}" style="font-size: 20px" name="real"
                                                placeholder="">


                                        </div>







                                    </div>
                                </div>
                                <div>
                                    <button style="font-size: 20px" class="btn btn-sm btn-primary" type="submit"> إضافة
                                    </button>


                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script>
        function error() {
            document.getElementById('error').hidden = true;
        }

    </script>

@endsection
