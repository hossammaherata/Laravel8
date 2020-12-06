@extends('cms.parent')


@section('content')
    <div id="main-content">
        <div class="container-fluid">
            <div class="block-header">
                <div class="row clearfix">
                    <div class="col-md-6 col-sm-12">
                        <h1 style="font-size: 20px">تواصل معنا</h1>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{route('admin.dashbord')}}" style="font-size: 20px">الرئيسية</a></li>
                            <li class="breadcrumb-item"><a href="{{route('user.index')}}" style="font-size: 20px">المسوقين</a></li>
                                <li class="breadcrumb-item active" aria-current="page" style="font-size: 20px">تواصل معنا
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
                            <form method="POST" action="{{ route('contact.store') }}" enctype="multipart/form-data">




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
                                            <label style="font-size: 20px">رقم الهاتف</label>
                                            <input type="number" class="form-control " @if($contact) value="{{ $contact->mobile }}"@endif
                                                style="font-size: 20px" name="mobile" placeholder=" ادخل رقم الهاتف  ">
                                        </div>

                                        <div class="form-group" id="dd">
                                            <label style="font-size: 20px">رابط الواتساب </label>
                                            <input type="text" class="form-control " @if($contact) value="{{ $contact->whatshref }}"@endif
                                                style="font-size: 20px" name="whatshref" placeholder="رابط الواتساب">
                                        </div>

                                        <div class="form-group">
                                            <label style="font-size: 20px"> رابط الإنستغرام</label>
                                            <input type="text"  class="form-control " @if($contact) value="{{ $contact->insta }}"@endif
                                                style="font-size: 20px" name="insta" placeholder="رابط الإنستغرام">
                                        </div>
                                        <div class="form-group">
                                            <label style="font-size: 20px">رابط الفيسبوك</label>
                                            <input type="tel" class="form-control  "@if($contact) value="{{ $contact->facebook }}"@endif
                                                style="font-size: 20px" name="facebook" placeholder="رابط الفيسبوك">
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

