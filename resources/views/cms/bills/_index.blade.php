  <div class="row clearfix" id="bills">
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <div class="card">

                        <div class="table-responsive">
                            <table class="table table-custom2 table-hover">
                                <thead>
                                    <tr  >

                                        <th style="ba font-size: 17px;background-color: #221f1c; color :#fdfdfd">الإعدادات</th>
                                        <th style="font-size: 17px;background-color: #221f1c; color :#fdfdfd">عرض الفاتورة</th>
                                        <th style="font-size: 17px;background-color: #221f1c; color :#fdfdfd">تاريخ الفاتورة</th>
                                        <th style="font-size: 17px;background-color: #221f1c; color :#fdfdfd">هاتف المسوق</th>
                                        <th style="font-size: 17px;background-color: #221f1c; color :#fdfdfd">اسم الزبون</th>
                                        <th style="font-size: 17px;background-color: #221f1c; color :#fdfdfd">اسم المسوق</th>
                                        <th style="font-size: 17px;background-color: #221f1c; color :#fdfdfd">رقم الفاتورة</th>

                                    </tr>
                                </thead>
                                <tbody id="users">

                                    @foreach ($bills as $item)

                                        <tr>
                                            <td style="color: #000000;" >



                                                        <a class="btn btn-primary btn-sm"
                                                    href="{{ route('order.get.create2', [$item->id]) }}">
                                                    <i class="icon-book">
                                                    </i>
                                                    عرض الفاتورة
                                                </a>
                                                <span class="badge badge-dark"></span>



                                            </td>

                                            <td style="color: #000000;">
                                                @if ($item->status == 'yes')
                                                    <span style="font-size: 17px" class="badge badge-success">تم التقييم</span>
                                                    @else
                                                    <span style="font-size: 17px" class="badge badge-warning">قيد الإنشاء</span>
                                                @endif

                                            </td>




                                            <td style="color: #000000;"><span style="font-size: 17px">{{ $item->created_at->format('d.m.Y') }}</span></td>

                                            <td style="color: #000000;"><span style="font-size: 17px">{{ $item->user->mobile }}</span></td>

                                             <td style="color: #000000;">
                                                <div class="font-15">{{ $item->name }}</div>
                                            </td>
                                            <td style="color: #000000;">
                                                <div class="font-15">{{ $item->user->name }}</div>
                                            </td>
                                            <td style="color: #000000;">{{$item->id}}</td>
                                            {{-- /////////////////////////////
                                            --}}





                                            {{-- <td><span
                                                    style="font-size: 17px">{{ $user->profit }}</span></td>
                                            --}}

                                            {{-- <td>
                                                @if ($user->status == 'Active')
                                                    <span style="font-size: 17px" class="badge badge-success">نشط</span>
                                                    @else
                                                    <span style="font-size: 17px" class="badge badge-danger">متوقف</span>
                                                @endif

                                            </td> --}}








                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

            </div>
