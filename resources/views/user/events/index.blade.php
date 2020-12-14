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

                </div>
            </div>

            <div id="lightgallery" class="row clearfix lightGallery">

                @foreach ($events as $item)

                 <div class="col-lg-3 col-md-6 m-b-30">
                    <a class="light-link" href="{{url('images/events/'.$item->image)}}" ><img  class="img-fluid rounded" src="{{url('images/events/'.$item->image)}}" alt=""></a>
                    @if($show=='yes')
                    <a href="{{route('user.add.event',[Auth::id(),$item->id])}}" id="aeg" class=" btn btn-success">إشتراك</a>
                    @endif
                                        <a href="#" data-id="{{ $item->id }}" id="aeg" class=" btn btn-info show">التفاصيل</a>

                    <a href="{{route('user.end',[Auth::id(),$item->id])}}" id="aeg" class=" btn btn-danger">إنهاء</a>

                </div>
                @endforeach

            </div>
        </div>
    </div>
    <div id="showdetails"></div>

@endsection

@section('script')

<script src="cms/html/assets/bundles/lightgallery.bundle.js"></script><!-- Light Gallery Plugin Js -->

<script src="{{asset('cms/html/assets/bundles/mainscripts.bundle.js')}}"></script>
<script src="{{asset('cms/html/assets/js/pages/medias/image-gallery.js')}}"></script>





    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
    <script>
        $(".show").click(function() {

            var id = $(this).data('id');


            $.get('/auth/user/events/show/' + id).done(function(item) {
                console.log(item);

                $('#showdetails').replaceWith(item);
                $('#showdetails').modal("show");
            });
        });

    </script>
@endsection
