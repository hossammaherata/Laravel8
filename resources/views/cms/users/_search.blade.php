 <div class="row clearfix" id="users">
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <div class="card">

                        <div class="table-responsive">
                            <table class="table table-hover js-basic-example dataTable table-custom spacing5 mb-0">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th style="font-size: 17px">الإسم</th>
                                        <th style="font-size: 17px"> رقم الهوية</th>
                                        <th style="font-size: 17px">الهاتف</th>

                                        <th style="font-size: 17px">المبلغ الحالي</th>
                                        <th style="font-size: 17px">عرض المستخدم</th>
                                      <th style="font-size: 17px">الحالة</th>

                                        <th style="font-size: 17px">الإعدادات</th>
                                    </tr>
                                </thead>
                                <tbody >
                                    <span hidden>{{ $i = 0 }}</span>
                                    @foreach ($users as $user)
                                        <span hidden>{{ $i++ }}</span>

                                        <tr>
                                            <td>{{ $i }}</td>

                                            <td>
                                                <div class="font-15">{{ $user->name }}</div>
                                            </td>
                                            <td><span style="font-size: 17px">{{ $user->idint }}</span></td>
                                            <td><span style="font-size: 17px">{{ $user->mobile }}</span></td>

                                            <td>
                                                @if($user->profit >=0)
                                                <a class="btn btn-success btn-sm"
                                                @else
                                                 <a class="btn btn-danger btn-sm"
                                                @endif
                                                  {{--
                                                    href="{{ route('user.details', [$user->id]) }}">
                                                    --}}
                                                    href="#">

                                                    <i class="fa fa-dollar">
                                                    </i>
                                                    {{-- ({{ $user->details_count }}) عدد
                                                    الطلبات --}}
                                                   {{$user->profit}}
                                                </a>
                                                <span class="badge badge-dark"></span>
                                            </td>
                                            {{-- <td><span style="font-size: 17px">{{ $user->profit }}</span></td> --}}

                                            <td>
                                            <a href="{{route('user.show',[$user->id])}}" class="btn btn-primary btn-sm" {{--
                                                    href="{{ route('user.details', [$user->id]) }}">
                                                    --}}
                                                    href="#">

                                                    <i class="icon-user">
                                                    </i>
                                                    {{-- ({{ $user->details_count }}) عدد
                                                    الطلبات --}}
                                                    عرض المستخدم
                                                </a>
                                                <span class="badge badge-dark"></span>
                                            </td>
                                            <td>
                                                @if ($user->status == 'Active')
                                                    <span style="font-size: 17px" class="badge badge-success">نشط</span>

                                                    @elseif($user->status=='Blocked')
                                                    <span style="font-size: 17px" class="badge badge-danger">محظور</span>
                                                    @else
                                            <span style="font-size: 17px" class="badge badge-warning">تحت المتابعة</span>

                                                @endif

                                            </td>



                                            <td>
                                                <a href="{{ route('user.edit', [$user->token]) }}" type="button"
                                                    style="font-size: 20px" class="btn btn-sm btn-default" title="تعديل"><i
                                                        class="fa fa-edit"></i> تعديل</a>
                                                <a
                                                    onclick="confirmDelete(this, '{{ $user->id }}')" type="button"
                                                    style="font-size: 20px" class="btn btn-sm btn-default js-sweetalert"
                                                    title="حذف" data-type="confirm"><i class="fa fa-trash-o text-danger">
                                                        حذف </i></a>
                                                {{-- <button type="button"
                                                    class="btn btn-sm btn-default" title="عرض"><i
                                                        class="icon-diamond"></i></button> --}}

                                            </td>




                                            {{-- <td>
                                                <a href="javascript:void(0);" class="btn btn-info btn-round">Interview</a>

                                            </td> --}}
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

            </div>
