@extends('user.parent')
@section('title','المنتجات')

@section('content')

    <div id="main-content">
        <div class="container-fluid">
            <div class="block-header">
                <div class="row clearfix">
                    <div class="col-md-6 col-sm-12">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{route('user.dashbord')}}" style="font-size: 20px">الرئيسية</a></li>
                            <li class="breadcrumb-item " style="font-size: 20px" aria-current="page">القنوات</li>
                            </ol>
                        </nav>
                    </div>

                </div>
            </div>

            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <div class="card">
                        <div class="header">
                            <h2 style="font-size: 20px">المنتجات</h2>

                        </div>
                        <div class="table-responsive">
                            <table class="table table-hover js-basic-example dataTable table-custom spacing5 mb-0">
                                <thead>
                                    <tr>
                                        <th >#</th>
                                        <th style="font-size: 17px">اسم القناة</th>
                                        <th style="font-size: 17px"> رابط القناة</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    <span hidden>{{$i=0}}</span>
                                    @foreach ($twits as $twit)
                                <span hidden>{{$i++}}</span>

                                    <tr>
                                    <td>{{$i}}</td>


                                    <td><span style="font-size: 17px">{{$twit->name}}</span></td>
                                    <td><span style="font-size: 17px"><a target="_blank" href="{{$twit->href}}">{{$twit->href}}</a></span></td>

                                    </tr>
                                         @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection

