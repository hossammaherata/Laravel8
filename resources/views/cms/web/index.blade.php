@extends('cms.parent')

@section('content')



    <div id="main-content">
        <div class="container-fluid">
            <div class="block-header">
                <div class="row clearfix">
                    <div class="col-md-6 col-sm-12">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('admin.dashbord') }}"
                                        style="font-size: 20px">الرئيسية</a></li>
                                {{-- <li class="breadcrumb-item"><a
                                        href="{{ route('center.index', app()->getLocale()) }}"
                                        style="font-size: 20px">{{ __('parent.center') }}</a></li>
                                --}}
                                <li class="breadcrumb-item active" aria-current="page" style="font-size: 20px">
                                  الموقع الخارجي
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
                            <form method="POST" action="{{ route('web.store') }}"
                                enctype="multipart/form-data">


                                @if ($errors->any())
                                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
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
                                    <div class="col-md-12 col-sm-10">
                                        {{-- الرؤية بالإنجليزية
                                        --}}

                                                    <div class="form-group">
                                            <label style="font-size: 20px">أول فقرة</label>

                                            <textarea name="firstdesc" rows="4" class="form-control no-resize"
                                               >@if ($web){{ $web->firstdesc }}@endif</textarea>
                                        </div>
                                       <div class="form-group" id="dd">
                                            <label style="font-size: 20px">العنوان الأول</label>
                                            <input type="text" class="form-control hosam" @if ($web) value="{{ $web->first_title }}"@endif
                                                style="font-size: 20px" name="first_title">
                                        </div>


                                         <div class="form-group">
                                            <label style="font-size: 20px">الفقرة الثانية</label>

                                            <textarea name="sec_desc" rows="4" class="form-control no-resize"
                                               >@if ($web){{ $web->sec_desc }}@endif</textarea>
                                        </div>
                                        <div class="form-group" id="dd">
                                            <label style="font-size: 20px">العوان الثاني</label>
                                            <input type="text" class="form-control hosam" @if ($web) value="{{ $web->sec_title }}"@endif
                                                style="font-size: 20px" name="sec_title" >
                                        </div>

                                        {{-- الرسلة بالإنجليزية
                                        --}}
                                        <div class="form-group">
                                            <label style="font-size: 20px">الفقرة الثالثة</label>

                                            <textarea name="thi_desc" rows="4" class="form-control no-resize"
                                               >@if ($web){{ $web->thi_desc }}@endif</textarea>
                                        </div>


                                        <div class="row clearfix">
                                            <div class="col-lg-12">
                                                <label style="font-size: 20px">الصورة الأولى</label>

                                                <input type="file" width="590px" height="390px" class="dropify" @if ($web)
                                                data-default-file="{{ url('images/webs/' . $web->bace_image) }}"
                                                @endif name="bace_image">
                                            </div>

                                        </div>
                                           <div class="row clearfix">
                                            <div class="col-lg-12">
                                                <label style="font-size: 20px">الصورة الثانية</label>

                                                <input type="file" width="590px" height="390px" class="dropify" @if ($web)
                                                data-default-file="{{ url('images/webs/' . $web->sec_image) }}"
                                                @endif name="sec_image">
                                            </div>

                                        </div>
                                           <div class="row clearfix">
                                            <div class="col-lg-12">
                                                <label style="font-size: 20px">الصورة الثالثة</label>

                                                <input type="file" width="590px" height="390px" class="dropify" @if ($web)
                                                data-default-file="{{ url('images/webs/' . $web->thi_image) }}"
                                                @endif name="thi_image">
                                            </div>

                                        </div>




                                    </div>
                                </div>
                                <div>
                                    <button style="font-size: 20px" class="btn btn-sm btn-primary" type="submit">
                                        حفظ
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

    </script>

@endsection
