 <div class="row clearfix" id="dealers">
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <div class="card">

                        <div class="table-responsive">
                            <table class="table table-hover js-basic-example dataTable table-custom spacing5 mb-0">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th style="font-size: 17px">الإسم</th>
                                        <th style="font-size: 17px">الهاتف</th>
                                        <th style="font-size: 17px">المبلغ الحالي</th>
                                        <th style="font-size: 17px">عرض المستخدم</th>
                                        <th style="font-size: 17px">الإعدادات</th>
                                    </tr>
                                </thead>
                                <tbody >
                                    <span hidden>{{ $i = 0 }}</span>
                                    @foreach ($deals as $deal)
                                        <span hidden>{{ $i++ }}</span>

                                        <tr>
                                            <td>{{ $i }}</td>

                                            <td>
                                                <div class="font-15">{{ $deal->name }}</div>
                                            </td>
                                            <td><span style="font-size: 17px">{{ $deal->mobile }}</span></td>

                                            <td>
                                                 <a class="btn btn-danger btn-sm"
                                                  {{--
                                                    href="{{ route('deal.details', [$deal->id]) }}">
                                                    --}}
                                                    href="#">

                                                    <i class="fa fa-dollar">
                                                    </i>
                                                    {{-- ({{ $deal->details_count }}) عدد
                                                    الطلبات --}}
                                                   {{$deal->mony}}
                                                </a>
                                                <span class="badge badge-dark"></span>
                                            </td>
                                            {{-- <td><span style="font-size: 17px">{{ $deal->profit }}</span></td> --}}

                                            <td>
                                                <a class="btn btn-success btn-sm" {{--
                                                    href="{{ route('deal.details', [$deal->id]) }}">
                                                    --}}
                                                    href="#">

                                                    <i class="icon-deal">
                                                    </i>
                                                    {{-- ({{ $deal->details_count }}) عدد
                                                    الطلبات --}}
                                                    عرض الفواتير
                                                </a>
                                                <span class="badge badge-dark"></span>
                                            </td>
                                            {{-- <td>
                                                @if ($deal->status == 'Active')
                                                    <span style="font-size: 17px" class="badge badge-success">نشط</span>
                                                    @else
                                                    <span style="font-size: 17px" class="badge badge-danger">متوقف</span>
                                                @endif

                                            </td> --}}



                                            <td>
                                                <a href="{{ route('deal.edit', [$deal->id]) }}" type="button"
                                                    style="font-size: 20px" class="btn btn-sm btn-default" title="تعديل"><i
                                                        class="fa fa-edit"></i> تعديل</a>
                                                 <a
                                                    onclick="confirmDelete(this, '{{ $deal->id }}')" type="button"
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