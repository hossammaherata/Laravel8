@extends('cms.parent')
@section('title', '  |  تعديل مسوق')

@section('content')
    <div id="main-content">
        <div class="container-fluid">
            <div class="block-header">
                <div class="row clearfix">
                    <div class="col-md-6 col-sm-12">
                        <h1 style="font-size: 20px">تعديل  مسوق</h1>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{route('admin.dashbord')}}" style="font-size: 20px">الرئيسية</a></li>
                            <li class="breadcrumb-item"><a href="{{route('user.index')}}" style="font-size: 20px">المسوقين</a></li>
                                <li class="breadcrumb-item active" aria-current="page" style="font-size: 20px"> تعديل مسوق
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
                            <form method="POST" action="{{ route('user.store') }}" enctype="multipart/form-data">


                                @if ($errors->any())
                                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                        <ul>
                                            {{-- @foreach ($errors->all() as $error) --}}
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

                                        <div class="form-group" id="dd">
                                            <label style="font-size: 20px">الإسم</label>
                                            <input type="text" class="form-control hosam" value="{{ old('name') }}"
                                                style="font-size: 20px" name="name" placeholder=" ادخل الإسم رباعي ">
                                            <div id="errorname" class="text-danger">{{ $errors->first('name') }}</div>
                                        </div>

                                        <div class="form-group" id="dd">
                                            <label style="font-size: 20px">رقم الهوية</label>
                                            <input type="number" class="form-control hosam" value="{{ old('idint') }}"
                                                style="font-size: 20px" name="idint" placeholder=" ادخل رقم الهوية ">
                                            <div id="erroridint" class="text-danger">{{ $errors->first('idint') }}</div>
                                        </div>

                                        <div class="form-group">
                                            <label style="font-size: 20px"> الإيميل</label>
                                            <input type="email"  class="form-control hosam" value="{{old('email')  }}"
                                                style="font-size: 20px" name="email" placeholder="الإيميل الشخصي">
                                            <div id="erroremail" class="text-danger">{{ $errors->first('email') }}</div>
                                        </div>
                                        <div class="form-group">
                                            <label style="font-size: 20px">رقم الهاتف</label>
                                            <input type="tel" class="form-control hosam " value="{{ old('mobile')}}"
                                                style="font-size: 20px" name="mobile" placeholder="أدخل رقم الهاتف">
                                            <div id="errormobile" class="text-danger">{{ $errors->first('mobile') }}</div>
                                        </div>

                                        <div class="form-group">
                                            <label style="font-size: 20px">العنوان</label>
                                            <input type="text" class="form-control hosam " value="{{ old('address') }}"
                                                style="font-size: 20px" name="address" placeholder="ادخل العنوان">
                                            <div id="erroraddress" class="text-danger">{{ $errors->first('address') }}</div>
                                        </div>

                                        <div class="row clearfix">
                                            <div class="col-lg-12">
                                                <label style="font-size: 20px">الصورة الشخصية</label>
                                                <input type="file" width="590px" height="390px" class="dropify"
                                                    name="image">
                                                <div id="errorimage" class="text-danger">{{ $errors->first('image') }}</div>
                                            </div>

                                        </div>

                                         <div class="form-group">
                                            <label style="font-size:  20px"> كلمة السر</label>
                                            <input type="password" class="form-control hosam" style="font-size: 20px"
                                                name="password">
                                            <div id="errorpassword" class="text-danger ">{{ $errors->first('password') }}
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label style="font-size: 20px"> تأكيد كلمة السر</label>
                                            <input type="password" class="form-control hosam " style="font-size: 20px"
                                                name="password2">
                                            <div id="errorpassword2" class="text-danger">{{ $errors->first('password2') }}
                                            </div>
                                        </div>



                                            <div class="form-group">
                                        <label for="exampleInputPassword1">حالة المسوق</label>
                                        <div class="custom-control custom-radio">
                                            <input onclick="myFunction()"  class="custom-control-input" type="radio" id="Wait"
                                                   name="status" value="Wait"
                                                   @if(old('status') == 'Wait') checked  @endif>
                                            <label for="Wait" class="custom-control-label">قيد الإنتظار</label>
                                        </div>
                                        <div class="custom-control custom-radio">
                                            <input onclick="myFunction()"  class="custom-control-input" type="radio" id="Active"
                                                   name="status" value="Active"
                                                   @if(old('status') == 'Active') checked @endif>
                                            <label for="Active" class="custom-control-label">فعّال</label>
                                        </div>
                                        <div class="custom-control custom-radio">
                                            <input onclick="myFunction()"  class="custom-control-input" type="radio" id="Blocked"
                                                   name="status" value="Blocked"
                                                   @if(old('status') == 'Blocked') checked  @else checked  @endif >
                                            <label for="Blocked" class="custom-control-label">حظر</label>
                                        </div>

                                    </div>

                                    </div>
                                </div>
                                <div>
                                    <button style="font-size: 20px" class="btn btn-sm btn-primary" type="submit"> حفظ
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
            document.getElementById('erroremail').hidden = true;
            document.getElementById('erroraddress').hidden = true;
            document.getElementById('errormobile').hidden = true;
            document.getElementById('errorpassword').hidden = true;
            document.getElementById('errorpassword2').hidden = true;
            document.getElementById('errorimage').hidden = true;
            document.getElementById('erroridint').hidden = true;


        });
        $(".hosam").click(function() {
            document.getElementById('errorname').hidden = true;
            document.getElementById('erroremail').hidden = true;
            document.getElementById('erroraddress').hidden = true;
            document.getElementById('errormobile').hidden = true;
            document.getElementById('errorpassword').hidden = true;
            document.getElementById('errorpassword2').hidden = true;
            document.getElementById('errorimage').hidden = true;
            document.getElementById('erroridint').hidden = true;



        });

    </script>

@endsection
