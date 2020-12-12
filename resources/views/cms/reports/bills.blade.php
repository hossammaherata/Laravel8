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
    @if ($data=='yes')
<p  align="right" >كشف الفواتير من تاريخ <strong>{{$from}}</strong> حتى تاريخ <strong>{{$to}}</strong>@if($name) للمسوق<strong>{{$name}}</strong>@endif</p>
@if($name)
<p  align="right" >للمسوق <strong>{{$name}}</strong></p>
@endif
    @else
    <p style="text"> <strong> الفواتير</strong>  </p>
    @endif
    @foreach ($bills as $item)


        <table style="margin: 10px; width:20% " align="right">
            <tr style="background-color: #c6ccd6">
                <th>اسم المسوق</th>
                <th>اسم الزبون</th>
                <th>الهاتف</th>
                <th>التاريخ </th>


            </tr>
            <tr>
                <td>{{ $item->user->name }}</td>
                <td>{{ $item->name }}</td>
                <td>{{ $item->mobile }}</td>
                <td>{{ $item->created_at->format('d.m.Y') }}</td>


            </tr>



        </table>

        <table>
            <tr style="background-color: #c6ccd6">
                <th>تقرير</th>
                <th style="background-color: rgb(22, 219, 88); color:rgb(14, 12, 12)">ربح المسوق</th>
                <th>الحالة</th>
                <th>سعر الجملة</th>
                <th>سعر البيع</th>
                <th>الكمية</th>
                <th>اسم الصنف</th>


                <th style="width: 1px"> <span>م</span></th>

            </tr>
            @foreach ($item->orders as $order)


                <tr>
                    <td>{{ $order->note }}</td>
                    <td style="background-color: rgb(22, 219, 88); color:rgb(14, 12, 12)">{{ $order->profit }}</td>
                    <td>

                        @if ($order->status == 'success')
                            <span style="font-size: 17px" class="btn btn-success">تم التسليم</span>
                        @elseif($order->status =='cancel')
                            <span style="font-size: 17px" class="btn btn-danger">مرفوضة</span>
                        @elseif($order->status =='wait')
                            <span style="font-size: 17px" class="btn btn-warning">قيد العمل</span>
                            {{-- pink --}}
                        @else
                            <span style="font-size: 17px" class="btn btn-info">مُستردة</span>
                        @endif

                    </td>
                    <td>{{ $order->realprice }}</td>
                    <td>{{ $order->payprice }}</td>
                    <td>{{ $order->count }}</td>
                    <td>{{ $order->name }}</td>
                    <td>{{ $order->id }}</td>

                </tr>
            @endforeach



        </table>
         <table style="margin: 10px; width:20% " >
            {{-- <tr style="background-color: #c6ccd6">
                <th>-</th>
                <th>-</th>
                <th>-</th>
                <th> -</th>


            </tr> --}}
            <tr>
                <td> سعر الجملة </td>
                <td> سعر البيع </td>
                <td  style="  text-align: left; background-color: rgb(180, 12, 12); color:rgb(255, 255, 255)">التوصيل </td>
                <td>ربح المسوق</td>


            </tr>
                <tr>
                <td>{{  $item->realprice  }}</td>
                <td>{{ $item->total }}</td>
                <td  style="  text-align: left; background-color: rgb(180, 12, 12); color:rgb(255, 255, 255)">{{ -30 }}</td>
                <td style="background-color: rgb(22, 219, 88); color:rgb(14, 12, 12)">  {{ $item->orders->where('status', 'success')->count() > 0 ? $item->orders->sum('profit') - 30 : $item->orders->sum('profit') }}</td>


            </tr>



        </table>
{{--
        <table style="margin: 10px; width:20% " align="left">
            <tr style="background-color: #c6ccd6">
                <th>إجمالي سعر الجملة</th>
                <th>إجمالي سعر البيع</th>
                <th style="  text-align: left; background-color: rgb(180, 12, 12); color:rgb(255, 255, 255)">التوصيل</th>
                <th style="background-color: rgb(22, 219, 88); color:rgb(14, 12, 12)">إجمالي ربح المسوق</th>





            </tr>
            <tr>
                <td>{{ $item->realprice }}</td>
                <td>{{ $item->total }}</td>
                <td style="  text-align: left; background-color: rgb(180, 12, 12); color:rgb(255, 255, 255)">-30</td>
                <td style="background-color: rgb(22, 219, 88); color:rgb(14, 12, 12)">
                    {{ $item->orders->where('status', 'success')->count() > 0 ? $item->orders->sum('profit') - 30 : $item->orders->sum('profit') }}
                </td>





            </tr>



        </table> --}}



        <br>
        <br>



        <hr>
    @endforeach


</body>
<script>
    window.print();

</script>

</html>
