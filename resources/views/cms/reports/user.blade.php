<!DOCTYPE html>
<html>
<title>Dimax | كشف الفواتير</title>

<head>
    <style>
        hr {
            border: 1px solid rgb(0, 0, 0);
        }

        body {
            background-color: rgb(255, 255, 255);
        }

        table,
        td,
        th {
            border: 1px solid rgb(8, 1, 1);
            text-align: center;
        }

        table {
            border-collapse: collapse;
            width: 100%;
        }

        th,
        td {
            padding: 5px;
        }

    </style>
    <link rel="stylesheet"
        href="{{ asset('cms/assets/vendor/bootstrap-datepicker/css/bootstrap-datepicker3.min.css') }}">
</head>

<body style="margin: 15px">

    <h2>DiMax Company</h2>


    <span hidden>{{$count_min=0}}</span>
    @foreach ($bills as $bill)

<span hidden> {{$bill->orders()->where('status','success')->count() > 0 ? ++$count_min: ''}}</span>
    @endforeach


    <strong>
        <p align="right">كشف الفواتير من تاريخ <strong>{{ $from->format('Y/m/d') }}</strong> حتى تاريخ <strong>{{ $to->format('Y/m/d') }}</strong>
            <span>{{ ' ' }}</span> للمسوق :  <span>{{ ' ' }}</span><strong>{{Auth::user()->name}}</strong>
        </p>
    </strong>


    <table style="width:20% ;border:3px solid black;">
        <tr>
            <th>عدد العمليات</th>
            <th>ربح المسوق</th>

        </tr>
        <tr>
            <td>{{$bills->count()}}</td>
            <td>{{$bills->sum('profit') - (30*$count_min)}}</td>

        </tr>

    </table>
              <span hidden>{{$dub=0}}</span>
    @foreach ($bills as $bill)


                  <span hidden>{{$count=0}}</span>


      <span hidden>{{++$dub}}</span>
        <table style="width:100%; margin: 2px">
            <tr style="background-color: rgb(211, 218, 205)">
                <th  style="width: 80px">التقرير</th>
                <th  style="width: 80px">حالة القطعة</th>
                                <th  style="width: 80px ;background-color: rgb(35, 224, 114)">ربح المسوق</th>

                  <th  style="width: 80px">سعر البيع للقطعة</th>
                <th  style="width: 80px">التوصيل</th>
                <th  style="width: 80px">سعر الجملة</th>
                <th  style="width: 80px">الكمية</th>
                <th  style="width: 80px">اسم الصنف</th>
                <th  style="width: 80px">اسم الزبون</th>
                <th style="width: 80px">التاريخ</th>
                <th style="width: 10px" >م</th>
            </tr>

            <tr>
                @foreach ($bill->orders as $item)

                <span hidden>{{++$count}}</span>


              <th>{{$item->note}}</th>
                  <th>
                      @if($item->status=='success')
                   تم التسليم
                   @elseif($item->status=='cancel')
                   مرفوضة
                     @elseif($item->status=='wait')
                     قيد العمل
                     @else
                     مستردة
                     @endif


                </th>
                                <th style="background-color: rgb(35, 224, 114)">{{$item->profit}}</th>

                  <th>{{$item->payprice}}</th>
                <th></th>
                <th>{{$item->realprice}}</th>
                <th>{{$item->count}}</th>
                <th>{{$item->name}}</th>
                <th>
                    @if($count==1)

                    {{$item->bill->name}}
                    @endif
                </th>
                <th>
                    @if($count==1)
                    {{$item->bill->created_at->format('Y/m/d')}}
                    @endif
                </th>
                <th>{{$dub}}</th>

            </tr>


             @endforeach
        </table>

        <table style="width:100%; margin: 5px;margin-bottom:30px">
            <tr style="background-color: rgb(255, 255, 255)">
                <th  style="width: 80px"></th>

                  <th  style="width: 80px"></th>
                                  <th  style="width: 80px ;background-color: rgb(35, 224, 114)">{{$bill->orders()->where('status','success')->count() > 0 ? $bill->profit -30: $bill->profit }} </th>

                <th  style="width: 80px">{{$bill->total}}</th>
                <th  style="width: 80px;background-color: rgb(223, 91, 91)">30</th>
                <th  style="width: 80px">{{$bill->realprice}}</th>
                <th  style="width: 80px">اجمالي الفاتورة </th>
                <th  style="width: 80px ;"> </th>
                <th  style="width: 80px;"> </th>
                <th style="width: 80px;"></th>
                <th style="width: 10px;" ></th>
            </tr>
        </table>

        {{-- <table style="width:60%; margin-left:80px; margin-bottom:30px">
  <tr>
    <th style="background-color: rgb(35, 224, 114);width:75px">{{$bill->orders()->where('status','success')->count() > 0 ? $bill->profit -30: $bill->profit }}</th>
    <th style="width:75px"> {{$bill->orders->sum('payprice')}}</th>
     <th style="width:75px ;background-color: rgb(223, 91, 91)" >30</th>
    <th style="width:75px">{{$bill->orders->sum('realprice')}}</th>
    <th style="width:75px">إجمالي الفاتورة</th>
  </tr> --}}


</table>
 @endforeach
 <br>
  <br>
   <br>




    <span hidden> {{ $i = 0 }}</span>


</body>
<script>
    window.print();

</script>

</html>
