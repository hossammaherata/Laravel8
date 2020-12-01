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
                                <li class="breadcrumb-item"><a href="{{ route('user.index') }}">المسوقين</a></li>
                                <li class="breadcrumb-item active" aria-current="page">فاتورة</li>
                            </ol>
                        </nav>
                    </div>
                    <div class="col-md-6 col-sm-12 text-right hidden-xs">
                        <a href="{{ route('bill.create') }}" class="btn btn-sm btn-primary" title="">فاتورة جديدة لمسوق
                            آخر</a>

                    </div>
                </div>
            </div>
            <div class="row clearfix">

                <div class="col-12">
                    <div class="card">
                        <form action="{{ route('order.store') }}" method="POST">

                            @csrf
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
                                    <div class="col-lg-4 col-md-4 col-sm-6">
                                        <label style="font-size: 20px">اسم الزبون</label>

                                        <div class="input-group">
                                            <input type="text" class="form-control" name="namebill"
                                                value="{{ old('namebill') }}" placeholder="اسم الزبون">
                                        </div>
                                    </div>



                                    <div class="col-lg-4 col-md-4 col-sm-6">
                                        <label style="font-size: 20px">رقم الهاتف</label>

                                        <div class="input-group">
                                            <input type="text" class="form-control" name="mobilebill"
                                                value="{{ old('mobilebill') }}" placeholder="رقم الهاتف">
                                        </div>
                                    </div>

                                    <div class="col-lg-4 col-md-4 col-sm-6">
                                        <label style="font-size: 20px">اسم المسوق</label>

                                        <div class="input-group">
                                            <input type="text" class="form-control" disabled value="{{ $user->name }}"
                                                placeholder="اسم المسوق">
                                        </div>
                                        <input type="hidden" name="user_id" value="{{ $user->id }}">
                                    </div>


                                </div>
                            </div>
                    </div>
                </div>

                <div class="col-12">
                    <div class="card">

                        <div class="body">
                            <div class="row">

                                <div class="col-lg-3 col-md-3 col-sm-6">
                                    <label style="font-size: 20px">اسم الصنف</label>

                                    <div class="input-group">
                                        <input type="text" name="name" class="form-control" value="{{ old('name') }}"
                                            placeholder="اسم الصنف">
                                    </div>
                                </div>



                                <div class="col-lg-3 col-md-3 col-sm-6">
                                    <label style="font-size: 20px">الكمية</label>

                                    <div class="input-group">
                                        <input type="number" name="count" class="form-control" value="{{ old('count') }}"
                                            placeholder="الكمية">
                                    </div>
                                </div>

                                <div class="col-lg-3 col-md-3 col-sm-6">
                                    <label style="font-size: 20px">ربح التاجر</label>

                                    <div class="input-group">
                                        <input type="number" id="profitadmin" name="profitadmin" class="form-control"
                                            value="{{ old('profitadmin') }}" placeholder="ربح التاجر">
                                    </div>
                                </div>



                                <div class="col-lg-3 col-md-3 col-sm-6">
                                    <label for="exampleInputPassword1" style="font-size: 20px">تاريخ الفاتورة</label>

                                    <div class="input-group">
                                        <input name="created_at" value="{{ old('created_at') }}" type="text"
                                            data-provide="datepicker" data-date-autoclose="true" class="form-control"
                                            placeholder="Select Date">
                                    </div>
                                </div>






                            </div>

                            <hr>
                            <div class="row">
                                <div class="col-lg-4 col-md-4 col-sm-6">
                                    <label style="font-size: 20px">سعر الجملة</label>

                                    <div class="input-group">
                                        <input type="number" name="realprice" class="form-control"
                                            value="{{ old('realprice') }}" placeholder="سعر الجملة">
                                    </div>
                                </div>



                                <div class="col-lg-4 col-md-4 col-sm-6">
                                    <label style="font-size: 20px">سعر البيع</label>

                                    <div class="input-group">
                                        <input name="payprice" type="number" class="form-control"
                                            value="{{ old('payprice') }}" placeholder="سعر البيع">
                                    </div>
                                </div>

                                <div class="col-lg-4 col-md-4 col-sm-6">
                                    <label style="font-size: 20px">___</label>

                                    <div class="input-group">
                                        <button class="btn btn-sm btn-primary" type="submit" title="">إنشاء
                                        </button>

                                    </div>
                                </div>



                            </div>
                        </div>
                        </form>

                    </div>

                </div>

            </div>
        </div>
    </div>
@endsection
