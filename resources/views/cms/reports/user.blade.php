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

    <h2>DiMax</h2>


    <strong>
        <p align="right">كشف الفواتير من تاريخ <strong>{{ $from }}</strong> حتى تاريخ <strong>{{ $to }}</strong>
            <span>{{ ' ' }}</span> للمسوق <span>{{ ' ' }}</span><strong>شريف حمدونة</strong>
        </p>
    </strong>


    <table style="width:20% ;border:3px solid black;">
        <tr>
            <th>عدد العمليات</th>
            <th>ربح المسوق</th>

        </tr>
        <tr>
            <td>{{$bills->count()}}</td>
            <td>{{$bills->sum('profit')}}</td>

        </tr>

    </table>
    @foreach ($bills as $bill)



        <table style="width:100%; margin: 2px">
            <tr style="background-color: rgb(211, 218, 205)">
                <th  style="width: 80px">التقرير</th>
                <th  style="width: 80px ;background-color: rgb(35, 224, 114)">ربح المسوق</th>
                  <th  style="width: 80px">التحصيل</th>
                <th  style="width: 80px">التوصيل</th>
                <th  style="width: 80px">سعر الجملة</th>
                <th  style="width: 80px">الكمية</th>
                <th  style="width: 80px">اسم الصنف</th>
                <th  style="width: 80px">اسم الزبون</th>
                <th style="width: 80px">التاريخ</th>
                <th style="width: 10px" >م</th>
            </tr>
            <span hidden>{{$dub=0}}</span>
            <tr>
                @foreach ($bill->orders as $item)

                <span hidden>{{++$dub}}</span>

              <th>{{$item->note}}</th>
                <th style="background-color: rgb(35, 224, 114)">{{$item->profit}}</th>
                  <th></th>
                <th></th>
                <th>{{$item->realprice}}</th>
                <th>{{$item->count}}</th>
                <th>{{$item->name}}</th>
                <th>
                    @if($dub==1)

                    {{$item->bill->name}}
                    @endif
                </th>
                <th>
                    @if($dub==1)
                    {{$item->bill->created_at->format('Y/m/d')}}
                    @endif
                </th>
                <th>م</th>

            </tr>


             @endforeach
        </table>

        <table style="width:45%; margin-left:110px; margin-bottom:30px">
  <tr>
    <th style="background-color: rgb(35, 224, 114);width:10%">{{$bill->orders()->where('status','success')->count() > 0 ? $bill->profit -30: $bill->profit }}</th>
    <th style="width:10%"> {{$bill->orders->sum('payprice')}}</th>
     <th style="width:10% ;background-color: rgb(223, 91, 91)" >30</th>
    <th style="width:10%">{{$bill->orders->sum('realprice')}}</th>
  </tr>


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
