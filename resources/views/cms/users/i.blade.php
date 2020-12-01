@extends('cms.parent')
@section('title', 'تعديل')

@section('content')
    <div id="main-content">
        <div class="container-fluid">
            <div class="block-header">
                <div class="row clearfix">
                    <div class="col-md-6 col-sm-12">
                        <h1 style="font-size: 20px">آدمن جديد</h1>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="#" style="font-size: 20px">الرئيسية</a></li>
                                <li class="breadcrumb-item"><a href="{{ route('admin.index') }}"
                                        style="font-size: 20px">المسؤولين</a></li>
                                <li class="breadcrumb-item active" aria-current="page" style="font-size: 20px"> أدمن جديد
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
                            <form method="POST" action="{{ route('admin.update',[$admin->token]) }}" enctype="multipart/form-data">
                                @method('PUT')


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
                                            <input type="text"
                                                class="form-control hosam {{ $errors->first('name') ? 'is-invalid' : '' }}"
                                                value="{{ $admin->name }}" style="font-size: 20px" name="name"
                                                placeholder=" ادخل الإسم رباعي ">
                                            <div id="errorname" class="text-danger">{{ $errors->first('name') }}</div>
                                        </div>

                                        <div class="form-group">
                                            <label style="font-size: 20px"> الإيميل</label>
                                            <input type="email"
                                                class="form-control hosam {{ $errors->first('email') ? 'is-invalid' : '' }}"
                                                value="{{ $admin->email }}" style="font-size: 20px" name="email"
                                                placeholder="الإيميل الشخصي">
                                            <div id="erroremail" class="text-danger">{{ $errors->first('email') }}</div>
                                        </div>
                                        <div class="form-group">
                                            <label style="font-size: 20px">رقم الهاتف</label>
                                            <input type="tel"
                                                class="form-control hosam {{ $errors->first('mobile') ? 'is-invalid' : '' }}"
                                                value="{{$admin->mobile}}" style="font-size: 20px" name="mobile"
                                                placeholder="أدخل رقم الهاتف">
                                            <div id="errormobile" class="text-danger">{{ $errors->first('mobile') }}</div>
                                        </div>

                                        <div class="form-group">
                                            <label style="font-size: 20px">العنوان</label>
                                            <input type="text"
                                                class="form-control hosam {{ $errors->first('address') ? 'is-invalid' : '' }}"
                                                value="{{ $admin->address }}" style="font-size: 20px" name="address"
                                                placeholder="ادخل العنوان">
                                            <div id="erroraddress" class="text-danger">{{ $errors->first('address') }}</div>
                                        </div>

                                         <div class="row clearfix">

                                            <div class="col-lg-12">
                                                <label style="font-size: 20px"> الصورة العامة للأدمن </label>

                                                <input type="file" width="590px" height="390px" class="dropify"
                                                    data-default-file="{{ url('images/admins/' . $admin->image) }}"
                                            name="image">
                                        <div id="errorimage" class="text-danger">{{ $errors->first('image') }}</div>

                                            </div>

                                        </div>
                                        {{-- <div class="form-group">
                                            <label style="font-size:  20px"> كلمة السر</label>
                                            <input type="password"
                                                class="form-control hosam {{ $errors->first('password') ? 'is-invalid' : '' }}"
                                                style="font-size: 20px" name="password">
                                            <div id="errorpassword" class="text-danger ">{{ $errors->first('password') }}</div>
                                        </div>
                                        <div class="form-group">
                                            <label style="font-size: 20px"> تأكيد كلمة السر</label>
                                            <input type="password"
                                                class="form-control hosam {{ $errors->first('password2') ? 'is-invalid' : '' }}"
                                                style="font-size: 20px" name="password2">
                                            <div id="errorpassword2" class="text-danger">{{ $errors->first('password2') }}</div>
                                        </div> --}}
                                         <div class="form-group">
                                    <label>الفئات المتاحة</label>
                                    <div class="multiselect_div">
                                        <select id="multiselect1" name="category_id[]" class="multiselect" multiple="multiple">
                                            @foreach ($categorys as $item)
                                            <option  selected value="{{$item->id}}"
                                                @foreach ($admin->category as $cate)
                                                    {{$cate->id==$item->id ?"selected":""}}
                                                @endforeach>{{$item->name}}</option>
                                            @endforeach

                                        </select>
                                    </div>
                                </div>
                                        <div class="form-group">
                                            <label style="font-size: 20px">حالة الحساب</label>
                                            <div class="custom-control custom-switch">
                                                <input type="checkbox" class="custom-control-input" name="status"
                                                    id="status" @if ($admin->status=='Active')
                                                checked @endif>
                                                <label class="custom-control-label" style="font-size: 20px"
                                                    for="status">مُفعل</label>

                                            </div>
                                        </div>


                                    </div>
                                </div>

                                <div>
                                    <button style="font-size: 20px" class="btn btn-sm btn-primary" type="submit"> حفظ التعديل
                                    </button>


                                </div>

                        </form>
                        </div>
                    </div>
                              <div class="card">


                        <div class="body">
                      <form role="form" id="reset_password_form" method="post">
                                @csrf

                                {{-- <div class="card-body"> --}}

                                    <div class="alert alert-danger" id="error_alert" role="alert" hidden>
                                        <ul id="error_messages_ul"></ul>
                                    </div>

                                    <div class="col-md-8">

                                        <div class="form-group">
                                            <label for="newPasswordInput">New Password</label>
                                            <input id="password" type="password" class="form-control"
                                                   placeholder="New Password">
                                        </div>
                                        <div class="form-group">
                                            <label for="newPasswordConfirmationInput">New Password Confirmation</label>
                                            <input id="confirm" type="password" class="form-control"
                                                   placeholder="New Password Confirmation">
                                        </div>
                                    </div>
                                {{-- </div> --}}
                                <!-- /.card-body -->
                                <div class="card-footer">
                                    <button type="button" onclick="resetPassword('{{$admin->token}}')" class="btn btn-primary">Reset
                                        Password
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


        });
          $(".hosam").click(function() {
            document.getElementById('errorname').hidden = true;
            document.getElementById('erroremail').hidden = true;
            document.getElementById('erroraddress').hidden = true;
            document.getElementById('errormobile').hidden = true;
            document.getElementById('errorpassword').hidden = true;
            document.getElementById('errorpassword2').hidden = true;
            document.getElementById('errorimage').hidden = true;


        });

    </script>

    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
    <script>
        function resetPassword(token) {
            axios.put('/cms/admin/Password/'+token, {
                password: document.getElementById("password").value,
                confirm: document.getElementById("confirm").value,
            }).then(function (response) {
                console.log(33434);
                clearAndHideErrors();
                clearForm();
                showMessage(response.data);
            }).catch(function (error) {
                if (error.response.data.errors !== undefined) {
                    showErrorMessages(error.response.data.errors);
                } else {
                    showMessage(error.response.data);
                }
            });
        }

        function showErrorMessages(errors) {
            document.getElementById('error_alert').hidden = false;
            var errorMessagesUl = document.getElementById("error_messages_ul");
            errorMessagesUl.innerHTML = '';

            for (var key of Object.keys(errors)) {
                var newLI = document.createElement('li');
                newLI.appendChild(document.createTextNode(errors[key]));
                errorMessagesUl.appendChild(newLI);
            }
        }

        function clearAndHideErrors() {
            document.getElementById('error_alert').hidden = true
            var errorMessagesUl = document.getElementById("error_messages_ul");
            errorMessagesUl.innerHTML = '';
        }

        function clearForm() {
            document.getElementById("reset_password_form").reset();
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


