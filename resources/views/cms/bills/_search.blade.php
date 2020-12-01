   <tbody id="users">
       <span hidden>{{ $i = 0 }}</span>
       @foreach ($users as $user)
           <span hidden>{{ ++$i }}</span>

           <tr>
               <td>{{ $i }}</td>

               <td>
                   <div class="font-15">{{ $user->name }}</div>
               </td>
               <td><span style="font-size: 17px">{{ $user->idint }}</span></td>

               <td>
                   <a href="{{ route('order.build', [$user->token]) }}" type="button" style="font-size: 20px"
                       class="btn btn-sm btn-success" title="طلبية جديدة"><i class="fa fa-diamond "></i> فاتورة
                       جديدة</a>
                   {{-- <a onclick="confirmDelete(this, '{{ $user->id }}')" type="button"
                       style="font-size: 20px" class="btn btn-sm btn-default js-sweetalert" title="حذف"
                       data-type="confirm"><i class="fa fa-trash-o text-danger">
                           حذف </i></a> --}}
                   {{-- <button type="button" class="btn btn-sm btn-default"
                       title="عرض"><i class="icon-diamond"></i></button> --}}

               </td>




               {{-- <td>
                   <a href="javascript:void(0);" class="btn btn-info btn-round">Interview</a>

               </td> --}}
           </tr>
       @endforeach
   </tbody>
