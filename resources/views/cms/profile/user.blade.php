@extends('user.parent')


@section('content')
    <div id="main-content">
        <div class="container-fluid">
            <div class="block-header">
                <div class="row clearfix">
                    <div class="col-md-6 col-sm-12">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{route('user.dashbord')}}" style="font-size: 20px">الرئيسية</a></li>
                                <li class="breadcrumb-item active" aria-current="page" style="font-size: 20px">الصفحة الشخصية
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
                            <form method="POST" action="{{ route('user.profile.store') }}" enctype="multipart/form-data">


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
                                            <input type="text" class="form-control" value="{{ Auth::user()->name}}"
                                                style="font-size: 20px" name="name" placeholder="   الإسم ">
                                        </div>


                                        <div class="form-group">
                                            <label style="font-size: 20px"> الإيميل</label>
                                            <input type="email" disabled class="form-control hosam" value="{{ Auth::user()->email }}"
                                                style="font-size: 20px" name="email" placeholder="الإيميل الشخصي">
                                        </div>

                                           <div class="form-group" id="dd">
                                            <label style="font-size: 20px">رقم الهوية</label>
                                            <input type="text" class="form-control" value="{{ Auth::user()->idint}}"
                                                style="font-size: 20px" name="idint" >
                                        </div>
                                        <div class="form-group" id="dd">
                                            <label style="font-size: 20px">رقم الهاتف</label>
                                            <input type="number" class="form-control" value="{{ Auth::user()->mobile}}"
                                                style="font-size: 20px" name="mobile" >
                                        </div>
                                         <div class="form-group" id="dd">
                                            <label style="font-size: 20px">العنوان</label>
                                            <input type="text" class="form-control" value="{{ Auth::user()->address}}"
                                                style="font-size: 20px" name="address" >
                                        </div>


                                        <div class="row clearfix">
                                            <div class="col-lg-12">
                                                <label style="font-size: 20px">الصورة الشخصية</label>
                                                <input type="file" width="590px" height="390px" class="dropify"
                                                  data-default-file="{{ url('images/users/' . Auth::user()->image) }}"  name="image">
                                            </div>

                                        </div>

                                         <div class="form-group">
                                            <label style="font-size:  20px"> كلمة السر الحالية</label>
                                            <input type="password" class="form-control hosam" style="font-size: 20px"
                                                name="current_password">
                                            <div  class="text-danger ">{{ $errors->first('password') }}
                                            </div>
                                        </div>
                                         <div class="form-group">
                                            <label style="font-size:  20px"> كلمة السر</label>
                                            <input type="password" class="form-control hosam" style="font-size: 20px"
                                                name="password">
                                            <div  class="text-danger ">{{ $errors->first('password') }}
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label style="font-size: 20px"> تأكيد كلمة السر</label>
                                            <input type="password" class="form-control hosam " style="font-size: 20px"
                                                name="password2">
                                            <div  class="text-danger">{{ $errors->first('password2') }}
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
