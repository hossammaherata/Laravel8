  <tbody id="users">
                                    <span hidden>{{ $i = 0 }}</span>
                                    @foreach ($users as $user)
                                        <span hidden>{{ $i++ }}</span>

                                        <tr>
                                            <td>{{ $i }}</td>

                                            <td>
                                                <div class="font-15">{{ $user->name }}</div>
                                            </td>
                                            <td><span style="font-size: 17px">{{ $user->mobile }}</span></td>

                                                          <td>
                                                @if ($user->profit >= 0)
                                                <a class="btn btn-success btn-sm" @else <a class="btn btn-danger btn-sm"
                                                        @endif

                                                        href="#">

                                                        <i class="fa fa-dollar">
                                                        </i>

                                                        {{ $user->profit }}
                                                    </a>
                                                    <span class="badge badge-dark"></span>
                                            </td>
                                            <td>
                                                <a href="#"   type="button" style="font-size: 20px"
                                            data-id="{{$user->id}}" class="btn btn-sm btn-success paid" title="طلبية جديدة"><i
                                                        class="fa fa-diamond "></i>إضافة دفعة</a>


                                            </td>





                                        </tr>
                                    @endforeach
                                </tbody>
