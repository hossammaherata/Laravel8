@extends('cms.parent')
@section('title', 'الكُتاب')

@section('content')

    <div id="main-content">
        <div class="container-fluid">
            <div class="block-header">
                <div class="row clearfix">
                    <div class="col-md-6 col-sm-12">
                        <h1 style="font-size: 20px">كاتب جديد</h1>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="#" style="font-size: 20px">الرئيسية</a></li>
                                <li class="breadcrumb-item"><a href="{{ route('author.index') }}"
                                        style="font-size: 20px">الكُتاب</a></li>
                                <li class="breadcrumb-item active" aria-current="page" style="font-size: 20px"> كاتب جديد
                                </li>
                            </ol>
                        </nav>
                    </div>
                    <div class="col-md-6 col-sm-12 text-right hidden-xs">
                        {{-- <a
                            href="https://themeforest.net/item/oculux-bootstrap-4x-author-dashboard-clean-modern-ui-kit/23091507"
                            class="btn btn-sm btn-success" title="Themeforest"><i class="icon-basket"></i> Buy Now</a>
                        --}}
                    </div>
                </div>
            </div>

            <div class="row clearfix">
                <div class="col-sm-12">
                    <div class="card">
                           @if ($errors->any())
                                        <div class="alert alert-danger" role="alert">
                                            <ul>
                                                @foreach ($errors->all() as $error)
                                                    <li>{{ $error }}</li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    @endif

                        <div class="body">
                            <form method="POST" action="{{ route('author.store') }}" enctype="multipart/form-data">



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
                                          @if (Auth::guard('super')->check())
                                        <div class="form-group">



                                            <label>إسم الأدمن</label>
                                            <div class="multiselect_div">
                                                <select id="multiselect1" name="admin_id" class="multiselect hosam"
                                                   >
                                                    @foreach ($admins as $item)

                                                        <option value="{{ $item->id }}"
                                                           {{$item->id==old('admin_id') ?"selected":""}}
                                                            >
                                                            {{ $item->name }}</option>


                                                    @endforeach

                                                </select>
                                        <div id="erroradmin" class="text-danger">{{ $errors->first('admin_id') }}</div>

                                            </div>
                                        </div>
                                         @endif

                                        <div class="form-group" id="dd">
                                            <label style="font-size: 20px">الإسم</label>
                                            <input type="text"
                                                class="form-control hosam {{ $errors->first('name') ? 'is-invalid' : '' }}"
                                                value="{{ old('name') }}" style="font-size: 20px" name="name"
                                                placeholder=" ادخل الإسم رباعي ">
                                            <div id="errorname" class="text-danger">{{ $errors->first('name') }}</div>
                                        </div>

                                        <div class="form-group">
                                            <label style="font-size: 20px"> الإيميل</label>
                                            <input type="email"
                                                class="form-control hosam {{ $errors->first('email') ? 'is-invalid' : '' }}"
                                                value="{{ old('email') }}" style="font-size: 20px" name="email"
                                                placeholder="الإيميل الشخصي">
                                            <div id="erroremail" class="text-danger">{{ $errors->first('email') }}</div>
                                        </div>
                                        <div class="form-group">
                                            <label style="font-size: 20px">رقم الهاتف</label>
                                            <input type="tel"
                                                class="form-control hosam {{ $errors->first('mobile') ? 'is-invalid' : '' }}"
                                                value="{{ old('mobile') }}" style="font-size: 20px" name="mobile"
                                                placeholder="أدخل رقم الهاتف">
                                            <div id="errormobile" class="text-danger">{{ $errors->first('mobile') }}</div>
                                        </div>

                                        <div class="form-group">
                                            <label style="font-size: 20px">العنوان</label>
                                            <input type="text"
                                                class="form-control hosam {{ $errors->first('address') ? 'is-invalid' : '' }}"
                                                value="{{ old('address') }}" style="font-size: 20px" name="address"
                                                placeholder="ادخل العنوان">
                                            <div id="erroraddress" class="text-danger">{{ $errors->first('address') }}</div>
                                        </div>

                                        <div class="row clearfix">
                                            <div class="col-lg-12">
                                                <input type="file" width="590px" height="390px" class="dropify"
                                                    name="image">
                                                <div id="errorimage" class="text-danger">{{ $errors->first('image') }}</div>
                                            </div>

                                        </div>
                                        <div class="form-group">
                                            <label style="font-size:  20px"> كلمة السر</label>
                                            <input type="password"
                                                class="form-control hosam {{ $errors->first('password') ? 'is-invalid' : '' }}"
                                                style="font-size: 20px" name="password">
                                            <div id="errorpassword" class="text-danger ">{{ $errors->first('password') }}
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label style="font-size: 20px"> تأكيد كلمة السر</label>
                                            <input type="password"
                                                class="form-control hosam {{ $errors->first('password2') ? 'is-invalid' : '' }}"
                                                style="font-size: 20px" name="password2">
                                            <div id="errorpassword2" class="text-danger">{{ $errors->first('password2') }}
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label style="font-size: 20px">حالة الحساب</label>
                                            <div class="custom-control custom-switch">
                                                <input type="checkbox" class="custom-control-input" name="status"
                                                    id="status" @if (old('status') == 'on')
                                                checked @endif>
                                                <label class="custom-control-label" style="font-size: 20px"
                                                    for="status">مُفعل</label>

                                            </div>
                                        </div>

                                    </div>
                                </div>
                                <div>
                                    <button style="font-size: 20px" class="btn btn-sm btn-primary" type="submit"> تسجيل
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

        $(".hosam").keyup(function() {
            document.getElementById('errorname').hidden = true;
                        document.getElementById('erroradmin').hidden = true;

            document.getElementById('erroremail').hidden = true;
            document.getElementById('erroraddress').hidden = true;
            document.getElementById('errormobile').hidden = true;
            document.getElementById('errorpassword').hidden = true;
            document.getElementById('errorpassword2').hidden = true;
            document.getElementById('errorimage').hidden = true;


        });
        $(".hosam").click(function() {
            document.getElementById('errorname').hidden = true;
                        document.getElementById('erroradmin').hidden = true;

            document.getElementById('erroremail').hidden = true;
            document.getElementById('erroraddress').hidden = true;
            document.getElementById('errormobile').hidden = true;
            document.getElementById('errorpassword').hidden = true;
            document.getElementById('errorpassword2').hidden = true;
            document.getElementById('errorimage').hidden = true;


        });

    </script>

@endsection
