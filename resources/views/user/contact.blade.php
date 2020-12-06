@extends('user.parent')
@section('content')

  <div id="main-content">
        <div class="container-fluid">
            <div class="block-header">
                <div class="row clearfix">
                    <div class="col-md-6 col-sm-12">
                        <h1>التواصل</h1>

                    </div>

                </div>
            </div>



            <div class="row clearfix">
                <div class="col-lg-12 col-md-12">
                    <div class="card">
                        <div class="header">

                        </div>
                        <div class="table-responsive">
                            <table class="table table-custom spacing5">
                                {{-- <thead>
                                    <tr>

                                        <th>طريقة التواصل</th>
                                        <th>البيانات</th>

                                    </tr>
                                </thead> --}}
                                <tbody>
                                      <tr>
                                        <td> طريقة التواصل</td>
                                    <td>البيانات<td>

                                    </tr>
                                    <tr>
                                        <td> رقم الهاتف</td>
                                    <td><a  href="#">{{$contact->mobile}}</a><td>

                                    </tr>
                                    <tr>
                                        <td>رابط الواتساب</td>
                                    <td><a   target="_blank" href="{{$contact->whatshref}}">{{$contact->whatshref}}</a><td>

                                    </tr>
                                    <tr>
                                        <td>رابط الفيسبوك</td>
                                    <td><a target="_blank" href="{{$contact->facebook}}">{{$contact->facebook}}</a><td>

                                    </tr>
                                    <tr>
                                        <td>رابط الإنستغرام</td>
                                    <td><a  target="_blank" href="{{$contact->insta}}">{{$contact->insta}}</a><td>

                                    </tr>


                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
