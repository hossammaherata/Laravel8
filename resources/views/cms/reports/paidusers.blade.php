<!DOCTYPE html>
<html>
<title>Dimax | كشف دفعات</title>

<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

        <style>
             hr {
            border: 1px solid rgb(0, 0, 0);
        }
        </style>
</head>

<body>


    <h2>DiMax</h2>

<p align="right"><strong>  كشف الدفعات المالية للمسوقين من تاريخ {{$from}} حتى تاريخ {{$to}}</strong></p>


    <p style="text"> <strong>كشف الدفعات</strong> </p>





    <table class="table" >
        <thead style="background-color: #c6ccd6">
            <tr>
                <th scope="col">المبلغ</th>
                <th scope="col">رقم الهاتف</th>
                <th scope="col">رقم الهوية</th>
                <th scope="col">الإسم</th>
                <th scope="col">#</th>
            </tr>
        </thead>
        <tbody>
            <span hidden>{{ $i = 0 }}</span>
             <span hidden>{{ $profit = 0 }}</span>
            @foreach ($users as $item)
            @if($item->bills->count() > 0)
                <span hidden>{{ ++$i }}</span>
                <span hidden>{{ $profit+=$item->bills->sum('profit') }}</span>

                <tr>
                    <th scope="row">{{ $item->bills->sum('profit') }} </th>
                    <td>{{ $item->mobile }}</td>
                     <td>{{ $item->idint }}</td>
                    <td>{{ $item->name }}</td>
                    <td>{{ $i }}</td>
                </tr>
                @endif
            @endforeach

        </tbody>
    </table>
{{--
    <table style="margin: 10px; width:20% " class="table" align="left">
        <thead>
            <tr style="background-color: #c6ccd6">
                <th>عدد المسوقين</th>
                <th>إجمالي المبلغ </th>





            </tr>
        </thead>
        <tbody>
            <tr>
                <td>{{ $users->count() }}</td>
                <td>{{ $users->count('profit') }}</td>
                 </tr>
        </tbody>








    </table> --}}
<br>
<br>
<br>
<hr>
    <table  style=" width:20%  ; "  class="table">
        <thead style="background-color: #c6ccd6">
            <tr>
                <th scope="col">عدد المسوقين</th>
                <th scope="col">إجمالي المبلغ</th>
            </tr>
        </thead>
        <tbody>

                <tr>
                    <td>{{ $i }}</td>
                    <td>{{$profit }}</td>
                </tr>

        </tbody>
    </table>

</body>
<script>
    window.print();

</script>

</html>
