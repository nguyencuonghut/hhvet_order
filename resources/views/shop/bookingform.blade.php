<!DOCTYPE html>
<html lang="en-US">
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="{{ URL::to('css/main.css') }}">
</head>

<br>

<style>
    table, td, th {
        border: 1px solid black;
    }

    table {
        border-collapse: collapse;
        width: 1000px;
    }

    th {
        text-align: left;
    }
    td {
        text-align: left;
    }

</style>

<body>
<table>
    <tr>
        <td><b>Tên khách hàng:</b></td>
        <td>{{ $order->name }}</td>
    </tr>
    <tr>
        <td><b>Địa chỉ giao hàng:</b></td>
        <td>{{ $order->address }}</td>
    </tr>
    <tr>
        <td><b>Địa chỉ hóa đơn:</b></td>
        <td>{{ $order->bill_addr }}</td>
    </tr>
    <tr>
        <td><b>Người liên hệ:</b></td>
        <td>{{ $order->contact }}</td>
    </tr>
</table>
<br>
<table>
    <tr>
        <th>STT</th>
        <th>Mã SP</th>
        <th>Tên SP</th>
        <th>Quy cách</th>
        <th>Đơn giá</th>
        <th>Số lượng bán</th>
        <th>Số lượng khuyến mại</th>
        <th>Tổng tiền</th>
    </tr>
    <?php $i = 1 ?>
    @foreach($order->cart->items as $item)
        @if($item['qty'])
            <tr>
                <td>{{ $i }}</td>
                <td>{{ $item['item']['code'] }}</td>
                <td>{{ $item['item']['title'] }}</td>
                <td>{{ $item['item']['format'] }}</td>
                <td>{{ number_format($item['item']['price'], 0, '.', ',') }}</td>
                <td>{{ $item['qty'] }}</td>
                <td>{{ floor($item['qty']/$item['item']['pro_major']) * $item['item']['pro_minor'] }}</td>
                <td>{{ number_format($item['qty'] * $item['item']['price'], 0, '.', ',') }}</td>
            </tr>
            <?php $i++ ?>
        @endif
    @endforeach
</table>

@if($order->note)
    <p><b>Ghi chú:</b> {{ $order->note }}</p>
@endif
<hr>
<p>Tổng tiền trước VAT:<b style="color:red"> {{ number_format($order->cart->totalPrice, 0, '.', ',') }} </b>VNĐ</p>
<p>Tổng tiền sau VAT:<b style="color:red"> {{ number_format($order->cart->totalPrice * 1.05, 0, '.', ',') }} </b>VNĐ</p>
</body>
</html>