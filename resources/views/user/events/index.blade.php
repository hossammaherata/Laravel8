@extends('user.parent')
@section('content')
   <div id="main-content">
        <div class="container-fluid">
            <div class="block-header">
                <div class="row clearfix">
                    <div class="col-md-6 col-sm-12">
                        <h2>المسابقات</h2>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{route('user.auth.event')}}">مسابقاتي </a></li>
                            <li class="breadcrumb-item"><a href="{{route('alleve.user')}}">جميع المسابقات</a></li>
                            <li class="breadcrumb-item"><a href="{{route('user.auth.event.end')}}">المسابقات المنتهية</a></li>

                            {{-- <li class="breadcrumb-item active" aria-current="page">Light Gallery</li> --}}
                            </ol>
                        </nav>
                    </div>
                    <div class="col-md-6 col-sm-12 text-right hidden-xs">
                        <a href="javascript:void(0);" class="btn btn-sm btn-primary btn-round" title=""><i class="fa fa-cloud-upload"></i> Upload images</a>
                    </div>
                </div>
            </div>

            <div id="lightgallery" class="row clearfix lightGallery">

                @foreach ($events as $item)

                 <div class="col-lg-3 col-md-6 m-b-30">
                    <a class="light-link" href="{{url('images/events/'.$item->image)}}" ><img  class="img-fluid rounded" src="{{url('images/events/'.$item->image)}}" alt=""></a>
                    @if($show=='yes')
                    <a href="{{route('user.add.event',[Auth::id(),$item->id])}}" id="aeg" class=" btn btn-success">إشتراك</a>
                    @endif
                    <a href="{{route('user.end',[Auth::id(),$item->id])}}" id="aeg" class=" btn btn-danger">إنهاء</a>

                </div>
                @endforeach

            </div>
        </div>
    </div>

@endsection
@section('script')

<script src="cms/html/assets/bundles/lightgallery.bundle.js"></script><!-- Light Gallery Plugin Js -->

<script src="{{asset('cms/html/assets/bundles/mainscripts.bundle.js')}}"></script>
<script src="{{asset('cms/html/assets/js/pages/medias/image-gallery.js')}}"></script>
@endsection
