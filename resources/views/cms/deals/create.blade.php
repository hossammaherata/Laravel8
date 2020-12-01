@extends('cms.parent')
@section('title', 'التجار')

@section('content')
    <div id="main-content">
        <div class="container-fluid">
            <div class="block-header">
                <div class="row clearfix">
                    <div class="col-md-6 col-sm-12">
                        <h1 style="font-size: 20px">تاجر جديد</h1>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{route('admin.dashbord')}}" style="font-size: 20px">الرئيسية</a></li>
                                <li class="breadcrumb-item"><a href="{{ route('deal.index') }}"
                                        style="font-size: 20px">التجار</a></li>
                                <li class="breadcrumb-item active" aria-current="page" style="font-size: 20px">تاجر جديد
                                </li>
                            </ol>
                        </nav>
                    </div>
                    <div class="col-md-6 col-sm-12 text-right hidden-xs">
                        {{-- <a
                            href="https://themeforest.net/item/oculux-bootstrap-4x-admin-dashboard-clean-modern-ui-kit/23091507"
                            class="btn btn-sm btn-success" title="Themeforest"><i class="icon-basket"></i> Buy Now</a>
                        --}}
                    </div>
                </div>
            </div>

            <div class="row clearfix">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="body">
                        <form method="POST" action="{{route('deal.store')}}" enctype="multipart/form-data">


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
                                            <label style="font-size: 20px">اسم التاجر </label>
                                            <input onkeydown="error()" type="text"
                                                class="form-control "
                                                value="{{ old('name') }}" style="font-size: 20px" name="name"
                                                placeholder="اسم التاجر">


                                        </div>



                                         <div class="form-group">
                                            <label style="font-size: 20px"> رقم الهاتف</label>
                                            <input onkeydown="error()" type="text"
                                                class="form-control"
                                                value="{{ old('mobile') }}" style="font-size: 20px" name="mobile"
                                                placeholder="رقم  الهاتف">


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
